<?php
	session_start();
	session_unset();
	session_destroy();
  $cookie_name = 'email';
  setcookie($cookie_name, $_COOKIE[$cookie_name], time()-60);
	header("location: index.php")
?>
