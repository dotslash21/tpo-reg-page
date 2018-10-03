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
            
            $current_date   = (int)time();      //Current timestamp

            $notice_title   = $_POST['notice_title'];
            $notice_desc    = $_POST['notice_desc'];
            $token          = $_POST['X-CSRF'];
            
            if(XCSRF::varifycsrf('ad-nt-add',$token)){
                //If XCSRF is varified 
                
                $validity       = strtotime($_POST['validity']);    //Convert validity date to timestamp
                
                $notice_title_clean = clean($con, $notice_title);
                $notice_desc_clean  = clean($con, $notice_desc);
                $validity_clean     = clean($con, $validity);

                $sql_notice_add = "INSERT INTO notices(title, content, publish_date, expiry_date, added_by) VALUE('".$notice_title_clean."', '".$notice_desc_clean."', '".$current_date."', '".$validity_clean."', '".$admin."')";
                if(mysqli_query($con,$sql_notice_add)){
                    $return['succ'] = "Notice Uploaded Successfully<br/>";
                    
                    //Make the notice visible change active as 1
                    $sql_active = "UPDATE notices SET active_status = 1 WHERE title = '".$notice_title_clean."'";
                    if(mysqli_query($con, $sql_active)){
                        
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
                                            $sql = "UPDATE `notices` SET `file_name` = '".$newfilename."' WHERE `title` = '".$notice_title_clean."'";
                                            if(mysqli_query($con,$sql)){
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
                    //File Upload
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