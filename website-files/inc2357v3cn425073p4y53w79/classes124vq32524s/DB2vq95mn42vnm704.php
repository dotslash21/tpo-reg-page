<?php

    //IF there is no constant defined called _CONFIG_, do not load file
    if(defined('_CON1swys135em856uv346_')){



        class DB{
            
            protected static $con;

            private function __construct($dsn,$user,$pass){

                try {
                    self::$con = new PDO($dsn,$user,$pass);
                    self::$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                    self::$con->setAttribute( PDO::ATTR_PERSISTENT, false );
                }
                catch (PDOException $e) {
                    echo "Could not connect to database.";
                    exit;
                }    
            }

            public static function getConnection() {

                //If this instance was not been started, start it.
                if (!self::$con) {

                    define('_CONFIG46b3b2a6_',true);
                    define('HOMEDIR', dirname(dirname(dirname(__FILE__))));
    
                    if(!file_exists(HOMEDIR.'/db-config.php')){                             //Check if the file exists
                        die('db-config file not found. Recheck that all files are there');
                    }
    
                    require HOMEDIR.'/db-config.php';                                           // Adding the Config file for Database
    
                    if(!defined('DB_NAME') && !defined('DB_USER') && !defined('DB_PASSWORD') && !defined('DB_HOST')){
                        die('Can.t connect. Define all db connection variables to link');                                   //Check for all connection variables
                    }
                    
                    $dsn = 'mysql:charset=utf8mb4;dbname='.DB_NAME.';host='.DB_HOST.';port=3306;';
                    $user = DB_USER;
                    $pass = DB_PASSWORD;

                    new DB($dsn, $user, $pass);
                }

                //Return the writteable db connection
                return self::$con;
            }
        }
    }
    else {
        header('Location: .../404.php'); 
    }
?>