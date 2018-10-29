<?php

    /**
     * AjaxPage
     * 
     * Response- Institute Presence Check
     * 
     * Created by IntelliJ IDEA.
     * User: Arkadip
     * Date: 10/05/18
     * Time: 12:40 PM 
    */

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //Always return Json format
        header('Content-Type: application/json');
        $return = [];

        define('_incFuncwwrfbhdjrt',true);
        require '../inc2357v3cn425073p4y53w79/func.php';

        $token = $_POST['token'];
        if(XCSRF::varifycsrf('inst-frm1',$token)){
            
            if(isset($_POST['check'])){
                $u_chk = Filter::Int(clean($_POST['check']));
    
                if($u_chk == 1){
                    $inst_code = Filter::String(clean($_POST['inst_code']));

                    if(strlen($inst_code) > 0){

                        $smt_chk = $pdocon->prepare("SELECT inst_code FROM cred WHERE inst_code = :inst_code");
                        $smt_chk->execute(array(':inst_code'=>$inst_code));

                        if((int) $smt_chk->rowCount() > 0){
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
                    $inst_code =  Filter::String(clean($_POST['uid']));

                    if(strlen($inst_code) > 0){

                        $smt_chk1 =$pdocon->prepare("SELECT uid FROM cred WHERE uid = :inst_code");
                        $smt_chk1->execute(array(':inst_code'=>$inst_code));

                        if((int) $smt_chk1->rowCount() > 0){
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