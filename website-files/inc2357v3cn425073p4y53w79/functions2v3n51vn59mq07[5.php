<?php

if(defined('_functionsqn72v3[701v[c124[m1c')){

    //Functions for cleaning the request items
    function clean($con, $var){
        return mysqli_real_escape_string($con, htmlspecialchars($var,ENT_QUOTES));
    }
}

?>