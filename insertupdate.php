<?php

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'social');

extract($_POST);
session_start();

if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $age = $_POST['age'];
    $user_id = $_SESSION['user_id'];

    $q = "insert into updatedetails ( fname, age, user_id ) values ( '$fname', '$age', '$user_id')";

    $query = mysqli_query($con, $q);

    header('location:personal-profile.php');
}

?>