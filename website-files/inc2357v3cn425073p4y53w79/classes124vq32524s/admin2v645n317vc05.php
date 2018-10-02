<?php
    
    /**
     * @class admin
     * 
     * admin related things are done here
     * 
     * Created by IntelliJ IDEA.
     * User: Arkadip
     * Date: 10/02/18
     * Time: 05:31 PM 
    */

    if(defined('_adminnb387w6[vn4')){

        class admin{

            //Check for admin loggin
            public static function isLoggedIn(){
                
                if(isset($_SESSION['admin_name']) && isset($_SESSION['admin_id']) && isset($_COOKIE['_t'])){
                    //admin is logged in
                    return true;
                }
                else {
                    //admin is not logged in
                    return false;
                }
            }
        }
    }

?>