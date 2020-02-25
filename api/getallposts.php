<?php

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'social');

session_start();

$query = "select * from posts where user_id=".$_SESSION['user_id'];
$result = mysqli_query($con, $query);


$results = [];
if ($result) {
    while($row = mysqli_fetch_assoc($result)){
        $results[] = $row;
    }
}
echo json_encode($results);
?>