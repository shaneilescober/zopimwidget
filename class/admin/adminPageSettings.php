<?php 
class adminPageSettings extends Controller_Admin
{
	protected function run($aArgs)
	{
		require_once('builder/builderInterface.php');
		usbuilder()->init($this, $aArgs);
		
		$this->assign("sUrl", common()->getFullUrl());
		$this->assign("bExtensionView", ($aArgs['etype'] ? 1 : 0));
		usbuilder()->validator(array('form' => 'zopimwidgetform'));
		
		$sFormScript = usbuilder()->getFormAction('zopimwidgetform', 'adminExecZopimWidget');
		$this->writeJs($sFormScript);
		
		$this->importCss('adminZopimWidget');
		$this->importJS('zopim.setup');
		$this->importJS('jscolor');
		$this->view(__CLASS__);
	}
}