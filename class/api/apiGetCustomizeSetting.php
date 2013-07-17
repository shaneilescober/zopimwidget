<?php 
class apiGetCustomizeSetting extends Controller_Api
{
	protected function get($aArgs)
	{
		require_once('builder/builderInterface.php');
		usbuilder()->init($this, $aArgs);
		
		$cusSettings = common()->modelContents()->getCusSettings($aArgs['dSeq']);
		return $cusSettings;
	}
}