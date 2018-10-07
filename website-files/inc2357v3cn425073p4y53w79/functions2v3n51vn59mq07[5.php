<?php

    /**
     * 
     * File for All Functions
     * 
     * Created by IntelliJ IDEA.
     * User: Arkadip
     * Date: 10/02/18
     * Time: 05:01 PM 
    */

if(defined('_functionsqn72v3[701v[c124[m1c')){

    //Functions for cleaning the request items
    function clean($var){
        return htmlspecialchars($var,ENT_QUOTES);
    }

    /**
     * This function gets the current client's ip address
     * 
     */
    function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    function setFormCookie($cookie_name){

        if(isset($_COOKIE[$cookie_name])){
            return;
        }
        else{
            setcookie($cookie_name,XCSRF::mkcsrf($cookie_name),0,'/',null,false,false);
        }
    }
}

?>