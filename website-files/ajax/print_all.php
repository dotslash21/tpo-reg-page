<?php
    define("_CON_",true);
    require("../inc/db-con.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        if($_POST['chk'] == 1){

            session_start();
            if(isset($_SESSION['admin_id'])){

                //Always return Json format
                header('Content-Type: application/json');

                $return['done'] = '$2y$10$s.UL6bwn1vDvi4wvSRi6d.rF67PxSenzi0Y..JfAkR0w4ztn06KW.';

            }
        }

        echo json_encode($return, JSON_PRETTY_PRINT);
        exit;
    }

    
    
?>