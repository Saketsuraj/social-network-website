<?php
    function __autoload($class) {
        include "include/$class.php";
    }
    $upl = new Upload();
    $name = $_POST['name'];
     // uploadFile function
    if(!empty($_FILES["file_url"]["type"])){
        $fileName = time().'_'.$_FILES['file_url']['name'];
        $valid_extensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["file_url"]["name"]);
        $file_extension = end($temporary);
        if((($_FILES["file_url"]["type"] == "image/png") || ($_FILES["file_url"]["type"] == "image/jpg") || ($_FILES["file_url"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)) {
            $sourceUPLPath = $_FILES['file_url']['tmp_name'];
            $targetUPLPath = ROOT_UPLOAD_PATH.$fileName;
            if(move_uploaded_file($sourceUPLPath,$targetUPLPath)) {
                $uploadedFileName = $fileName;
            } else {
                $uploadedFileName = '';
            }
        } else {
            $json['error']['file'] = 'Please choose valid file';
        }
    } else {
        $json['error']['file'] = 'Please choose image';
    }
     
    if(empty(trim($name))) {
        $json['error']['name'] = 'Please enter name';
    }
    
    if(empty($json['error'])) {  
        $upl->setName($name);
        $upl->setFileURL($uploadedFileName);   
        $chkStatus = $upl->doSave();
        $json['file_name'] = HTTP_UPLOAD_PATH.$uploadedFileName;
        $json['msg'] = 'success';
    } 
    echo json_encode($json);
?>