<?php
    session_start(); 
    if(!$_SESSION['username']) {
        header('Location: ../index.php');
        exit;
    };
    $content = '';

    if($_GET['view'] != 'completed') {
        // Set up layout variables & get the css document
        $content .= '<link rel="stylesheet" href="../resources/style.css">
                    <div class="layout>
                        <div class="content>
                            <canvas id="game_board" width="600px" height="600px"></canvas>
                        </div>
                    </div>';

        // Get maze layouts
        include('maze_layouts.php');

        // Create an object with all the levels
        $level_layouts = array($maze_one, $maze_two, $maze_three);

        // Pass levels object to the maze.js file
        $content .= '<script type="text/javascript">
                        var grid_object = ' . json_encode($level_layouts) . '; 
                    </script>';

        $script = '<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.5.1.js"></script>
                    <script type="text/javascript" src="maze.js"></script>';


        // Put the content on the page
        $content .= $script;
    } else {
        $content .= '<link rel="stylesheet" href="../resources/style.css">
                    <div class="layout">
                        <div class="content">
                            <h1>Game complete!</h1>
                        </div>
                        <a class="button" href="../authenticate.php?action=logout">Home</a>
                    </div>';
    }

    echo($content);
    
					
?>