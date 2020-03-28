<?php

    $con = mysqli_connect('localhost','root');
    mysqli_select_db($con,'social');

    extract($_POST);
    session_start();

    $user_id = $_SESSION['user_id'];
    if(!empty($_FILES["image"]["name"])){
        if(isset($_FILES["image"]["name"])) {
          $_POST['image'] = $_FILES["image"][ "name" ];
          $imgname = $_POST['image'];
          $folder= '../img/';
          $target_file_img = $folder. basename($_FILES["image"]["name"]);

          $q = "UPDATE users SET image='$imgname' WHERE id=$user_id";
      
          $query = mysqli_query($con, $q);

            $res = array();
            if($query){
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file_img);
                $res = array("message"=>"Image successfully updated", "status"=> true, "image"=>$_POST['image']);
            }
            else{
                $res = array("message"=>"Image not updated", "status"=> false);
            }
        }
    }
    else{
        $res = array('message'=>'Image not uploaded', 'status'=> false);
    }

    


    
    echo json_encode($res);

?>