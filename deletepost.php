<?php

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'social');

extract($_POST);
session_start();

$post = $_POST['post'];
    $user_id = $_SESSION['user_id'];
    $q = "insert into posts ( user_id, post ) values ( '$user_id', '$post ')";

    $query = mysqli_query($con, $q);

    $res = array();
    if($query){
        $res = array("message"=>"Successfully posted", "status"=> true);
    }
    else{
        $res = array("message"=>"Not posted", "status"=> false);
    }
    echo json_encode($res);



?>