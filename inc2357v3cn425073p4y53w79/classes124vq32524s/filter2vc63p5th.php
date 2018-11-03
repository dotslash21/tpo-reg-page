<?php

    /**
     * @class Filter
     * 
     * Filtering all request done here
     * 
     * Created by IntelliJ IDEA.
     * User: Arkadip
     * Date: 10/04/18
     * Time: 11:36 PM 
    */

    //IF there is no constant defined called _CONFIG_, do not load file
    if(defined('_CON1swys135em856uv346_')){

        class Filter {
            
            /**
             *  @param	string	$string		String to filter before putting inside InnoDB
             *  @return            			Filters and returns a valid string to put into the Database.
             *  @note				If the $html arg is false, new lines (\n) will replaced with __BR__ and re-converted to \r\n afterwards.
             * 					.. This is to ensure new lines are kept in place.
             */
            public static function String( $string, $html = false ) {
                if(!$html) {
                    $string = preg_replace("/(\n)/", "__BR__", $string);
                    $string = filter_var( $string , FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
                    $string = str_replace("__BR__", "\r\n", $string);
                } 
                else {
                    $string = filter_var( $string , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    
                }
                return $string;
            }
            
            /**
             *  @param	string	$email		Email to filter before putting inside InnoDB
             *  @return            			Filters and returns a valid or invalid email address
             */
            public static function Email( $email ) {
                return filter_var( $email , FILTER_SANITIZE_EMAIL);
            }
            
            /**
             *  @param	string	$url		String to filter before putting inside InnoDB
             *  @return            			Filters and returns a valid or invalid URL
             */
            public static function URL( $url ) {
                return filter_var( $url , FILTER_SANITIZE_URL);
            }
            
            /**
             *  @param	int		$integer	The string to filter and turn into an integer 
             *  @return	int					Returns an integer after being filtered. 
             */
            public static function Int( $integer ) {
                return (int) $integer = filter_var( $integer , FILTER_SANITIZE_NUMBER_INT);
            }
        }
    }