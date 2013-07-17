<?php
class frontPageNoRecord extends Controller_Front
{
    protected function run($aArgs)
    {
        $connection = new modelZopimWidget();
        $iResultCount = $connection->checkdb();
		
        if ($iResultCount['cId'] > 0) $this->fetchClear();
    	$this->assign('error', 'No records found.');
    }
}