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

    /**
     * @param $cookie_name
     */
    function setFormCookie($cookie_name){

        if(isset($_COOKIE[$cookie_name])){
            return;
        }
        else{
            setcookie($cookie_name,XCSRF::mkcsrf($cookie_name),0,'/',null,false,false);
        }
    }
    
    function instTokenMatch($formindex, $tokenValue){
        switch ($formindex){
            case 1:
                $formName = '_form1';
                break;

            case 2:
                $formName = '_form2';
                break;

            case 3:
                $formName = '_form3';
                break;

            case 4:
                $formName = '_crsSel';
                break;

            default:
                return false;
        }

        if(isset($tokenValue)){
            if(XCSRF::varifycsrf($formName, $tokenValue)){
                if(hash_equals($_COOKIE[$formName], $tokenValue)){
                    return true;
                }
                else {
                    return false;
                }
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }
}

?>