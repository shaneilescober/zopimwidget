$(document).ready(function(){
	var sUrl = usbuilder.getUrl('apiGetCustomizeSettingsFront');
	$.ajax({
		dataType: 'json',
		type: 'GET',
		url: sUrl,
		success: function(info){
			//alert(info.Data.pzc_position);
			$zopim(function(){
				//position of chat window
				if(info.Data.pzc_position == "Bottom Right"){
					$zopim.livechat.button.setPosition('br');
				}else{
					$zopim.livechat.button.setPosition('bl');
				}
				
				//if agent is offline...zopim won't show up
				if(info.Data.pzc_hide_chat_offline == 1){
					$zopim.livechat.button.setHideWhenOffline(true);
				}
				
				//contents of bubble
				$zopim.livechat.bubble.setTitle(info.Data.pzc_bubble_title);
				$zopim.livechat.bubble.setText(info.Data.pzc_bubble_msg);
				
				//set theme of chat window
				var color = info.Data.pzc_window_color.toLowerCase();
				if(color !== '#faf4e3'){
					$zopim.livechat.window.setColor(color);
				}
				
				//greetings in zopim depending on status
				if(info.Data.pzc_use_greeting_msg == 1){
					$zopim.livechat.setGreetings({
						'online' : [info.Data.pzc_online_msgChatBar, info.Data.pzc_online_msgChatPanel],
						'away'	 : [info.Data.pzc_away_msgChatBar, info.Data.pzc_away_msgChatPanel],
						'offline': [info.Data.pzc_offline_msgChatBar, info.Data.pzc_offline_msgChatPanel]
					});
				}else{
					$zopim.livechat.setGreetings({
						'online' : ['Click here to chat', 'Leave a question or comment and our agents will try to attend to you shortly =)'],
						'away'	 : ['Click here to chat', 'If you leave a question or comment, our agents will be notified and will try to attend to you shortly =)'],
						'offline': ['Leave a message', 'We are offline, but if you leave your message and contact details, we will try to get back to you =)']
					});
				}
				
			});
		}
	});
});