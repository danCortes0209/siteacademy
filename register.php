<?php session_start();

if (isset($_SESSION['name'])) {
	header('Location: admin.php'); #si ya hay una sesion, pasa directamente al administrador de actividades
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') { #si no lo hay, entonces si el server detecca que se han enviado datos por el metodo post, obtiene los valores
	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING); #este filtro deja unicamente numeros y letras y quita caracteres especiales
	$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
	$passwd = $_POST['passwd'];
	$country = $_POST['country'];
	$passwd = hash('sha512', $passwd); #encripta la contraseña con el algoritmo sha512


	$errores = '';

	if (empty($name) or empty($email) or empty($passwd) or empty($country)) { #si estan vacios, pasan los valores hacia la vista, imprimiendo una li
		$errores .= '<li style="color:grey;">Por favor rellena todos los datos correctamente</li>';
	} else { 
		try { #si no, inicia una conexion hacia mysql
			$conexion = new PDO('mysql:host=localhost;dbname=proacademy','root','');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage(); #si hay un error, lo imprime
		}

		$statement = $conexion->prepare('SELECT * FROM users WHERE name = :name LIMIT 1'); #selecciona los usuarios donde el nombre de usuario sea el mismo que el nombre dado
		$statement->execute(array(':name' => $name));
		$resultado = $statement->fetch(); #mete los valores en un arreglo, donde el placeholder :name es igual a la variable $name obtenida por post

		if ($resultado != false) { #si es verdadero, o sea, la consulta funciono, imprime el error de que el usuario ya existe
			$errores .= '<li style="color:grey;">El usuario ya existe</li>';
		} 
	}

	if ($errores == '') { #si no hubo ningun error, se pasa directo a la base de datos
		$statement = $conexion->prepare('INSERT INTO users (name,email,passwd,country,permission) VALUES ( :name, :email, :passwd, :country, "user")'); #se prepara la consulta
		$statement->execute(array(':name' => $name, ':email' => $email, ':passwd' => $passwd, ':country' => $country)); #se igualan las variables de los placeholders con las variables dadas
		header('Location: login.php'); #redirecciona al login
	}
}

require 'register.view.php';

?>