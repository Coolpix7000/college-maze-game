<html>
    <head>
        <title>Maze game</title>
        <link rel="stylesheet" href="resources/maze.css">
        <link rel="stylesheet" href="resources/style.css">
        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.5.1.js"></script>
    </head>
        <body>
            <?php
                // Set up lauout variables
                $content = '<canvas id="game_board" width="1200px" height="1200px"></canvas>';

                // Get maze layouts
                include('resources/maze_layouts.php');
                
                // Create an object with all the levels
                $levels = 4; // User to select the number of levels
                $level_layouts = (object) array('maze_one' => $maze_one, 'maze_two' => $maze_two, 'maze_three' => $maze_three, 'maze_four' => $maze_four);

                for($i = 1; $i <= $levels; $i++) {
                    
                }
                var_dump($level_layouts);

                // Pass levels object to the maze.js file
                $content .= '<script type="text/javascript">
                                var grid_object = '. json_encode($level_layouts) . '; 
                            </script>';

                $script = '<script type="text/javascript" src="maze.js"></script>';

                // Put the content on the page
                $content .= $script;
                echo($content);

            ?>
        </body>
    <footer></footer>
</html>

<?php

?>