<?php
    session_start();
    session_destroy();
    session_write_close();
    setcookie(session_name('cpc'),'',0,'/');
    unset($_COOKIE['_t']);
    setcookie('_t', null, -1, '/');
    session_regenerate_id(true);

    header('Location: ./cpcbengal_login.php?fallback=yes');
?>