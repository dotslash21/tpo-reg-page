<?php
    /**
     * AjaxPage
     * 
     * Response- Admin College dertails
     * 
     * Created by IntelliJ IDEA.
     * User: Arkadip
     * Date: 10/05/18
     * Time: 12:40 PM 
    */

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        header('Content-Type: application/json');   //Reply json
        $return = [];

        define('_incFuncwwrfbhdjrt',true);
        require '../inc2357v3cn425073p4y53w79/func.php';

        if(admin::ajaxCheck()){
            //Admin is logged in

            $token = $_POST['token'];
            if(XCSRF::varifycsrf('ad-clg-det',$token)){

                $post_degree = $_POST['degree'];
                $post_course = $_POST['course'];

                //Degree SQL generator and query array creater when course value changes
                $crs_arr = array();
                if($post_course == 'all'){
                    $sql_degree = "SELECT DISTINCT `degree` FROM `course_list`";
                }
                else {
                    $crs_count  = Filter::Int(clean($_POST['courseCount']));

                    $i = 0;
                    $sql_degree = "SELECT DISTINCT `degree` FROM `course_list` WHERE `course_name` IN ( ?";
                    $i++;
                    while($i < $crs_count) {
                        $sql_degree .= ", ?";
                        $i++;
                    }
                    $sql_degree .= ")";

                    //Taking Course input for degree manipualtion
                    for ($i=0; $i < $crs_count ; $i++) {
                        $post_course = Filter::String(clean($post_course[$i]));
                        array_push($crs_arr,$post_course);
                    }

                }

                //Course SQL generator and query array creater when degree value changes 
                $deg_arr = array();
                if($post_degree == 'all'){
                    $sql_course = "SELECT DISTINCT `course_name` FROM `course_list`";
                }
                else {
                    $deg_count  = Filter::Int(clean($_POST['degreeCount']));

                    $j = 0;
                    $sql_course = "SELECT DISTINCT `course_name` FROM `course_list`WHERE `degree` IN ( ?";
                    $j++;

                    while($j < $deg_count) {
                        $sql_degree .= ", ?";
                        $j++;
                    }
                    $sql_course .= ")";

                    for ($j=0; $j < $deg_count ; $j++) {
                        $post_degree = Filter::String(clean($post_degree[$j])); 
                        array_push($deg_arr,$post_degree);
                    }

                }
                /**
                 * Degree addition
                 * Getting SQL as $sql_degree
                 * Getting Courses as array $crs_arr
                 * return degree if SendDegree is on
                */
                if(isset($_POST['sendDegree']) && Filter::Int($_POST['sendDegree']) == 1){
                    $degree = '';
                    $smt_degree = $pdocon->prepare($sql_degree);
                    $smt_degree->execute($crs_arr);
                    while($array_degree = $smt_degree->fetch(PDO::FETCH_ASSOC)){
                        $degree .= "<option value=\"".$array_degree['degree']."\">".$array_degree['degree']."</option>";
                    }

                    $return['degree'] = $degree;
                }

                /**
                 * Course addition
                 * Getting SQL as $sql_course
                 * Getting Degrees as array $deg_arr
                 * return degree if SendCourse is on
                */
                if(isset($_POST['sendCourse']) && Filter::Int($_POST['sendCourse']) == 1){
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