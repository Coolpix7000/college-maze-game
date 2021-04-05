<?php
    session_start(); 
    if($_GET['action'] == 'login') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Set up the database connection
        $db = new PDO('mysql:host=localhost;dbname=maze_game','root','password');
        // Prepare the query to run
        $q = $db->prepare("SELECT * FROM users
                    WHERE username = :username
                    AND password = :password
                    ");
        // Paramaterise inputs to avoid SQL injection
        $q->bindParam(':username', $username, PDO::PARAM_STR);
        $q->bindParam(':password', $password, PDO::PARAM_STR);
        // Execute the query
        $q->execute();
        // Check results aren't blank, then add username and logged in to session cookie
        $result = $q->fetchAll();

        if($result) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
        }

        // Close the PDO connection
        $db = null;
        $q = null;

        if($_SESSION['username']) {
            header('Location: private/maze.php');
            exit;
        } else {
            header('Location: index.php?view=login_fail');
            exit;
        }
    } else if($_GET['action'] == 'logout') {
        logout();
    } else {
        echo('File not found.');
    }

    function logout() {
        $_SESSION['user'] = '';
        session_destroy();
        header('Location: index.php');
    }
?>