<?php

    /**
     * AjaxPage
     * 
     * Response- Institute File Upload
     * 
     * Created by IntelliJ IDEA.
     * User: Arkadip
     * Date: 10/05/18
     * Time: 12:40 PM 
    */

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Return JSON type
        header('Content-Type: application/json');
        
        //Return Variable
        $return = [];
        session_start();

        define('_incFuncwwrfbhdjrt',true);
        require '../inc2357v3cn425073p4y53w79/func.php';

        $token = $_POST['X-CSRF'];
        if(XCSRF::varifycsrf('inst-fl-up',$token)){
            //CSRF varified

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
                            if(move_uploaded_file($_FILES['uploadfile']['tmp_name'],"../upload/institute/".$newfilename)){

                                $smt_file = $pdocon->prepare("UPDATE `cred` SET `upload` = :newfile WHERE `inst_code` = :inst_code");
                                
                                if($smt_file->execute(array(':newfile'=>$newfilename,':inst_code'=>$_SESSION['inst_code']))){
                                    $return['success'] = "File uploaded Succesfully" ."<br/>";
                                    $return['fileName'] = "Uploaded file  " . $_FILES['uploadfile']['name'];
                                }
                            }
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
            else{
                $return['error'] = '<span style="color: #EA4335;"> No Choosen File</span>';
            }
        }
        else{
            //CSRF is not varified
            $return['error'] = "X-CSRF mismatched";
        }

        echo json_encode($return, JSON_PRETTY_PRINT);
        exit;
    }

?>