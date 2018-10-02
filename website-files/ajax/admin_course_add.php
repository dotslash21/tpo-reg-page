<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //Always return Json format
        header('Content-Type: application/json');

        //return array
        $return = [];
        
        session_start();

        define('_incFuncwwrfbhdjrt',true);
        require '../inc2357v3cn425073p4y53w79/func.php';

        $degree = $_POST['degree'];
        $course = $_POST['course'];
        $token  = $_POST['token'];

        if(XCSRF::varifycsrf('ad-cs-add',$token)){
            //If XCSRF is varified
            
            //Escaping variables
            $degree_clean   = clean($con,$degree);
            $course_clean   = clean($con,$course);

            $sql_crs_chk = "SELECT course_name FROM course_list where degree ='".$degree_clean."' AND course_name= '".$course_clean."'";
            $crs_chk = mysqli_query($con, $sql_crs_chk);

            if(mysqli_num_rows($crs_chk) > 0){
                //If alreay exists
                $return['error'] = '<span class=\"red-text text-lighten-1\">Course is Already enlisted</span>';
            }
            else{
                //If Course don't exists then add it
                $sql_admin_add = "INSERT INTO course_list(degree,course_name) VALUE('" .$degree_clean ."','". $course_clean. "')";
            
                if(mysqli_query($con,$sql_admin_add)){
                    $return['result'] = "<span class=\"green-text text-lighten-1\">You have added one Course</span>";
                }
                else{
                    $return['error']  = "<span class=\"red-text text-lighten-1\">Some Error Occours</span>";
                }
            }

        }

        echo json_encode($return, JSON_PRETTY_PRINT);
        exit;
    }
?>