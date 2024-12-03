<!DOCTYPE <?php

@include 'config.php';

Session_start();

$_SESSION['c_log_username'] = 'Username';
?> <!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css\login.css">
</head>

<body>
	<div class="container">
		<div class="navbar">
			<nav>
				<ul>
					<li><a href="groupinfo.php">GROUP'S INFORMATION</a></li>
					<li><a href="homepage.php">HOME</a></li>
					<li><a href="loginform.php">CUSTOMER LOGIN</a></li>
					<li><a href="loginformstaff.php">STAFF LOGIN</a></li>
				</ul>
			</nav>
		</div>
	</div>

</body>

</html>