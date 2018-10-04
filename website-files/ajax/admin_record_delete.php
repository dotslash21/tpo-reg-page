<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        session_start();
        define('_incFuncwwrfbhdjrt',true);
        require_once '../inc2357v3cn425073p4y53w79/func.php';

        $return = [];

        //Always return Json format
        header('Content-Type: application/json');

        if(admin::ajaxCheck()){
            $token = $_POST['id'];
            if(isset($token)){
                if(XCSRF::varifycsrf('ad-clg-det',$token)){
                    $clgId = Filter::String(clean($_POST['clgId']));

                    $smt_cred   = $pdocon->prepare("DELETE FROM `cred` WHERE inst_code = :clgId");
                    $smt_ces    = $pdocon->prepare("DELETE FROM `college_crs` WHERE college_id = :clgId");
                    
                    $smt_cred->execute(array(':clgid'=>$clgId));
                    if ($smt_cred->rowCount() > 0){
                        //Deleted the Cradnnnnn
                        $success = true;
                        $return['credential'] = "Successfully Deleted Creadentials";
                        
                        $smt_ces->execute(array(':clgid'=>$clgId));
                        if($smt_ces->rowCount() > 0){
                            //Deleted the courses
                            $success = true;
                            $return['course'] = "Successfully Deleted Courses";
                        }
                        else{
                            //Failed to dalete the Courses
                            $success = false;
                            $return['error'] = "Failed to Delete courses";
                        }
                    }
                    else{
                        //Failed to delete courses
                        $success = false;
                        $return['error'] = "Failed to Delete Creadentials";
                    }
                    $return['success'] = $success;
                }
                else{
                    $return['n-a'] = 3;
                }
            }
            else{
                $return['n-a'] = 2;
            }
        }
        else{
            $return['n-a'] = 1;
        }
        echo json_encode($return, JSON_PRETTY_PRINT);
        exit;
    }

?>