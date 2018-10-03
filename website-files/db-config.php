<?php
    //No one can access this file
    if(defined('_CONFIG46b3b2a6_')){
        
        // ** MySQL settings - You can get this info from your web host ** //
        /** The name of the database for WordPress */
        define('DB_NAME', 'cpc_tpo');
        /** MySQL database username */
        define('DB_USER', 'root');

        /** MySQL database password */
        define('DB_PASSWORD', '');

        /** MySQL hostname */
        define('DB_HOST', 'localhost');
    }
    else{
        header('Location: ./404.php');
    }

?>