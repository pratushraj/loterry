<?php
session_start();
    if(count($_SESSION)) {
		foreach($_SESSION AS $key=>$value)
		{
			session_unset();
			unset($_SESSION[$key]);
		}
		session_destroy();
        header("Location: login.php");
        exit;
	}



    ?>