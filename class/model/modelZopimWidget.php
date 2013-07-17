<?php 
class modelZopimWidget extends Model
{
	public function checkdb()
	{
		$sSql = "SELECT COUNT(idx) as cId FROM zopim_setting";
		$cData = $this->query($sSql, row);
		return $cData;
	}
	
	public function checkdb2()
	{
		$sSql = "SELECT COUNT(idx) as cId FROM zopim_customize";
		$cData = $this->query($sSql, row);
		return $cData;
	}
	
	public function insertData($aData)
	{
		$sSql = "INSERT INTO zopim_setting
		(pzs_content) 
		VALUES 
		('{$aData['script']}')";
		$bInsert = $this->query($sSql);
		//return $sSql;
		if($bInsert === false){
			return false;
		}else{
			return true;
		}
	}
	
	public function updateData($aData)
	{
		$sSql = "UPDATE zopim_setting 
				SET pzs_content = '{$aData['script']}' ";
		
		$bUpdate = $this->query($sSql);
		//return $sSql;
		if($bUpdate === false){
			return false;
		}else{
			return true;
		}
	}
	
	public function getData()
	{
		$sSql = "SELECT * FROM zopim_setting";
		$data = $this->query($sSql, row);
		return $data;
	}
	
	public function iCustomize($aData){
		$sSql = "INSERT INTO zopim_customize
		(pzc_position,
		pzc_hide_chat_offline,
		pzc_bubble_title,
		pzc_bubble_msg,
		pzc_window_color,
		pzc_use_greeting_msg,
		pzc_online_msgChatBar,
		pzc_away_msgChatBar,
		pzc_offline_msgChatBar,
		pzc_online_msgChatPanel,
		pzc_away_msgChatPanel,
		pzc_offline_msgChatPanel) 
		VALUES (
		'{$aData['cposition']}',
		{$aData['hide_offline']},
		'{$aData['bubbleTitle']}',
		'{$aData['bubbleMsg']}',
		'{$aData['wcolor']}',
		{$aData['usegreetingmsg']},
		'{$aData['online_msgChatBar']}',
		'{$aData['away_msgChatBar']}',
		'{$aData['offline_msgChatBar']}',
		'{$aData['online_msgChatPanel']}',
		'{$aData['away_msgChatPanel']}',
		'{$aData['offline_msgChatPanel']}')";
		
		$bInsert = $this->query($sSql);
		
		if($bInsert === false){
			return false;
		}else{
			return true;
		}
	}
	
	public function uCustomize($aData){
		$sSql = "UPDATE zopim_customize 
				SET pzc_position = '{$aData['cposition']}',
				pzc_hide_chat_offline = {$aData['hide_offline']},
				pzc_bubble_title = '{$aData['bubbleTitle']}',
				pzc_bubble_msg = '{$aData['bubbleMsg']}',
				pzc_window_color = '{$aData['wcolor']}',
				pzc_use_greeting_msg = {$aData['usegreetingmsg']},
				pzc_online_msgChatBar = '{$aData['online_msgChatBar']}',
				pzc_away_msgChatBar = '{$aData['away_msgChatBar']}',
				pzc_offline_msgChatBar = '{$aData['offline_msgChatBar']}',
				pzc_online_msgChatPanel = '{$aData['online_msgChatPanel']}',
				pzc_away_msgChatPanel = '{$aData['away_msgChatPanel']}',
				pzc_offline_msgChatPanel = '{$aData['offline_msgChatPanel']}' ";
		
		$bUpdate = $this->query($sSql);
		
		if($bUpdate === false){
			return false;
		}else{
			return true;
		}
	}
	
	public function getCusSettings()
	{
		$sSql = "SELECT * FROM zopim_customize";
		$data = $this->query($sSql, row);
		return $data;
	}
}