<?php 
class apiGetSetting extends Controller_Api
{
	protected function get($aArgs)
	{
		require_once('builder/builderInterface.php');
		usbuilder()->init($this, $aArgs);
		
		$seq = $aArgs['dSeq'];
		$settings = common()->modelContents()->getData($seq['dSeq']);
		
		$zopimSettings = html_entity_decode($settings['pzs_content'], ENT_QUOTES);
		
		return $zopimSettings;
	}
}