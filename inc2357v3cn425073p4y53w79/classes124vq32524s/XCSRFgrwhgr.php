<?php

    /**
     * @class XCSRF
     * 
     * Checks for CSRF permissions Validations
     * 
     * Created by IntelliJ IDEA.
     * User: Arkadip
     * Date: 10/02/18
     * Time: 04:31 PM 
    */

    if(defined('_FUNCrqwetwegww')){
        class XCSRF{
        
            static function mkcsrf($i){
                $name = 'token-' . $i;
                if (empty($_SESSION[$name])) {
                    if (function_exists('mcrypt_create_iv')) {
                        $_SESSION[$name] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
                    } else {
                        $_SESSION[$name] = bin2hex(openssl_random_pseudo_bytes(32));
                    }
                }
                
                return $_SESSION[$name];
            }
        
            static function varifycsrf($i, $value){
                $name = 'token-' . $i;
                if(isset($value)){
                    if(hash_equals($_SESSION[$name], $value)){
                        return true;
                    }
                    else{
                        return false;
                    }
                }
                else{
                    return false;
                }
            }
        }
    }
    
?>