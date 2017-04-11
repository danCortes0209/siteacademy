<?php 
    
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
     $con = mysqli_connect("localhost", "root", "", "proacademy");
    
	$libro = filter_var($_POST['libro'], FILTER_SANITIZE_STRING); 
	$autor = filter_var($_POST['autor'], FILTER_SANITIZE_STRING);
	$texto = filter_var($_POST['texto'], FILTER_SANITIZE_STRING);
    $nivel = filter_var($_POST['nivel'], FILTER_SANITIZE_STRING);
	$pregunta = filter_var($_POST['pregunta'], FILTER_SANITIZE_STRING);
	$resp1 = filter_var($_POST['resp1'], FILTER_SANITIZE_STRING);
	$resp2 = filter_var($_POST['resp2'], FILTER_SANITIZE_STRING);
	$resp3 = filter_var($_POST['resp3'], FILTER_SANITIZE_STRING);
	$resp4 = filter_var($_POST['resp4'], FILTER_SANITIZE_STRING);
    $id_libro = 0;
    $id_texto = 0;
    
    $statement = mysqli_prepare($con, "INSERT INTO books(book, author) VALUES (?, ?);");
    mysqli_stmt_bind_param($statement, "ss", $libro, $autor);
    mysqli_stmt_execute($statement);
    
    
    $statement2 = mysqli_prepare($con, "SELECT id_book FROM books WHERE book = ? AND author = ? LIMIT 1;");
    mysqli_stmt_bind_param($statement2, "ss", $libro, $autor);
    mysqli_stmt_execute($statement2);
    mysqli_stmt_store_result($statement2);
    mysqli_stmt_bind_result($statement2, $id_book);
    while(mysqli_stmt_fetch($statement2)){
        $id_libro = $id_book;
    }
    
    $statement3 = mysqli_prepare($con, "INSERT INTO texts(nbook, content, leveltxt) VALUES (?, ?, ?);");
    mysqli_stmt_bind_param($statement3, "isi",$id_libro, $texto, $nivel);
    mysqli_stmt_execute($statement3);
    
    $statement4 = mysqli_prepare($con, "SELECT id_text FROM texts WHERE content = ? AND leveltxt = ?;");
    mysqli_stmt_bind_param($statement4, "si", $texto, $nivel);
    mysqli_stmt_execute($statement4);
    mysqli_stmt_store_result($statement4);
    mysqli_stmt_bind_result($statement4, $id_text);
    while(mysqli_stmt_fetch($statement4)){
        $id_texto = $id_text;
    }
    
    $statement5 = mysqli_prepare($con, "INSERT INTO question(ntext,content,ans1,ans2,ans3,ans4) VALUES (?,?,?,?,?,?)");
    mysqli_stmt_bind_param($statement5, "isssss", $id_texto, $pregunta,$resp1,$resp2,$resp3,$resp4);
    mysqli_stmt_execute($statement5);
    
    header('Location: close.php');
    

}

require 'addbook.view.php';

?>
