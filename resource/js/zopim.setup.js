var cVal = 'Yes';
var PLUGIN_Zopim_setup = {
		
	saveSetting : function(form){
		if(cVal == "Yes"){
			if(oValidator.formName.getMessage("zopimwidgetform")){
				$('[name=zopimwidgetform]').submit();
			}else{
				oValidator.generalPurpose.getMessage(false,"Please paste the script from your Zopim account.");
			}
		}else{
			if(oValidator.formName.getMessage("zopimwidgetform")){
				$('[name=zopimwidgetform]').submit();
			}else{
				oValidator.generalPurpose.getMessage(false,"Please paste the script from your Zopim account.");
			}
		}
		
	},
	
	resetDefault : function(){
		$("#pg_zopim_textarea").val("");
		$('[name=position]').val("Bottom Right");
		$('[name=bubbleTitle]').val("Questions?");
		$('[name=bubbleMsg]').val("Click here to chat with us!");
		$('[name=wcolor]').val("#faf4e3");
		$('[name=online_msgChatBar]').val("Click here to chat");
		$('[name=away_msgChatBar]').val("Click here to chat");
		$('[name=offline_msgChatBar]').val("Leave a message");
		$('[name=online_msgChatPanel]').val("Leave a question or comment and our agents will try to attend to you shortly =)");
		$('[name=away_msgChatPanel]').val("If you leave a question or comment, our agents will be notified and will try to attend to you shortly =)");
		$('[name=offline_msgChatPanel]').val("We are offline, but if you leave your message and contact details, we will try to get back to you =)");
		
		$('[name=hide_offline]').removeAttr("checked");
		$('[name=usegreetingmsg]').attr("checked", true);
	},
	
	customize: function(val){
		var seq = $('[name=seq]').val();
		var sUrl = usbuilder.getUrl('apiGetCustomizeSetting');
		cVal = val;
		if(cVal == "Yes"){
			$.ajax({
				dataType: 'json',
				type: 'GET',
				url: sUrl,
				data: "dSeq=" + seq, 
				success: function(info){
					$('#customize_widget').css('display', 'block');
					$('[name=position]').val(info.Data[0].pzc_position);
					if($('[name=hide_offline]').val() == 1){
						$('[name=hide_offline]').attr('checked', true);
					}
					
					$('[name=wcolor]').val(info.Data[0].pzc_window_color);
					
					$('[name=bubbleTitle]').val(info.Data[0].pzc_bubble_title);
					$('[name=bubbleMsg]').val(info.Data[0].pzc_bubble_msg);
					
					$('[name=online_msgChatBar]').val(info.Data[0].pzc_online_msgChatBar);
					$('[name=away_msgChatBar]').val(info.Data[0].pzc_away_msgChatBar);
					$('[name=offline_msgChatBar]').val(info.Data[0].pzc_offline_msgChatBar);
					
					$('[name=online_msgChatPanel]').val(info.Data[0].pzc_online_msgChatPanel);
					$('[name=away_msgChatPanel]').val(info.Data[0].pzc_away_msgChatPanel);
					$('[name=offline_msgChatPanel]').val(info.Data[0].pzc_offline_msgChatPanel);
				}
			});
			
		}
		if(cVal == "No"){
			$('#customize_widget').css('display', 'none');
		}
	} 
}

$(document).ready(function(){
	oValidator.setFieldErrorMsg('question', 'isNum', 'test')

	$('#customize_widget').css('display', 'none');
	var seq = $('[name=seq]').val();
	var sUrl = usbuilder.getUrl('apiGetSetting');
	var sUrl2 = usbuilder.getUrl('apiGetCustomizeSetting');
	$.ajax({
		dataType: 'json',
		type: 'GET',
		url: sUrl,
		data: "dSeq=" + seq, 
		success: function(info){
			$('#pg_zopim_textarea').val(info.Data);
			//alert(info.Data);
		}
	});
	$.ajax({
		dataType: 'json',
		url: sUrl2,
		data: 'dSeq=' + seq,
		success: function(info){
			if(info.Data.pzc_bubble_title == null){
				$('[name=position]').val("Bottom Right");
				$('[name=bubbleTitle]').val("Questions?");
				$('[name=bubbleMsg]').val("Click here to chat with us!");
				$('[name=wcolor]').val("#faf4e3");
				$('[name=online_msgChatBar]').val("Click here to chat");
				$('[name=away_msgChatBar]').val("Click here to chat");
				$('[name=offline_msgChatBar]').val("Leave a message");
				$('[name=online_msgChatPanel]').val("Leave a question or comment and our agents will try to attend to you shortly =)");
				$('[name=away_msgChatPanel]').val("If you leave a question or comment, our agents will be notified and will try to attend to you shortly =)");
				$('[name=offline_msgChatPanel]').val("We are offline, but if you leave your message and contact details, we will try to get back to you =)");
				
				$('[name=hide_offline]').removeAttr("checked");
				$('[name=usegreetingmsg]').attr("checked", true);
			}else{
				$('[name=position]').val(info.Data.pzc_position);
				$('[name=bubbleTitle]').val(info.Data.pzc_bubble_title);
				$('[name=bubbleMsg]').val(info.Data.pzc_bubble_msg);
				$('[name=wcolor]').val(info.Data.pzc_window_color);
				$('[name=online_msgChatBar]').val(info.Data.pzc_online_msgChatBar);
				$('[name=away_msgChatBar]').val(info.Data.pzc_away_msgChatBar);
				$('[name=offline_msgChatBar]').val(info.Data.pzc_offline_msgChatBar);
				$('[name=online_msgChatPanel]').val(info.Data.pzc_online_msgChatPanel);
				$('[name=away_msgChatPanel]').val(info.Data.pzc_away_msgChatPanel);
				$('[name=offline_msgChatPanel]').val(info.Data.pzc_offline_msgChatPanel);
				
				if(info.Data.pzc_hide_chat_offline == "1"){
					$('[name=hide_offline]').attr("checked", true);
				}
				if(info.Data.pzc_use_greeting_msg == "1"){
					$('[name=usegreetingmsg]').attr("checked", true);
				}
			}
			
		}
	});
});
