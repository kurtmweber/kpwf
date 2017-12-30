<?php
	require_once("Config.inc.php");
	
	require_once("UserModules.inc.php");
	
	date_default_timezone_set("Etc/UTC");
	
	$notYet = true;
	
	foreach ($modules as $pageId){
		if (isset($_GET[$pageId[0]])){
			$notYet = false;
			require_once(__DIR__ . "/sitecode/" . $pageId[1]);
			$page = new $pageId[2];
			
			exit();
			}
		}
		
	if ($notYet){
		$page = new $pageHandlers['Home'];
		}
?>