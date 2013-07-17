<?php 
class adminExecZopimWidget extends Controller_AdminExec
{
	public function run($aArgs)
	{
		require_once('builder/builderInterface.php');
		usbuilder()->init($this, $aArgs);
	
		$connection = new modelZopimWidget();
		$aData['script'] = htmlentities($aArgs['pg_zopim_textarea'], ENT_QUOTES);
		
		$aData['cposition'] = $aArgs['position'];
		if($aArgs['hide_offline'] == null){
			$aData['hide_offline'] = 0;
		}else{
			$aData['hide_offline'] = 1;
		}
		$aData['bubbleTitle'] = $aArgs['bubbleTitle'];
		$aData['bubbleMsg'] = $aArgs['bubbleMsg'];
		$aData['wcolor'] = htmlentities($aArgs['wcolor'], ENT_QUOTES);
		if($aArgs['usegreetingmsg'] == null){
			$aData['usegreetingmsg'] = 0;
		}else{
			$aData['usegreetingmsg'] = $aArgs['usegreetingmsg'];
		}
		$aData['online_msgChatBar'] = $aArgs['online_msgChatBar'];
		$aData['away_msgChatBar'] = $aArgs['away_msgChatBar'];
		$aData['offline_msgChatBar'] = $aArgs['offline_msgChatBar'];
		$aData['online_msgChatPanel'] = $aArgs['online_msgChatPanel'];
		$aData['away_msgChatPanel'] = $aArgs['away_msgChatPanel'];
		$aData['offline_msgChatPanel'] = $aArgs['offline_msgChatPanel'];
		
		$check = $connection->checkdb();
		$check2 = $connection->checkdb2();
		
		if($check['cId'] == "0" && $check2['cId'] == "0"){
			$insertScript = $connection->insertData($aData);
			$insertData = $connection->iCustomize($aData);
		}else{
			$insertScript = $connection->updateData($aData);
			$insertData = $connection->uCustomize($aData);
		}
		
		if(($insertScript === true) && ($insertData === true)){
			usbuilder()->message($sMessage, $sType = 'success');
			usbuilder()->message('Saved succesfully');
		}else{
			usbuilder()->message('Oops. Something went wrong.', 'warning');
		}

		usbuilder()->jsMove($aArgs['return_url']);
		//usbuilder()->vd($aArgs);
	}
}