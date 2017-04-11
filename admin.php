<?php session_start();

if (isset($_SESSION['name'])) {
	header('Location: addbook.php');
} else {
	header('Location: login.php');
}


?>