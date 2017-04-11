<?php 
    $con = mysqli_connect("localhost", "root", "", "proacademy");
    $pack = "";
    
    $pack = $_POST["package"];
    
    $statement = mysqli_prepare($con, "SELECT books.id_book, books.book, books.author, texts.id_text, texts.content, texts.leveltxt, texts.package FROM books, texts WHERE books.id_book = texts.nbook AND package= ? ;");
    mysqli_stmt_bind_param($statement, "i", $pack);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $id_book, $book, $author, $id_text, $content, $leveltxt, $package);
    
    $response = array();
    $response["success"] = false;
    $rows = array();
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
        $response["id_book"] = utf8_encode($id_book);
        $response["book"] = utf8_encode($book);
        $response["author"] = utf8_encode($author);
        $response["id_text"] = utf8_encode($id_text);
        $response["content"] = utf8_encode($content);
        $response["leveltxt"] = utf8_encode($leveltxt);
        $response["package"] = utf8_encode($package);
        $rows[] = $response;
    }
    
    echo json_encode($rows);
?>
