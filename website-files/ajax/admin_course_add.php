<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //Always return Json format
        header('Content-Type: application/json');

        //return array
        $return = [];
        
        session_start();

        define('_incFuncwwrfbhdjrt',true);
        require '../inc2357v3cn425073p4y53w79/func.php';

        $degree = $_POST['degree'];
        $course = $_POST['course'];
        $token  = $_POST['token'];

        if(XCSRF::varifycsrf('ad-cs-add',$token)){
            //If XCSRF is varified
            
            //Escaping variables
            $degree_clean   = Filter::String(clean($degree));
            $course_clean   = Filter::String(clean($course));

            $smt_crs_chk = $pdodon->prepare("SELECT course_name FROM course_list where degree = :degree AND course_name= :course");
            $smt_crs_chk->execute(array(':degree'=>$degree_clean,':course'=>$course_clean));

            if((int) $smt_crs_chk->rowCount() > 0){
                //If alreay exists
                $return['error'] = '<span class=\"red-text text-lighten-1\">Course is Already enlisted</span>';
            }
            else{
                //If Course don't exists then add it
                $smt_course_add = $pdocon->prepare("INSERT INTO course_list(degree,course_name) VALUE( :degree, :course)");
            
                if($smt_course_add->execute(array(':degree'=>$degree_clean,':course'=>$course_clean))){
                    $return['result'] = "<span class=\"green-text text-lighten-1\">You have added one Course</span>";
                }
                else{
                    $return['error']  = "<span class=\"red-text text-lighten-1\">Some Error Occours</span>";
                }
            }

        }

        echo json_encode($return, JSON_PRETTY_PRINT);
        exit;
    }
?>