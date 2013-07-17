<?php 
class frontPageZopimWidget extends Controller_Front
{
	protected function run($aArgs)
	{
		require_once('builder/builderInterface.php');
		usbuilder()->init($this, $aArgs);
		 
		$getSetting = common()->modelContents()->getData();
		$iResultCount = common()->modelContents()->checkdb();
		
		$fetchedData = html_entity_decode($getSetting['pzs_content'], ENT_QUOTES);
		
		$this->importJS('front.zopim');
		$this->assign('zopimwidget', $fetchedData);
		
		if ($iResultCount['cId'] == 0) $this->fetchClear();
	}
}