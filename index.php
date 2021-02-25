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

                // Create maze layout
                $grid_size = 40;
                $grid_object = [];

                for($y = 0; $y <= $grid_size; $y++) {
                    
                    $row_array = [];
                    for($x = 0; $x <= $grid_size; $x++) {
                        $block = rand(0, 1);
                        array_push($row_array, $block);
                    }

                    // Put the finish line somewhere in the final row
                    if($y == 40) {
                        $finish_block = rand(1, 40);
                        $row_array[$finish_block] = -1;
                    } 

                    $grid_object[$y] = $row_array;
                }
                // Make object avaliable in maze.js
                $content .= '<script type="text/javascript">
                                var grid_object = '. json_encode($grid_object) . '; 
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