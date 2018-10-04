<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        header('Content-Type: application/json');   //Reply json
        $return = [];

        session_start();

        define('_incFuncwwrfbhdjrt',true);
        require '../inc2357v3cn425073p4y53w79/func.php';

        if(admin::ajaxCheck()){
            //Admin is logged in

            $token = $_POST['token'];
            if(XCSRF::varifycsrf('ad-clg-det',$token)){

                $post_degree = Filter::String(clean($_POST['degree']));
                $post_course = Filter::String(clean($_POST['course']));

                //Degree SQL generator when course value changes
                $crs_arr = array();
                if($post_course == 'all'){
                    $sql_degree = "SELECT DISTINCT `degree` FROM `course_list`";
                }
                else {
                    $crs_count  = $_POST['courseCount'];

                    $i = 0;
                    $sql_degree = "SELECT DISTINCT `degree` FROM `course_list` WHERE `course_name` IN (".$i."";
                    $i++;
                    while($i < $crs_count) {
                        $sql_degree .= ",".$i."";
                        $i++;
                    }
                    for ($i=0; $i < $crs_count ; $i++) { 
                        array_push($crs_arr,$post_course[$i]);
                    }

                    $sql_degree .= ")";
                }

                //Course SQL generator when degree value changes
                $deg_arr = array();
                if($post_degree == 'all'){
                    $sql_course = "SELECT DISTINCT `course_name` FROM `course_list`";
                }
                else {
                    $deg_count  = $_POST['degreeCount'];

                    $j = 0;
                    $sql_course = "SELECT DISTINCT `course_name` FROM `course_list`WHERE `degree` IN (".$j."";
                    $j++;

                    while($j < $deg_count) {
                        $sql_degree .= ",".$j."";
                        $j++;
                    }
                    for ($j=0; $j < $deg_count ; $j++) { 
                        array_push($deg_arr,$post_degree[$j]);
                    }

                    
                    $sql_course .= ")";
                }
                //Degree addition

                if(isset($_POST['sendDegree']) && $_POST['sendDegree'] == 1){
                    $degree = '';
                    $smt_degree = $pdocon->prepare($sql_degree);
                    $smt_degree->execute($crs_arr);
                    while($array_degree = $smt_degree->fetch(PDO::FETCH_ASSOC)){
                        $degree .= "<option value=\"".$array_degree['degree']."\">".$array_degree['degree']."</option>";
                    }

                    $return['degree'] = $degree;
                }

                //Course addition

                if(isset($_POST['sendCourse']) && $_POST['sendCourse'] == 1){
                    $course = '';
                    $smt_course = $pdocon->prepare($sql_course);
                    $smt_course->execute($deg_arr);
                    while($array_course =$smt_course->fetch(PDO::FETCH_ASSOC)){
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