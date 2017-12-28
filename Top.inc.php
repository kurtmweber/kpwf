<?php
	require_once("Config.inc.php");
	
	function PageTop($pageTitle){
?>
<HTML>
	<HEAD>
		<TITLE><?php echo SITENAME . ": " . $pageTitle; ?></TITLE>
		<LINK rel="stylesheet" type="text/css" href="">
	</HEAD>
	<BODY>
		<HEADER>
			<H1>Welcome to <?php echo SITENAME ?>!</H1>
		</HEADER>
<?php
		return;
		}
?>
  