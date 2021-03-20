<?php
    function view_maze() {
        // Set up lauout variables
        $content = '<canvas id="game_board" width="600px" height="600px"></canvas>';

        // Get maze layouts
        include('maze_layouts.php');

        // Create an object with all the levels
        $levels = 4; // User to select the number of levels
        $level_layouts = array($maze_one, $maze_two, $maze_three /*,  => $maze_four*/);

        // Pass levels object to the maze.js file
        $content .= '<script type="text/javascript">
                        var grid_object = '. json_encode($level_layouts) . '; 
                    </script>';

        $script = '<script type="text/javascript" src="maze.js"></script>';


        // Put the content on the page
        $content .= $script;
        return $content;
    }
        
					
?>