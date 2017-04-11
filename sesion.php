<?php
session_start();

if (isset($_SESSION['name'])) { #si ya hay una sesion, manda al admin
	header('Location: admin.php');
} else {
	header('Location: login.php'); # si no, manda al registro
}


?> 