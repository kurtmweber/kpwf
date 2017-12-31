<?php
	require_once("Config.inc.php");
	require_once("Modules.inc.php");
	require_once("UserClass.inc.php");
	require_once("Utility.inc.php");
	
	class SecurePage extends Page{
		protected $user;
		
		function __construct($pageTitle){
			parent::__construct($pageTitle);
			
			$this->user = $this->GetUser();
			}
			
		function GetUser(){
			global $confAdminApprovalRequired;
			
			static $user;
			
			if (func_num_args() == 2){
				$user = new User(func_get_arg(0));
				$authenticated = $user->Authenticate(func_get_arg(1));
				switch($authenticated){
					case LOGIN_SUCCEEDED:
						return $user;
					case LOGIN_FAILED_PASSWORD:
						throw new Exception("Incorrect password", LOGIN_FAILED_PASSWORD);
						break;
					case LOGIN_FAILED_NOT_VERIFIED:
						throw new Exception("Not verified", LOGIN_FAILED_NOT_VERIFIED);
						break;
					case LOGIN_FAILED_NOT_APPROVED:
						if ($confAdminApprovalRequired){
							throw new Exception("Administrator approval required", LOGIN_FAILED_NOT_APPROVED);
							}
						break;
					}
				} else {
				if (!isset($_COOKIE[Cookieify(SITENAME . "User")])){
					return false;
					}
					
				if (!isset($_COOKIE[Cookieify(SITENAME . "Session")])){
					return false;
					}
				$userName = $_COOKIE[Cookieify(SITENAME . "User")];
				$sessionCode = $_COOKIE[Cookieify(SITENAME . "Session")];
				
				$user = new User($userName);
				
				$session = $user->VerifySession($sessionCode);
				
				if ($session){
					return $user;
					}
				}
			return false;
			}

		function __destruct(){
			parent::__destruct();
			}
		}
?>