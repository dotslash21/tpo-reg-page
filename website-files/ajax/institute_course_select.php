<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        session_start();

        define('_incFuncwwrfbhdjrt',true);
        require '../inc2357v3cn425073p4y53w79/func.php';
        
        $token = $_POST['token'];

        if(XCSRF::varifycsrf('crs-sel',$token)){
            //Always return Json format
            header('Content-Type: application/json');

            $return = [];

            $value = '';

            $smt_degree = $pdocon->prepare("SELECT DISTINCT degree FROM course_list");
            $smt_degree->execute();
            
            while ($array_degree = $smt_degree->fetch(PDO::FETCH_ASSOC)) {

                $value .=   "<optgroup label=\"".$array_degree['degree']."\">";
                
                $smt_opt = $pdocon->prepare("SELECT course_name FROM course_list WHERE degree = :degreeVal ");
                $smt_opt->execute(array(':degreeVal'=>$array_degree['degree']));

                while ($array_course = $smt_opt->fetch(PDO::FETCH_ASSOC)) {
                    $value .= "<option value=\"".$array_degree['degree']. " - " .$array_course['course_name'] ."\">".$array_degree['degree'] ." - " .$array_course['course_name']."</option>";             
                    }
                }
                $return['course'] = $value;
            echo json_encode($return, JSON_PRETTY_PRINT);
            exit;
        }     
    }
?>