<?php

    function authenticate_user($username, $password) {
        session_start();
        $auth_key = 123;
        $GLOBALS['auth_key'] = $auth_key;
        $_SESSION['user'] = array('username'=>$username, 'auth_key'=>$auth_key+1);
    }

    function logout() {
        $GLOBALS['auth_key'] = 0;
        session_destroy();
        header('index.php');
    }
?>