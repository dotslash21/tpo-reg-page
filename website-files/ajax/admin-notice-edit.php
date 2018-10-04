<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        header('Content-Type: application/json');

        session_start();

        define('_incFuncwwrfbhdjrt',true);
        require '../inc2357v3cn425073p4y53w79/func.php';

        if(admin::ajaxCheck()){
            //If admin is logged in

            $return = [];
            
            $admin = $_SESSION['admin_id'];

            $notice_title   = $_POST['notice_title'];
            $notice_desc    = $_POST['notice_desc'];
            $token          = $_POST['token'];
            $sl_no          = $_POST['sl_no'];
            
            if(XCSRF::varifycsrf('ad-nt-edit-pg',$token)){
                //If XCSRF is varified 
                
                $validity           = strtotime($_POST['validity']);    //Convert validity date to timestamp
                
                $notice_title_clean = Filter::String(clean($notice_title));
                $notice_desc_clean  = Filter::String(clean($notice_desc));
                $validity_clean     = Filter::Int(clean($validity));
                $sl_no_clean        = Filter::Int(clean($sl_no));
                
                $smt_notice_edit = $pdocon->prepare("UPDATE `notices` SET `title` = :notice_title, `content` = :notice_desc, `expiry_date` = :validity_clean WHERE `sl_no`= :sl_no "); 
                if($smt_notice_edit->execute(array(':notice_title'=>$notice_title_clean, ':notice_desc'=>$notice_desc_clean, ':validity'=>$validity_clean,':sl_no'=>$sl_no_clean))){
                    $return['succ'] = "Notice Changed Successfully<br/>";
                        
                    if($_FILES['uploadfile']['name']){
                    
                        $err= $_FILES['uploadfile']['error'];
                        if($err > 0){
                            $return['error'] = '<span style="color: #EA4335;"> File Uploading Failed. Try again </span>';
                        }
                        else{
                            if($_FILES['uploadfile']['type'] == 'image/jpeg' || $_FILES['uploadfile']['type'] == 'application/pdf' ){
                                if($_FILES['uploadfile']['size'] < (1024*1024*1024*2) ){
                                    $temp = explode(".", $_FILES["uploadfile"]["name"]);
                                    $newfilename = time().".". end($temp);
                                    if(move_uploaded_file($_FILES['uploadfile']['tmp_name'],"../upload/notice/".$newfilename)){

                                        $smt_file = $pdocon->prepare("UPDATE `notices` SET `file_name` = :filename WHERE `title` = :notice_title");
                                        if($smt_file->execute(array(':filename'=>$newfilename,':notice_title'=>$notice_title_clean))){
                                            
                                            $return['success'] = "New File uploaded Succesfully" ."<br/>";
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
            
            }

            echo json_encode($return, JSON_PRETTY_PRINT);
            exit;
        }
        else{
            header('Location: ../404.php');
        }
    }
    else{
        header('Location: ../404.php');
    }
?>