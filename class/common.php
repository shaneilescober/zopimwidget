<?php
class common
{
	function modelContents()
	{
		return getInstance('modelZopimWidget');
	}
	
	function getFullUrl() {
		return $_SERVER['REQUEST_URI'];
	}
}