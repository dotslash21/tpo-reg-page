<?php
    function mkpass($pass){
        return password_hash($pass, PASSWORD_DEFAULT);
    }
    echo mkpass("cpcbengaladmin@123#0");

    #cpcbengaladmin
?>

