<?php
	function Cookieify($text){
		$retStr = "";
		
		for ($i = 0; $i < strlen($text); $i++){
			$curChar = substr($text, $i, 1);
			if (LegalCookieNameChar($curChar)){
				$retStr .= $curChar;
				}
			}
			
		return $retStr;
		}
		
	function LegalCookieNameChar($ch){
		switch ($ch){
			case " ":
			case "\t":
			case "\n":
			case "\r":
			case "=":
			case ":":
			case ";":
			case chr(13):
			case chr(14):
				return false;
			default:
				return true;
			}
		}
?>