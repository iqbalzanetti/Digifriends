<?php
	session_start();
 	session_unset();
	session_destroy();
	unset($_SESSION['uid']);

	if($_SESSION['uid'] == ''){
		header('location:admin/index.php');
	}
?>