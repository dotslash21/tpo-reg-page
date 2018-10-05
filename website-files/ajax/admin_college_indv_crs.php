<?php

    /**
     * AjaxPage
     * 
     * Response- Admin Indivisual College dertails (course)
     * 
     * Created by IntelliJ IDEA.
     * User: Arkadip
     * Date: 10/05/18
     * Time: 12:40 PM 
    */

    define('_incFuncwwrfbhdjrt',true);
    require '../inc2357v3cn425073p4y53w79/func.php';

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $inst_code = Filter::String(clean($_GET['inst_code']));

        //Credential
        $smt_inst =  $pdocon->prepare("SELECT * FROM cred WHERE inst_code = :inst_code");
        $smt_inst->execute(array(':inst_code'=>$inst_code));
        $result_arr = $smt_inst->fetch(PDo::FETCH_ASSOC);

        //Course
        $smt_crs = $pdocon->prepare("SELECT * FROM college_crs WHERE college_id = :inst_code ORDER BY deg_optd ASC");
        $smt_crs->execute(array(':inst_code'=>$inst_code));

        header('Content-Type: application/json');

        //return variable
        $return = [];

        //Making a return value 
        $value ='';
        $value .='<div class="input-field"><input type="number" id="'+item+'" name="'+course_array[item]+'" min="0" required><label for="'+item+'">'+course_array[item]+'</label>';

        $return['value'] = $value;
        
        echo json_encode($return, JSON_PRETTY_PRINT);
        exit;
    }
?>