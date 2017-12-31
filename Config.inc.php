<?php
	// set this to the name of your website
	define("SITENAME", "KPWF Test Site");
	
	define("E_USERNAME_EXISTS", 0);
	define("E_EMAIL_EXISTS", 1);
	define("E_PREPARED_STMT_UNRECOV", 2);
	define("E_USER_NO_EXIST", 3);
	define("E_USERID_NO_EXIST", 4);
	define("E_NO_VER_CODE", 5);
	define("E_TOO_MANY_ARGS", 6);
	define("E_INVALID_VERIFICATION_CODE", 7);
	define("REGISTRATION_SUCCEEDED", 8);
	define("VERIFY_SUCCEEDED", 9);
	define("VERIFY_FAILED_INVALID_CODE", 10);
	
	
	
	define("SQL_ERROR_DUP_ENTRY", 1062);
	define("SQL_ERROR_DUP_ENTRY_KEYNAME", 1586);
?>