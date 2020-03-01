<?php

    $con = mysqli_connect('localhost','root');
    mysqli_select_db($con,'social');

    extract($_POST);
    session_start();

    $newpassword = $_POST['newpassword'];
    $oldpassword = $_POST['oldpassword'];
    $user_id = $_SESSION['user_id'];
    $oldpass = md5($oldpassword);
    $newpass = md5($newpassword);
    $q = "UPDATE users SET password='$newpass' WHERE id=$user_id and password='$oldpass' ";

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