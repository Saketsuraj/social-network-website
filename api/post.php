<?php
    include "server.php";

    $publish = $_POST['publish'];

    $query = "insert into posts(publish) values ('$publish')";
    $runquery = mysqli_query($conn, $query);

?>