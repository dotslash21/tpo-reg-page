<?php

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

        define('_incFuncwwrfbhdjrt',true);
        require '../../inc2357v3cn425073p4y53w79/func.php';
        $token = $_GET['q'];

        session_start();
        if(XCSRF::varifycsrf('ad-print-all',$token)){

            define("_CON_",true);
            require("../../inc/db-con.php");
            
            header("Content-Type: application/vnd.ms-excel");
            header("Content-disposition: attachment; filename=spreadsheet.xls");
            echo 'Id'."\t".'Institute Name'."\t".'Institute Code'."\t".'ESTD'."\t".'Institute Accriditation'."\t".'Institute Type'."\t".'Institute Affitiation'."\t".'Institute Approval'."\t".'State'."\t".'District'."\t".'Pin'."\t".'Address'."\t".'Institute Phone'."\t".'Institute E-mail'."\t".'Institute Website'."\t".'Institute Head Name'."\t".'Institute Head Designation'."\t".'Institute Head Contact'."\t".'Institute Head Mobile'."\t".'Institute Head E-mail'."\t".'Institute TPO Name'."\t".'Institute TPO Phone'."\t".'Institute TPO Phone 2'."\t".'Institute TPO E-Mail'."\t".'No of Computeter'."\t".'Number of Computer Lab'."\t".'Minimum Number of Computer Lab'."\t".'Internet Speed'."\t".'Hall Capacity'."\t".'Fiber Lan'."\t".'No of CCTV'."\t";
            
            $course_list = array();

            $sql_degree = "SELECT DISTINCT degree FROM course_list ORDER BY degree ASC";
            $result_degree  = mysqli_query($con, $sql_degree);
            while($name_degree = mysqli_fetch_array($result_degree)){

                //Associative array created with key as degree_name
                if(!isset($course_list[$name_degree['degree']])){
                    $course_list[$name_degree['degree']] = array();
                }

                $sql_course = "SELECT course_name FROM course_list WHERE degree = '".$name_degree['degree']."' ORDER BY course_name ASC";
                $result_course = mysqli_query($con,$sql_course);
                while($name_course = mysqli_fetch_array($result_course)){

                    array_push($course_list[$name_degree['degree']],$name_course['course_name']);
                    echo $name_degree['degree']. " - " .$name_course['course_name'] . "\t";
                    //print_r($course_list);
                }
            }

            echo "\n";

            $sql = "SELECT id, inst_name, inst_code, uid, estd, inst_accrd, inst_type, inst_affl, inst_aprv, state, district, pin, address, phone, email, website, head_name, inst_headdesg, head_contact, head_mob, head_email, tpo_name, tpo_ph, tpo_ph2, tpo_email, no_of_comp, num_cmplab, min_num_cmp, int_speed, hall_cap, fibop_lan, cctv_no FROM cred GROUP BY id";
            $result = mysqli_query($con,$sql);
            $row = mysqli_num_rows($result);
            while ($result_arr = mysqli_fetch_array($result)) {
                echo $result_arr['id']."\t".$result_arr['inst_name']."\t".$result_arr['inst_code']."\t".$result_arr['estd']."\t".$result_arr['inst_accrd']."\t".$result_arr['inst_type']."\t".$result_arr['inst_affl']."\t".$result_arr['inst_aprv']."\t".$result_arr['state']."\t".$result_arr['district']."\t".$result_arr['pin']."\t".trim(preg_replace('/\s+/',' ',$result_arr['address']))."\t".$result_arr['phone']."\t".$result_arr['email']."\t".$result_arr['website']."\t".$result_arr['head_name']."\t".$result_arr['inst_headdesg']."\t".$result_arr['head_contact']."\t".$result_arr['head_mob']."\t".$result_arr['head_email']."\t".$result_arr['tpo_name']."\t".$result_arr['tpo_ph']."\t".$result_arr['tpo_ph2']."\t".$result_arr['tpo_email']."\t".$result_arr['no_of_comp']."\t".$result_arr['num_cmplab']."\t".$result_arr['min_num_cmp']."\t".$result_arr['int_speed']."\t".$result_arr['hall_cap']."\t".$result_arr['fibop_lan']."\t".$result_arr['cctv_no']."\t";

                $course_list_keys = array_keys($course_list);
                for($i=0; $i< count($course_list); $i++) {

                    foreach ($course_list[$course_list_keys[$i]] as $cours) {
                        // echo $course_list_keys[$i] . '/n'; 
                        // echo $cours;
                    
                        $sql_intake = "SELECT intake FROM college_crs WHERE college_id = '".$result_arr['inst_code']."' AND deg_optd = '".$course_list_keys[$i]."' AND course_optd='".$cours."' LIMIT 1";
                        // echo "\t".$sql_intake."\t";
                        $result_crs = mysqli_query($con,$sql_intake);
                        if(mysqli_num_rows($result_crs) > 0){
                            echo mysqli_fetch_array($result_crs)['intake'] . "\t";
                        }
                        else echo "\t";
                    }
                }

                echo "\n";
            }
        }
        else {
            http_response_code(403);
            header('HTTP/1.0 403 Forbidden');
            exit;
        }
    }
    
?>