<?php
	require_once("Config.inc.php");
	require_once("SecurePage.inc.php");
	require_once("Database.inc.php");
	require_once("UserClass.inc.php");
	require_once("HtmlElement.inc.php");
	
	class Registration extends SecurePage{
		function __construct($title){
			parent::__construct($title);
			
			return;
			}
	
		protected function GetRegistrationForm($methodTag){
			$form = new FormElement("index.php?$methodTag");
			
			$form->Contents['submitField'] = new HiddenInputElement("SubmitRegistration", "TRUE");
			
			$usernameLabel = new LabelElement();
			$usernameLabel->Contents = "Username:";
			$form->Contents['usernameLabel'] = $usernameLabel;
			$form->Contents['usernameField'] = new TextInputElement("userName");
			
			$emailLabel = new LabelElement();
			$emailLabel->Contents = "E-mail address:";
			$form->Contents['emailLabel'] = $emailLabel;
			$form->Contents['emailField'] = new TextInputElement("email");
			
			$passwordLabel = new LabelElement();
			$passwordLabel->Contents = "Password";
			$form->Contents['passwordLabel'] = $passwordLabel;
			$form->Contents['passwordField'] = new PasswordInputElement("password");
			
			$birthDateLabel = new LabelElement();
			$birthDateLabel->Contents = "Date of Birth:";
			$form->Contents['birthDateLabel'] = $birthDateLabel;
			
			$birthYearField = new SelectElement("birthYear");
			$birthYearField->Contents[] = new OptionElement();
			$birthYearField->Contents[0]->Contents = "Year";
			
			$curYear = getdate()['year'];
			do {
				$tmpYear = new OptionElement($curYear);
				$tmpYear->Contents = $curYear;
				$birthYearField->Contents[] = clone $tmpYear;
				$curYear--;
				} while ($curYear >= 1900);
			$form->Contents['birthYearField'] = $birthYearField;
			
			$birthMonthField = new SelectElement("birthMonth");
			$birthMonthField->Contents[] = new OptionElement();
			$birthMonthField->Contents[0]->Contents = "Month";
			
			$tmpMonth = new OptionElement("01");
			$tmpMonth->Contents = "January";
			$birthMonthField->Contents[] = clone $tmpMonth;
			$tmpMonth = new OptionElement("02");
			$tmpMonth->Contents = "February";
			$birthMonthField->Contents[] = clone $tmpMonth;
			$tmpMonth = new OptionElement("03");
			$tmpMonth->Contents = "March";
			$birthMonthField->Contents[] = clone $tmpMonth;
			$tmpMonth = new OptionElement("04");
			$tmpMonth->Contents = "April";
			$birthMonthField->Contents[] = clone $tmpMonth;
			$tmpMonth = new OptionElement("05");
			$tmpMonth->Contents = "May";
			$birthMonthField->Contents[] = clone $tmpMonth;
			$tmpMonth = new OptionElement("06");
			$tmpMonth->Contents = "June";
			$birthMonthField->Contents[] = clone $tmpMonth;
			$tmpMonth = new OptionElement("07");
			$tmpMonth->Contents = "July";
			$birthMonthField->Contents[] = clone $tmpMonth;
			$tmpMonth = new OptionElement("08");
			$tmpMonth->Contents = "August";
			$birthMonthField->Contents[] = clone $tmpMonth;
			$tmpMonth = new OptionElement("09");
			$tmpMonth->Contents = "September";
			$birthMonthField->Contents[] = clone $tmpMonth;
			$tmpMonth = new OptionElement("10");
			$tmpMonth->Contents = "October";
			$birthMonthField->Contents[] = clone $tmpMonth;
			$tmpMonth = new OptionElement("11");
			$tmpMonth->Contents = "November";
			$birthMonthField->Contents[] = clone $tmpMonth;
			$tmpMonth = new OptionElement("12");
			$tmpMonth->Contents = "December";
			$birthMonthField->Contents[] = clone $tmpMonth;
			
			$form->Contents['birthMonthField'] = $birthMonthField;
			
			$birthDateField = new SelectElement("birthDate");
			$birthDateField->Contents[] = new OptionElement();
			$birthDateField->Contents[0]->Contents = "Day";
			
			$tmpDay = new OptionElement("01");
			$tmpDay->Contents = "1";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("02");
			$tmpDay->Contents = "2";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("03");
			$tmpDay->Contents = "3";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("04");
			$tmpDay->Contents = "4";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("05");
			$tmpDay->Contents = "5";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("06");
			$tmpDay->Contents = "6";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("07");
			$tmpDay->Contents = "7";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("08");
			$tmpDay->Contents = "8";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("09");
			$tmpDay->Contents = "9";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("10");
			$tmpDay->Contents = "10";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("11");
			$tmpDay->Contents = "11";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("12");
			$tmpDay->Contents = "12";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("13");
			$tmpDay->Contents = "13";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("14");
			$tmpDay->Contents = "14";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("15");
			$tmpDay->Contents = "15";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("16");
			$tmpDay->Contents = "16";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("17");
			$tmpDay->Contents = "17";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("18");
			$tmpDay->Contents = "18";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("19");
			$tmpDay->Contents = "19";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("20");
			$tmpDay->Contents = "20";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("21");
			$tmpDay->Contents = "21";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("22");
			$tmpDay->Contents = "22";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("23");
			$tmpDay->Contents = "23";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("24");
			$tmpDay->Contents = "24";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("25");
			$tmpDay->Contents = "25";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("26");
			$tmpDay->Contents = "26";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("27");
			$tmpDay->Contents = "27";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("28");
			$tmpDay->Contents = "28";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("29");
			$tmpDay->Contents = "29";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("30");
			$tmpDay->Contents = "30";
			$birthDateField->Contents[] = clone $tmpDay;
			$tmpDay = new OptionElement("31");
			$tmpDay->Contents = "31";
			$birthDateField->Contents[] = clone $tmpDay;
			
			$form->Contents['birthDateField'] = $birthDateField;
			
			$submitButton = new SubmitButtonElement("submitButton", "Submit");
			$form->Contents['submitButton'] = $submitButton;
			$resetButton = new ResetButtonElement();
			$form->Contents['resetButton'] = $resetButton;
			
			return $form;
			}
			
		protected function Register(){
			$userName = $_POST['userName'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$birthMonth = $_POST['birthMonth'];
			$birthDate = $_POST['birthDate'];
			$birthYear = $_POST['birthYear'];
			
			if (preg_match("/[a-zA-Z0-9_-]/", $userName) === 0){
				$invalids['userName'] = true;
				}
				
			if (preg_match("/@/", $email) === 0){
				$invalids['email'] = true;
				}
				
			if ((strlen($password) < 8) || ($password == $userName) || ($password == $email)){
				$invalids['password'] = true;
				}
				
			$birthYear = trim($birthYear);
			$birthMonth = trim($birthMonth);
			$birthDate = trim($birthDate);
			
			if (!$this->ValidateDate($birthYear, $birthMonth, $birthDate)){
				$invalids['birthDay'] = true;
				}
				
			if (isset($invalids)){
				return $invalids;
				}
				
			$dob = $birthYear . "-" . $birthMonth . "-" . $birthDate;
				
			try {
				$user = new User($userName, $password, $_SERVER['REMOTE_ADDR'], $email, $dob);
				} catch (Exception $e){
				if ($e->getCode() == E_PREPARED_STMT_UNRECOV){
					printf("Unrecoverable error, exiting.");
					exit();
					}
				if ($e->getCode() == E_USERNAME_EXISTS){
					throw new Exception("Username already exists", E_USERNAME_EXISTS);
					}
				if ($e->getCode() == E_EMAIL_EXISTS){
					throw new Exception("Email already in use", E_EMAIL_EXISTS);
					}
				}
			return REGISTRATION_SUCCEEDED;
			}
			
		protected function ValidateDate($birthYear, $birthMonth, $birthDate){			
			if (!is_int($birthYear) && !ctype_digit($birthYear)){
				return false;
				}
				
			if (!is_int($birthMonth) && !ctype_digit($birthMonth)){
				return false;
				}
				
			if (!is_int($birthDate) && !ctype_digit($birthDate)){
				return false;
				}
				
			if ($birthYear < 1900){
				return false;
				}
			
			if ($birthYear > (date("Y") - 18)){
				return false;
				}
				
			if ($birthMonth < 1){
				return false;
				}
				
			if ($birthMonth > 12){
				return false;
				}
				
			if ($birthDate < 1){
				return false;
				}
				
			if ($birthDate > 31){
				return false;
				}
				
			return checkdate($birthMonth, $birthDate, $birthYear);
			}
		}
?>