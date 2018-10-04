<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['id'])){
            if($_POST['id'] == 1){

                define('_incFuncwwrfbhdjrt',true);
                require '../inc2357v3cn425073p4y53w79/func.php';
                
                //Always return Json format
                header('Content-Type: application/json');

                $return = [];

                //Number of College
                $smt_college    = $pdocon->prepare("SELECT inst_name FROM cred");
                $smt_college->execute();
                $college_num    = $smt_college->rowCount();

                //Number of Domain
                $smt_domain     = $pdocon->prepare("SELECT DISTINCT course_optd FROM college_crs");
                $smt_domain->execute();
                $domain_num     = $smt_domain->rowCount();

                //Number of Degree
                $smt_degree     = $pdocon->prepare("SELECT DISTINCT deg_optd FROM college_crs");
                $smt_degree->execute();
                $degree_num     = $smt_degree->rowCount();

                //Number of students
                $intake = 0;
                $smt_student    = $pdocon->prepare("SELECT intake FROM college_crs");
            
                while ($intake_num = $smt_student->fetch(PDO::FETCH_ASSOC)['intake']) {
                    $intake = $intake + (int) $intake_num['intake'];
                }

                //Notice value change                
                $current_time = time();
                
                $smt_update = $pdocon->prepare("UPDATE `notices` SET active_status = 0 WHERE expiry_date < :current_time");
                if($smt_update->execute(array(':current_time'=>$current_time))){
                    //Notice
                    $notice_page_link = "./notices.html";        //Link to notice page
                    $notice      = "<div class=\"list styled custom-list notice-block\">";
                    $notice     .= "<ul class=\"marquee\">";

                    $smt_notice = $pdocon->prepare("SELECT title FROM notices WHERE active_status = 1 ORDER BY expiry_date DESC LIMIT 10");
                    while($notice_out = $smt_notice->fetch(PDO::FETCH_ASSOC)){
                        $notice .= "<li>";
                        $notice .= "<a title=\"".$notice_out['title']."\" href=\"".$notice_page_link."\" > ".$notice_out['title']."</a> ";
                        $notice .= "</li>";
                    }

                    $notice     .= "</ul>";
                    $notice     .= "</div>";
                }

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