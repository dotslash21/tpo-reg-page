<?php

    //escaping function
    function clean($con, $var){
        return mysqli_real_escape_string($con, htmlspecialchars($var,ENT_QUOTES));
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        header('Content-Type: application/json');   //Reply json
        $return = [];

        session_start();
        if(isset($_SESSION['admin_id'])){
            //Admin is logged in

            require '../inc/func.php';

            $token = $_POST['token'];
            if(XCSRF::varifycsrf('ad-clg-det',$token)){

                define("_CON_",true);
                //Connection
                require("../inc/db-con.php");

                //Degree addition
                $degree = '';

                $sql_degree = "SELECT DISTINCT `degree` FROM `course_list`";
                $result_degree = mysqli_query($con, $sql_degree);
                while($array_degree = mysqli_fetch_array($result_degree)){
                    $degree .= "<option value=".$array_degree['degree'].">".$array_degree['degree']."</option>";
                }

                //Course addition
                $course = '';

                $sql_course = "SELECT DISTINCT `course_name` FROM `course_list`";
                $result_course = mysqli_query($con, $sql_course);
                while($array_course = mysqli_fetch_array($result_course)){
                    $course .= "<option value=".$array_course['course_name'].">".$array_course['course_name']."</option>";
                }

                $return['degree'] = $degree;
                $return['course'] = $course;
            }
            else {
                $return['error'] = "CSRF-token mismatched";
            }
        }
        else {
            $return['error'] = "Admin is not logged in";
        }

        echo json_encode($return, JSON_PRETTY_PRINT);
        exit;
    }

    ?>