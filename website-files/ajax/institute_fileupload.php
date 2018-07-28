<?php

    header('Content-Type: application/json');

    $return = [];

    if($_FILES['uploadfile']['name']){
        
        $err= $_FILES['uploadfile']['error'];
        if($err > 0){
            $return['error'] = '<span style="color: #EA4335;"> File Uploading Failed. Try again </span>';
        }
        else{
            if($_FILES['uploadfile']['type'] == 'image/jpeg' || $_FILES['uploadfile']['type'] == 'application/pdf' ){
                if($_FILES['uploadfile']['size'] < (1024*1024*1024*2) ){
                    $temp = explode(".", $_FILES["uploadfile"]["name"]);
                    $newfilename = $_SESSION['inst_code'].".". end($temp);
                    move_uploaded_file($_FILES['uploadfile']['tmp_name'],"../upload/".$newfilename);
                    $return['success'] = "File uploaded Succesfully" ."<br/>";
                    $return['fileName'] = "Uploaded file" . $_FILES['uploadfile']['name'];
                }
                else{
                    $return['error'] = '<span style= "color: #EA4335;" > File Too large. Try less than 2 MB </span>';
                }
            }
            else{
                $return['error'] = '<span style="color: #EA4335;"> File type Mismatched. Try JPG or PDF </span>';
            }
        }   
    }

    echo json_encode($return, JSON_PRETTY_PRINT);
    exit;
?>