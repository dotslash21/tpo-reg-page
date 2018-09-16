<?php
    define("_CON_",true);
    //Connection
    require("../inc/db-con.php");

    //escaping function
    function clean($con, $var){
        return mysqli_real_escape_string($con, $var);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        session_start();
        if(isset($_POST['token']) && $_POST['token'] == $_SESSION['token'] ){
            //Always return Json format
            header('Content-Type: application/json');

            $return = [];

            $value = '';

            $sql_degree = "SELECT DISTINCT degree FROM course_list";
            $result_degree = mysqli_query($con, $sql_degree);
            while ($array_degree = mysqli_fetch_array($result_degree)) {
                
                $value .=   "<optgroup label=\"".$array_degree['degree']."\">";
                
                $sql_opt = "SELECT course_name FROM course_list WHERE degree =\"" . $array_degree['degree'] . "\"";
                $result_course = mysqli_query($con, $sql_opt);
                while ($array_course = mysqli_fetch_array($result_course)) {

                    $value .= "<option value=\"".$array_degree['degree']. " - " .$array_course['course_name'] ."\">".$array_degree['degree'] ." - " .$array_course['course_name']."</option>";
                                    
                    }
                }
            
                $return['course'] = $value;
            echo json_encode($return, JSON_PRETTY_PRINT);
            exit;
        }     
    }
?>