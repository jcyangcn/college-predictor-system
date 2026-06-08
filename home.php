<?php
require_once 'config.php';
session_start();

$predictions = array();

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
	$board = (float) test_input($_POST['board']);
	$jee = (float) test_input($_POST['jee']);
	$bits = (float) test_input($_POST['bits']);
	$srm = (float) test_input($_POST['srm']);
	$vit = (float) test_input($_POST['vit']);

	if ($board < 60) {
		$predictions[] = "Colleges won't accept your application.";
	} else {
		$avg = (($board * 60) + ((($jee * 100) / 360) * 40)) / 100;

		if ($avg > 87) {
			$predictions[] = 'You are eligible to apply for Indian Institute of Technology.';
		} elseif ($avg > 60) {
			$predictions[] = 'You are eligible to apply for National Institute of Technology.';
		}

		if ($bits > 280) {
			$predictions[] = 'You are eligible to apply for Birla Institute of Technology and Science.';
		}
		if ($srm > 140) {
			$predictions[] = 'You are eligible to apply for Sri Ramaswamy Memorial.';
		}
		if ($vit > 80) {
			$predictions[] = 'You are eligible to apply for Vellore Institute of Technology.';
		}

		if (empty($predictions)) {
			$predictions[] = 'No matching colleges found for the provided scores.';
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="Home.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="icon" type="x-icon" href="jagran_logo1.jpg">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>College Shiksha</title>
</head>
<body>
	<nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-dark">
		<a class="navbar-brand" href="home.php">
    	<img src="jagran_logo1.jpg" width="30" height="30" class="d-inline-block align-top" alt=""> College Shiksha
  		</a>
  		<ul class="navbar-nav ml-auto">
    		<li class="nav-item active">
      			<a class="nav-link" href="home.php">Home</a>
    		</li>
    		<li class="nav-item">
      			<a class="nav-link" href="practice.php">About Us</a>
    		</li>
    		<li class="nav-item">
      			<a class="nav-link" href="login.php">Not <?php
      			if (isset($_SESSION['username'])) {
      				echo htmlspecialchars($_SESSION['username']);
      			}
      			?>? Logout</a>
    		</li>
  		</ul>
	</nav>
	<div class="background">
		<i class="fa fa-quote-left"></i><p>Research shows that there is only half as much variation in student achievement between schools as there is among classrooms in the same school. If you want your child to get the best education possible, it is actually more important to get him assigned to a great teacher than to a great school.</p>
	</div>
	<div class="background">
		<h2>College Predictor</h2><br>
		<form method="post" action="home.php">
			<div id="center">
				<input class="ip" type="number" name="board" placeholder="Board's Percentage" min="0" max="100" step="0.01" required><br><br>
				<input class="ip" type="number" name="jee" placeholder="JEE Score" min="0" max="360" step="1" required><br><br>
				<input class="ip" type="number" name="bits" placeholder="BITS Score" min="0" step="1"><br><br>
				<input class="ip" type="number" name="srm" placeholder="SRMJEEE Score" min="0" step="1"><br><br>
				<input class="ip" type="number" name="vit" placeholder="VITEEE Score" min="0" step="1"><br><br>
				<input class="button" type="submit" name="submit" value="SUBMIT">
			</div>
		</form>
	</div>
	<?php if (!empty($predictions)): ?>
	<div class="background">
		<h2>Predicted Colleges</h2>
		<ul class="prediction-list">
			<?php foreach ($predictions as $prediction): ?>
				<li><?php echo htmlspecialchars($prediction); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php endif; ?>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
