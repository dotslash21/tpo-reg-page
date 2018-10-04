<?php

    //IF there is no constant defined called _CONFIG_, do not load file
    if(!defined('_CONFIG_')){
        header('Location: .../404.php'); 
    }
    
    class DB{
        
        protected static $con;

        private function __construct(){

            try {
                self::$con = new PDO( 'mysql:charset=utf8mb4;host=localhost;port=3306;dbname=login_system', 'root', '' );
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
                new DB();
            }

            //Return the writteable db connection
            return self::$con;
        }
    }
    
?>