<?php
    //No one can access this file
    if(defined('_CONFIG_')){
        
        // ** MySQL settings - You can get this info from your web host ** //
        /** The name of the database for WordPress */
        define('DB_NAME', 'b16_21262708_cpcdemo');

        /** MySQL database username */
        define('DB_USER', 'b16_21262708');

        /** MySQL database password */
        define('DB_PASSWORD', 'Arkad1p!!2w3e4r5t6y7u8i');

        /** MySQL hostname */
        define('DB_HOST', 'sql309.byethost.com');
    }
    else{
        header('Location: ./404.php');
    }

?>