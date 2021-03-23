<?php 
	require_once 'sys/inti.php';

	session_destroy();
	header("Location:signin.php");
 ?>