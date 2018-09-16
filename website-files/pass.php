<?php
    function mkpass($pass){
        return password_hash($pass, PASSWORD_DEFAULT);
    }
    echo mkpass("admin2");
?>