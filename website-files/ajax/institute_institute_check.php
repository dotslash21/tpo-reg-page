<?php
    define("_CON_",true);
    //Connection
    require("../inc/db-con.php");

    //escaping function
    function clean($con, $var){
        return mysqli_real_escape_string($con, $var);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $return = [];

        //Always return Json format
        header('Content-Type: application/json');

        if(isset($_POST['check'])){
            $u_chk = $_POST['check'];

            if($u_chk == 1){
                $inst_code = $_POST['inst_code'];
                $sql_chk = "SELECT inst_code FROM cred WHERE inst_code = '".$inst_code."'";
                $res_qry = mysqli_query($con,$sql_chk);
                if(mysqli_num_rows($res_qry) > 0){
                    $return['inst_chk'] = 'yes';
                
                }
                else{
                    $return['inst_chk'] = 'no';
                }
            }
            if($u_chk == 2){
                $inst_code = $_POST['uid'];
                $sql_chk = "SELECT uid FROM cred WHERE uid = '".$inst_code."'";
                $res_qry = mysqli_query($con,$sql_chk);
                if(mysqli_num_rows($res_qry) > 0){
                    $return['inst_uid_chk'] = 'yes';
                
                }
                else{
                    $return['inst_uid_chk'] = 'no';
                }
            }

            echo json_encode($return, JSON_PRETTY_PRINT);
            exit;
        }
    }