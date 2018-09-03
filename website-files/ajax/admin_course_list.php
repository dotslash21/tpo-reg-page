<?php
    
    if(1){

        session_start();
        if(!isset($_SESSION['admin_id'])){
            header('Location: ../404.php');
            exit;
        }
        else{

            define("_CON_",true);
            require("../inc/db-con.php");

            //Always return Json format
            header('Content-Type: application/json');

            //return array
            $return = [];            

            $sql_show = "SELECT DISTINCT degree from course_list";
            $degree_list = mysqli_query($con, $sql_show);

            $val = '';
            while($deg_list = mysqli_fetch_array($degree_list)){

                $val .= "<ul class=\"collection with-header\">";
                $val .=     "<li class=\"collection-header\">";
                $val .=         "<h4>". $deg_list['degree']. "</h4>";
                $val .=     "</li>";

                $sql_show = "SELECT course_name from course_list WHERE degree = '".$deg_list['degree']."'";
                $course_list = mysqli_query($con, $sql_show);

                while($crse_list = mysqli_fetch_array($course_list)){

                    $val .=  "<li class=\"collection-item\">";
                    $val .=     "<i class=\"material-icons tiny\">chevron_right</i>". $crse_list['course_name'];
                    $val .=  "</li>";
                
                }

                $val .= "</ul>";

            }

            $return['list'] = $val;

            echo json_encode($return, JSON_PRETTY_PRINT);
            exit;
        }
    }
    else{
        //header('Location: ../404.php');
        exit;
    }
?>