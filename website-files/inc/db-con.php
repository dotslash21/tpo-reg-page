<?php
// Checks if the config file is exists
    if(!file_exists('../db-config.php')){
        die('db-config file not found. Recheck that all files are there');
    }

    // Adding the Config file for Database
    require('../db-config.php');

    // Checks if all vabiables are presents
    if(!defined('DB_NAME') && !defined('DB_USER') && !defined('DB_PASSWORD') && !defined('DB_HOST')){
        die('Can.t connect. Define all db connection variables to link');
    }

    // Connect of the Database
    $con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    if(!$con){
        $msg = "Could not connect to the Database <br/>";
        $msg .= "Error Code: " . mysqli_connect_errno();
        $msg .= "Error: " . mysqli_connect_error();
        die($msg);
    }

?>