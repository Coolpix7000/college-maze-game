<?php
    // PAGE BROKEN
    if($_GET['action'] == 'reset') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Set up the database connection
        $db = new PDO('mysql:host=localhost;dbname=maze_game','root','password');
        // Prepare the query to run
        $q = $db->prepare("INSERT INTO users(password) VALUES('$password')
                        WHERE username = :username
                    ");
        // Paramaterise inputs to avoid SQL injection
        $q->bindParam(':username', $username, PDO::PARAM_STR);
        // Execute the query
        $q->execute();
        // Check results aren't blank, then add username and logged in to session cookie

        // Close the PDO connection
        $db = null;
        $q = null;

    } else {
        header('location: index.php');
    }

?>