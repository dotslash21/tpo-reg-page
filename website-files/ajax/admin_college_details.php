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

                $post_degree = $_POST['degree'];
                $post_course = $_POST['course'];

                //Degree SQL generator when course value changes
                if($post_course == 'all'){
                    $sql_degree = "SELECT DISTINCT `degree` FROM `course_list`";
                }
                else {
                    $crs_count  = $_POST['courseCount'];

                    $i = 0;
                    $sql_degree = "SELECT DISTINCT `degree` FROM `course_list` WHERE `course_name` IN ('".$post_course[$i]."'";
                    $i++;
                    while($i < $crs_count) {
                        $sql_degree .= ",'".$post_course[$i]."'";
                        $i++;
                    }

                    $sql_degree .= ")";
                }

                //Course SQL generator when degree value changes
                if($post_degree == 'all'){
                    $sql_course = "SELECT DISTINCT `course_name` FROM `course_list`";
                }
                else {
                    $deg_count  = $_POST['degreeCount'];

                    $j = 0;
                    $sql_course = "SELECT DISTINCT `course_name` FROM `course_list`WHERE `degree` IN ('".$post_degree[$j]."'";
                    $j++;

                    while($j < $deg_count) {
                        $sql_degree .= ",'".$post_degree[$j]."'";
                        $j++;
                    }
                    
                    $sql_course .= ")";
                }
                //Degree addition

                if(isset($_POST['sendDegree']) && $_POST['sendDegree'] == 1){
                    $degree = '';
                    $result_degree = mysqli_query($con, $sql_degree);
                    while($array_degree = mysqli_fetch_array($result_degree)){
                        $degree .= "<option value=\"".$array_degree['degree']."\">".$array_degree['degree']."</option>";
                    }

                    $return['degree'] = $degree;
                }

                //Course addition

                if(isset($_POST['sendCourse']) && $_POST['sendCourse'] == 1){
                    $course = '';
                    $result_course = mysqli_query($con, $sql_course);
                    while($array_course = mysqli_fetch_array($result_course)){
                        $course .= "<option value=\"".$array_course['course_name']."\">".$array_course['course_name']."</option>";
                    }

                    $return['course'] = $course;
                }
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