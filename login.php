<?php  session_start();

if (isset($_SESSION['name'])) {
	header('Location: admin.php'); #si ya hay una sesion, pasa directamente al administrador de actividades
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') { #si no lo hay, entonces si el server detecca que se han enviado datos por el metodo post, obtiene los valores
	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING); #este filtro deja unicamente numeros y letras y quita caracteres especiales
	$passwd = $_POST['passwd'];
	$passwd = hash('sha512', $passwd);

	$errores = '';

	try {#si no, inicia una conexion hacia mysql
			$conexion = new PDO('mysql:host=localhost;dbname=proacademy','root','');
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage(); #si hay un error, lo imprime
	}
	$statement = $conexion->prepare('SELECT * FROM users WHERE name = :name AND passwd = :passwd');
	$statement->execute(array(':name' => $name, ':passwd' => $passwd)); #se igualan las variables de los placeholders con las variables dadas
	$resultado = $statement->fetch();

	if ($resultado == false) { #si es falso, o sea, la consulta no funciono, imprime el error de que el usuario ya existe
		$errores .= '<li style="color:grey;">El usuario o la contraseña son incorrectos</li>';
	} elseif ($resultado !== false) { #si la consulta funciono, entonces manda al administrador
		$_SESSION['name'] = $name;
		header("location:admin.php"); #se envia hacia el administrador;
	}
}

require 'login.view.php'; #usa como vista el php con el contenido del login


?>