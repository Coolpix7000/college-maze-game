<?php session_start(); ?>
<html>
    <header>
        <title>Maze game</title>
        <link rel="stylesheet" href="resources/style.css">
        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.5.1.js"></script>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,900;1,300&display=swap" rel="stylesheet">
		Maze game
    </header>
	<body>
		<?php
			// error_reporting(E_ERROR);
			// Setup session cookie
			if($_SESSION['username']) {
				header('Location: private/maze.php');
			}
			if($_GET['view'] != 'login_fail' && $_GET['view'] != 'reset_password') {
				$content = '
				<div class="layout">
					<div class="login">
						<h1>Login</h1>
						<form action="authenticate.php?action=login" method="post">
							<label for="username">
								<i class="fas fa-user"></i>
							</label>
							<input type="text" name="username" class="login_field" placeholder="Username" id="username" required>
							<label for="password">
								<i class="fas fa-lock"></i>
							</label>
							<input type="password" name="password" class="login_field" placeholder="Password" id="password" required>
							<input type="submit" value="Login">
							<a class="reset_login" href="index.php?view=reset_password">Reset password</a>
						</form>
					</div>
				</div>
				';
			} else if($_GET['view'] == 'reset_password') {
				$content = '<div class="layout">
								<div class="login">
									<h1>Reset password</h1>
									<form action="reset_password.php?action=reset" method="post">
										<label for="username">
											<i class="fas fa-user"></i>
										</label>
										<input type="text" name="username" class="login_field" placeholder="Username" id="username" required>
										<label for="password">
											<i class="fas fa-lock"></i>
										</label>
										<input type="password" name="password" class="login_field" placeholder="Password" id="password" required>
										<input type="submit" value="Reset password">
									</form>
								</div>
							</div>';
			} else if($_GET['view'] == 'login_fail') {
				$content = 'Login Fail
							<a class="button" href="index.php">Go back</a>';
			}
			echo($content);
		?>
	</body>
    <footer></footer>
</html>

<?php

?>