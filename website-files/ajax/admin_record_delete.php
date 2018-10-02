<?php
    define("_CON_",true);
    //Connection
    require("../inc/db-con.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        define('_incFuncwwrfbhdjrt',true);
        require_once '../inc2357v3cn425073p4y53w79/func.php';

        $return = [];
        session_start();

        //Always return Json format
        header('Content-Type: application/json');

        if(isset($_SESSION['admin_id'])){
            $token = $_POST['id'];
            if(isset($token)){
                if(XCSRF::varifycsrf('ad-clg-det',$token)){
                    $clgId = $_POST['clgId'];

                    $sql_cred = "DELETE FROM `cred` WHERE inst_code = ".$clgId."";
                    $sql_ces = "DELETE FROM `college_crs` WHERE college_id = ".$clgId."";
                    
                    $result_cred= mysqli_query($con, $sql_cred);
                    if (mysqli_affected_rows($con)){
                        //Deleted the Cradnnnnn
                        $success = true;
                        $return['credential'] = "Successfully Deleted Creadentials";
                        
                        $result_crs = mysqli_query($con, $sql_ces);
                        if(mysqli_affected_rows($con)){
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