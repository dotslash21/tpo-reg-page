<?php
    define("_CON_",true);
    require("../inc/db-con.php");

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $inst_code = $_GET['inst_code'];

        //Credential
        $sql_inst = "SELECT * FROM cred WHERE inst_code ='".$inst_code."'";
        $result = mysqli_query($con, $sql_inst);
        $result_arr = mysqli_fetch_array($result);

        //Course
        $sql_crs = "SELECT * FROM college_crs WHERE college_id ='".$inst_code."' ORDER BY deg_optd ASC";
        $return['sql'] = $sql_crs;
        $result_crs = mysqli_query($con, $sql_crs);

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