<html>
    <head>
        <title>Maze game</title>
        <link rel="stylesheet" href="resources/maze.css">
        <link rel="stylesheet" href="resources/style.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/css/foundation.min.css">
        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.5.1.js"></script>
    </head>
        <body>
            <?php
				$content = '';
				if($_GET['view'] == '') {
					include_once('actions/authenticate.php');
					authenticate_user('username', 'password');
					$content .= '
					<div class="login">
						<h1>Login</h1>
						<form action="authenticate.php?action=login" method="post">
							<label for="username">
								<i class="fas fa-user"></i>
							</label>
							<input type="text" name="username" placeholder="Username" id="username" required>
							<label for="password">
								<i class="fas fa-lock"></i>
							</label>
							<input type="password" name="password" placeholder="Password" id="password" required>
							<input type="submit" value="Login">
							<a class="reset_login" href="reset_password.php?view=request">Reset password</a>
						</form>
						
					</div>';

				} else if($_GET['view'] == 'maze' && $_SESSION['user']->auth_key == $GLOBALS['auth_key']) {
					include_once('private/maze.php');
					$content .= view_maze($username = 'user');
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