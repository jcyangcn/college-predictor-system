<?php
require_once 'config.php';

session_start();
if (isset($_SESSION['username'])) {
	unset($_SESSION['username']);
}
session_destroy();

$login_error = '';
$signup_error = '';
$signup_success = '';

if (isset($_POST['login']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
	session_start();
	$username = test_input($_POST['Username']);
	$password = test_input($_POST['Password']);

	$link = get_db_connection();
	$stmt = mysqli_prepare($link, 'SELECT Username, Password FROM usertable WHERE Username = ? AND Password = ?');
	mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	$row = mysqli_fetch_assoc($result);
	mysqli_stmt_close($stmt);
	mysqli_close($link);

	if ($row && $row['Username'] === $username && $row['Password'] === $password) {
		$_SESSION['username'] = $username;
		$_SESSION['mes'] = 'true';
		header('Location: home.php');
		exit();
	}

	$login_error = 'Invalid username or password.';
}

if (isset($_POST['signup']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
	$usernameSub = test_input($_POST['Username']);
	$password1 = test_input($_POST['Password']);
	$password2 = test_input($_POST['ConfirmPassword']);

	if (empty($usernameSub) || empty($password1) || empty($password2)) {
		$signup_error = 'Please fill in all fields.';
	} elseif ($password1 !== $password2) {
		$signup_error = 'Passwords do not match.';
	} else {
		$link = get_db_connection();
		$stmt = mysqli_prepare($link, 'INSERT INTO usertable (Username, Password) VALUES (?, ?)');
		mysqli_stmt_bind_param($stmt, 'ss', $usernameSub, $password1);

		if (mysqli_stmt_execute($stmt)) {
			$signup_success = 'Account created. You can log in now.';
		} else {
			$signup_error = 'Could not create account. Username may already exist.';
		}

		mysqli_stmt_close($stmt);
		mysqli_close($link);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>College Shiksha</title>
	<link rel="stylesheet" type="text/css" href="Login.css">
	<link rel="icon" href="jagran_logo1.jpg" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div>
<div class="form" id="login">
	<div class="box">
	<h3>LOGIN</h3>
	<div class="social-container">
		<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
		<a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
		<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
	</div>
	<?php if ($login_error): ?>
		<p class="message message-error"><?php echo $login_error; ?></p>
	<?php endif; ?>
	<form action="login.php" method="POST">
		<input class="input" type="text" name="Username" placeholder="Username" required><br>
		<input class="input" type="password" name="Password" placeholder="Password" required><br>
		<input class="button" type="submit" name="login" value="LOGIN"><br>
		<a id="oksignup">Sign Up here</a> | <a href="#">Forgot Password?</a>
	</form>
    </div>
</div>
<div class="form reg" id="signup">
	<div class="box">
	<h3>SIGN UP</h3>
	<div class="social-container">
		<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
		<a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
		<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
	</div>
	<?php if ($signup_error): ?>
		<p class="message message-error"><?php echo $signup_error; ?></p>
	<?php endif; ?>
	<?php if ($signup_success): ?>
		<p class="message message-success"><?php echo $signup_success; ?></p>
	<?php endif; ?>
	<form action="login.php" method="POST">
		<input class="input" type="text" name="Username" placeholder="Username" required><br>
		<input class="input" type="password" name="Password" placeholder="Password" required><br>
		<input class="input" type="password" name="ConfirmPassword" placeholder="Confirm Password" required><br>
		<input class="button" type="submit" name="signup" value="SIGN UP"><br>
		<a id="oklogin">Login Here</a>
	</form>
    </div>
</div>
</div>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="Login.js"></script>
</body>
</html>
