<?php session_start();

session_destroy(); #termina la sesion que ya habia

$_SESSION = array(); #los datos que estaban en la variable superglobal $_SESSION quedan limpios, por tanto se necesita volver a acceder

header('Location: index.php'); #al terminar de romper la sesion, manda hacia la pagina de inicio

?>