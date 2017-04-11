<?php 
    $con = mysqli_connect("localhost", "root", "", "proacademy");
    $book = "";
    
    $book = $_POST["book"];
    
    $statement = mysqli_prepare($con, "SELECT texts.content FROM books, texts WHERE books.id_book = texts.nbook AND books.book= ? ;");
    mysqli_stmt_bind_param($statement, "s", $book);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $content);
    
    $response = array();
    $response["success"] = false;
    $rows = array();
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;
        $response["content"] = utf8_encode($content);
        $rows[] = $response;
    }
    
    echo json_encode($rows);