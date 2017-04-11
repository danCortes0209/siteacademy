<?php
    $con = mysqli_connect("localhost", "root", "", "proacademy");
    $ntext = $_POST['ntext'];
    $ques  = $_POST['question'];
    $ans1 = $_POST['ans1'];
    $ans2 = $_POST['ans2'];
    $ans3 = $_POST['ans3'];
    $ans4 = $_POST['ans4'];
    
    $statement = mysqli_prepare($con, "INSERT INTO question(ntext,content,ans1,ans2,ans3,ans4) VALUES (?,?,?,?,?,?)");
    mysqli_stmt_bind_param($statement, "isssss", $ntext, $ques, $ans1, $ans2, $ans3, $ans4);
    mysqli_stmt_execute($statement);

    $response = array();
    $response["success"] = true;  
    $res = array();
    $res[] = $response;
    
    echo json_encode($res);
?>