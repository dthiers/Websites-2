<?php
	/** 
	 * om op verschillende platforms te kunnen werken is het handig om op ייn plek aan te geven 
	 * op welk platform je werkt
	 * Mogelijke waardes: localhost, remote 
	 */ 
	define('PLATFORM', 'localhost');
	
	if (PLATFORM == 'localhost')
	{
		$database['location'] = 'localhost';
		$database['db_name'] = 'webs2_pr_wk2';
		$database['loginname'] = 'root';
		$database['password'] = '';
	}
	
	if (PLATFORM == 'remote')
	{
		$database['location'] = '';
		$database['db_name'] = '';
		$database['loginname'] = '';
		$database['password'] = '';
	}
?>