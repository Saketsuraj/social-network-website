<?php

    $con = mysqli_connect('localhost','root');
    mysqli_select_db($con,'social');

    extract($_POST);
    session_start();

    $username = $_POST['username'];
    $user_id = $_SESSION['user_id'];
    $password= $_POST['password'];
    $pass = md5($password);
    $q = "UPDATE users SET username='$username' WHERE id=$user_id and password='$pass' ";

    $query = mysqli_query($con, $q);


    $res = array();
    if($query){
        $res = array("message"=>"Username successfully updated", "status"=> true);
    }
    else{
        $res = array("message"=>"Username not updated", "status"=> false);
    }
    echo json_encode($res);

?>