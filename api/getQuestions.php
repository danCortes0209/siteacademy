<?php 
    $con = mysqli_connect("localhost", "root", "", "proacademy");
    $book = "";
    
    $book = $_POST["book"];
    
    $statement = mysqli_prepare($con, "SELECT question.content, question.ans1, question.ans2, question.ans3, question.ans4 FROM books, texts, question WHERE books.id_book = texts.nbook AND texts.id_text = question.ntext AND books.book = ? ;");
    mysqli_stmt_bind_param($statement, "s", $book);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $content, $ans1, $ans2, $ans3, $ans4);
    
    $response = array();
    $response["success"] = false;
    $rows = array();
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
        $response["content"] = utf8_encode($content);
        $response["ans1"] = utf8_encode($ans1);
        $response["ans2"] = utf8_encode($ans2);
        $response["ans3"] = utf8_encode($ans3);
        $response["ans4"] = utf8_encode($ans4);
    }
    $rows[] = $response;
    
    echo json_encode($rows);
?>
