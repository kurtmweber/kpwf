<?php
	require_once("Config.inc.php");
	
	require_once("UserModules.inc.php");
	
	date_default_timezone_set("Etc/UTC");
	
	$notYet = true;
	
	if (!$_GET){
		require_once(__DIR__ . "/sitecode/" . $modules[0][1]);
		$page = new $modules[0][2];
		} else {
	
		foreach ($modules as $pageId){
			if (isset($_GET[$pageId[0]])){
				require_once(__DIR__ . "/sitecode/" . $pageId[1]);
				$page = new $pageId[2];
			
				exit();
				}
			}
		}
?>