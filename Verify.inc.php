<?php
	require_once("Config.inc.php");
	require_once("Page.inc.php");
	require_once("Database.inc.php");
	require_once("UserClass.inc.php");
	require_once("HtmlElement.inc.php");
	
	class Verification extends Page{
		protected $Verifying;
		
		function __construct($title = "Verify"){
			parent::__construct($title);
			
			if (isset($_POST['SubmitVerification'])){
				$this->verifying = true;
				} else {
				$this->verifying = false;
				}
			}
			
		function ProcessVerification(){
			try {
				$user = new User($_POST['userName']);
				} catch (Exception $e){
				if ($e->getCode() == E_USER_NO_EXIST){
					throw $e;
					return;
					} else {
					$this->UnrecoverableError();
					}
				}
			$id = $user->GetUserId();
			
			$conn = GetDatabaseConn();
			
			$stmt = $conn->stmt_init();
			
			if ($stmt->prepare("SELECT code FROM emailVerification WHERE user = ?")){
				$stmt->bind_param("i", $id);
				$stmt->execute();
				$stmt->bind_result($resultCode);
				$stmt->store_result();
				if (!$stmt->fetch()){
					throw new Exception("no verification code", E_NO_VER_CODE);
					}
				} else {
				throw new Exception("prepared statement failed", E_PREPARED_STMT_UNRECOV);
				}
				
			if ($resultCode == $_POST['verificationCode']){
				try {
					$this->UpdateVerification($id);
					} catch (Exception $e){
					$this->UnrecoverableError();
					}
				return VERIFY_SUCCEEDED;
				} else {
				throw new Exception("invalid verification code", E_INVALID_VERIFICATION_CODE);
				}
				
			return;
			}
			
		function UpdateVerification($userId){
			$conn = GetDatabaseConn();
			
			$stmt = $conn->stmt_init();
			if ($stmt->prepare("DELETE FROM emailVerification WHERE user = ?")){
				$stmt->bind_param("i", $userId);
				$stmt->execute();
				} else {
				throw new Exception("prepared statement failed", E_PREPARED_STMT_UNRECOV);
				}

			$stmt = $conn->stmt_init();
			if ($stmt->prepare("UPDATE users SET verified=true WHERE id = ?")){
				$stmt->bind_param("i", $userId);
				$stmt->execute();
				} else {
				throw new Exception("prepared statement failed", E_PREPARED_STMT_UNRECOV);
				}
			}
			
		function GetVerificationForm($methodTag){
			$form = new FormElement("index.php?$methodTag");
			$usernameLabel = new LabelElement();
			$usernameLabel->Contents = "Username:";
			$form->Contents['usernameLabel'] = $usernameLabel;
			$usernameField = new TextInputElement("userName");
			$form->Contents['usernameField'] = $usernameField;
			$verificationCodeLabel = new LabelElement();
			$verificationCodeLabel->Contents = "Verification code:";
			$form->Contents['verificationCodeLabel'] = $verificationCodeLabel;
			$verificationCodeField = new TextInputElement("verificationCode");
			$form->Contents['verificationCodeField'] = $verificationCodeField;
			$submitButton = new SubmitButtonElement("SubmitVerification", "Submit");
			$form->Contents['submitButton'] = $submitButton;
			$resetButton = new ResetButtonElement();
			$form->Contents['resetButton'] = $resetButton;
			
			return $form;
			}
		}
?>