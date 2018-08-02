<?php
    define("_CON_",true);
    //Connection
    require("../inc/db-con.php");

    //escaping function
    function clean($con, $var){
        return mysqli_real_escape_string($con, $var);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //Always return Json format
        header('Content-Type: application/json');

        //return array
        $return = [];

        $degree = $_POST['degree'];
        $course = $_POST['course'];

        //Escaping variables
        $degree_clean   = clean($con,$degree);
        $course_clean   = clean($con,$course);

        $sql_crs_chk = "SELECT course_name FROM course_list where degree ='".$degree_clean."' AND course_name= '".$course_clean."'";
        $crs_chk = mysqli_query($con, $sql_crs_chk);

        if(mysqli_num_rows($crs_chk) > 0){
            //If alreay exists
            $return['error'] = 'Course is Already enlisted';
        }
        else{
            //If Course don't exists then add it
            $sql_admin_add = "INSERT INTO course_list(degree,course_name) VALUE('" .$degree_clean ."','". $course_clean. "')";
        
            if(mysqli_query($con,$sql_admin_add)){
                $return['result'] = "You have added one Course";
            }
            else{
                $return['error']  = "Some Error Occours";
            }
        }

        echo json_encode($return, JSON_PRETTY_PRINT);
        exit;
    }
?>