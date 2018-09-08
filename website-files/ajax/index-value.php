<?php
    define("_CON_",true);
    //Connection
    require("../inc/db-con.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['id'])){
            if($_POST['id'] == 1){

                //Always return Json format
                header('Content-Type: application/json');

                $return = [];

                $sql_college    = "SELECT inst_name FROM cred";
                $sql_domain     = "SELECT DISTINCT course_optd FROM college_crs";
                $sql_degree     = "SELECT DISTINCT deg_optd FROM college_crs";
                $sql_student    = "SELECT intake FROM college_crs";
                $sql_notice     = "SELECT title FROM notices ORDER BY expiry_date ASC";
                            
                $result_clg     = mysqli_query($con,$sql_college);
                $result_dmn     = mysqli_query($con,$sql_domain);
                $result_deg     = mysqli_query($con,$sql_degree);
                $result_std     = mysqli_query($con,$sql_student);
                $result_notice  = mysqli_query($con,$sql_notice);
                            
                $college_num    = mysqli_num_rows($result_clg);            //Number of college
                $domain_num     = mysqli_num_rows($result_dmn);
                $degree_num     = mysqli_num_rows($result_deg);
                
                //Intake Portion
                $intake = 0;
                            
                while ($intake_num = mysqli_fetch_array($result_std)) {
                  $intake = $intake + (int) $intake_num['intake'];
                }

                
                //NOtice Getting Portion
                $notice_page_link = "#";        //Link to notice page
                $notice      = "<div class=\"list styled custom-list notice-block\">";
                $notice     .= "<ul class=\"marquee\">";

                while($notice_out = mysqli_fetch_array($result_notice)){
                    $notice .= "<li>";
                    $notice .= "<a title=\"".$notice_out['title']."\" href=\"".$notice_page_link."\" > ".$notice_out['title']."</a> ";
                    $notice .= "</li>";
                }

                $notice     .= "</ul>";
                $notice     .= "</div>";

                //Returning Objects
                $return['college_num']  = $college_num;
                $return['domain_num']   = $domain_num;
                $return['degree_num']   = $degree_num;
                $return['intake']       = $intake;
                $return['notice']       = $notice;

                echo json_encode($return, JSON_PRETTY_PRINT);
                exit;
            }
        }
    }
    else{
        header('Location: ../404.php');
    }
?>