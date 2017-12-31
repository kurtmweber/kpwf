<?php
	require_once("Config.inc.php");
	
	class Page{
		private $PageTitle;
		public $TabLevel;
		
		function __construct($PageTitle){
			$this->PageTitle = $PageTitle;
			
			$this->TabLevel = 2;
			}
			
		function TabbedHtmlOut($html, $newLine = true){
			for ($i = 0; $i < $this->TabLevel; $i++){
				printf("\t");
				}
				
			printf("%s", $html);
			if ($newLine){
				printf("\n");
				}
			
			return;
			}
			
		function HtmlOut($html, $newLine = true){
			printf("%s", $html);
			
			if ($newLine){
				printf("\n");
				}
				
			return;
			}
			
		function UnrecoverableError(){
			$this->TabbedHtmlOut("<P>Unrecoverable error, exiting</P>");
			ob_end_flush();
			exit();
			}
			
		function SanitizeInputForDisplay($input){
			$input = trim($input);
			$input = stripslashes($input);
			$input = htmlspecialchars($input);
			
			return $input;
			}
			
		function __destruct(){
			//PageBottom();
			}
		}
?>