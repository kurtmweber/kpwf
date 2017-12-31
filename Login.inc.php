<?php
	require_once("Config.inc.php");
	require_once("SecurePage.inc.php");
	require_once("Database.inc.php");
	require_once("UserClass.inc.php");
	require_once("HtmlElement.inc.php");
	
	class Login extends SecurePage{
		function __construct($title){
			parent::__construct($title);
			
			return;
			}
			
		protected function ProcessLogin(){
			try {
				$this->user = $this->GetUser($_POST['userName'], $_POST['password']);
				} catch (Exception $e){
				switch($e->getCode()){
					case LOGIN_FAILED_PASSWORD:
						throw new Exception("Incorrect password", LOGIN_FAILED_PASSWORD);
						break;
					case LOGIN_FAILED_NOT_VERIFIED:
						throw new Exception("Not verified", LOGIN_FAILED_NOT_VERIFIED);
						break;
					case LOGIN_FAILED_NOT_APPROVED:
						throw new Exception("Administrator approval required", LOGIN_FAILED_NOT_APPROVED);
						break;
					default:
						$this->UnrecoverableError();
					}
				}
				
			if (!$this->user){
				return;
				}
			
			$loginId = $this->user->Login($_SERVER['REMOTE_ADDR']);
			$sessionCode = $this->user->NewSession($loginId);
			
			$this->SendSessionCookie($sessionCode);
			return;
			}
			
		protected function SendSessionCookie($sessionCode){
			setcookie(SITENAME . "Session", $sessionCode, time() + (365*24*60*60));
			setcookie(SITENAME . "User", $this->user->GetUserName(), time() + (365*24*60*60));
			
			return;
			}
			
		protected function GetLoginForm($methodTag){
			$form = new FormElement("index.php?$methodTag");
			
			$submitLoginField = new HiddenInputElement("SubmitLogin", "TRUE");
			$form->Contents['submitLoginField'] = $submitLoginField;
			
			$usernameLabel = new LabelElement();
			$usernameLabel->Contents = "Username:";
			$form->Contents['usernameLabel'] = $usernameLabel;
			
			$usernameField = new TextInputElement("userName");
			$form->Contents['usernameField'] = $usernameField;
			
			$passwordLabel = new LabelElement();
			$passwordLabel->Contents = "Password:";
			$form->Contents['passwordLabel'] = $passwordLabel;
			
			$passwordField = new PasswordInputElement("password");
			$form->Contents['passwordField'] = $passwordField;
			
			$form->Contents['submitButton'] = new SubmitButtonElement("loginSubmit", "Log in");
			$form->Contents['resetButton'] = new ResetButtonElement();
			
			return $form;
			}
		}
?>