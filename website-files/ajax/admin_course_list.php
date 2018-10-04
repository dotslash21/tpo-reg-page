<?php
    
    if(1){

        session_start();

        define('_incFuncwwrfbhdjrt',true);
        require '../inc2357v3cn425073p4y53w79/func.php';

        if(!admin::ajaxCheck()){
            header('Location: ../404.php');
            exit;
        }
        else{
            

            //Always return Json format
            header('Content-Type: application/json');

            //return array
            $return = [];

            $smt_show = $pdocon->prepare("SELECT DISTINCT degree from course_list");
            $smt_show->execute();

            $val = '';
            while($deg_list = $smt_show->fetch(PDO::FETCH_ASSOC)){

                $val .= "<ul class=\"collection with-header\">";
                $val .=     "<li class=\"collection-header\">";
                $val .=         "<h5>". $deg_list['degree']. "</h5>";
                $val .=     "</li>";

                $smt_show_indv = $pdocon->prepare("SELECT course_name from course_list WHERE degree = :deg");
                $smt_show_indv->execute(array(':deg'=>$deg_list['degree']));

                while($crse_list = $smt_show_indv->fetch(PDO::FETCH_ASSOC)){

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