<html>
    <head>
        <title>Maze game</title>
        <link rel="stylesheet" href="resources/maze.css">
        <link rel="stylesheet" href="resources/style.css">
        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.5.1.js"></script>
    </head>
        <body>
            <?php
				$content = '';
				if($_GET['view'] == '') {
					
				} else if($_GET['view'] == 'maze') {
					
					// Set up lauout variables
					$content = '<canvas id="game_board" width="600px" height="600px"></canvas>';

					// Get maze layouts
					include('resources/maze_layouts.php');

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
					
				} else {
					$content = 'User not logged in.';
				}
				echo($content);
            ?>
        </body>
    <footer></footer>
</html>

<?php

?>