<?php
    //escaping function
    function clean($con, $var){
        return mysqli_real_escape_string($con, htmlspecialchars($var,ENT_QUOTES));
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //Always return Json format
        header('Content-Type: application/json');
        $return = [];

        session_start();

        define('_incFuncwwrfbhdjrt',true);
        require '../inc2357v3cn425073p4y53w79/func.php';

        $token = $_POST['token'];
        if(XCSRF::varifycsrf('inst-frm1',$token)){

            define("_CON_",true);
            //Connection
            require("../inc/db-con.php");
            
            if(isset($_POST['check'])){
                $u_chk = $_POST['check'];
    
                if($u_chk == 1){

                    $inst_code = $_POST['inst_code'];

                    if(strlen($inst_code) > 0){
                        
                        $inst_code_clean = clean($con, $inst_code) ;

                        $sql_chk = "SELECT inst_code FROM cred WHERE inst_code = '".$inst_code."'";
                        $res_qry = mysqli_query($con,$sql_chk);
                        if(mysqli_num_rows($res_qry) > 0){
                            $return['inst_chk'] = 'yes';
                        }
                        else{
                            $return['inst_chk'] = 'no';
                        }
                    }
                    else{
                        $return['inst_chk'] = 'no';
                    }
                }

                else if($u_chk == 2){

                    $inst_code =  $_POST['uid'];

                    if(strlen($inst_code) > 0){

                        $inst_code_clean = clean($con, $inst_code);

                        $sql_chk = "SELECT uid FROM cred WHERE uid = '".$inst_code."'";
                        $res_qry = mysqli_query($con,$sql_chk);
                        if(mysqli_num_rows($res_qry) > 0){
                            $return['inst_uid_chk'] = 'yes';
                        }
                        else{
                            $return['inst_uid_chk'] = 'no';
                        }
                    }
                    else{
                        $return['inst_uid_chk'] = 'no';
                    }
                }
                else {
                    $return['error'] = "Wrong Entry";
                }
            }
        }
        else{
            $return['error'] = "Token Mismatched";
        }

        echo json_encode($return, JSON_PRETTY_PRINT);
        exit;
    }