<?php
    define("_CON_",true);
    //Connection
    require("../inc/db-con.php");

    //escaping function
    function clean($con, $var){
        return mysqli_real_escape_string($con, htmlspecialchars($var,ENT_QUOTES));
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        header('Content-Type: application/json');   //Reply json

        session_start();
        if(isset($_POST['token']) && $_POST['token'] == $_SESSION['token']){

            $return = [];
            if(isset($_SESSION['admin_id'])){   //Admin is logged in

            }
        }

        echo json_encode($return, JSON_PRETTY_PRINT);
        exit;
    }

    ?>