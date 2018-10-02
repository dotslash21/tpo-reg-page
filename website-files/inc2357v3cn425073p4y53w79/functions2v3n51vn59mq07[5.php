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
    function clean($con, $var){
        return mysqli_real_escape_string($con, htmlspecialchars($var,ENT_QUOTES));
    }

    //Function for getting users ip
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
}

?>