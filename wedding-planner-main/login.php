<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signin-form</title>
	<link rel="shortcut icon" href="../images/open-book.png" type="image/png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<link rel="stylesheet" href="forms.css">
</head>
<body>
        <header class="header">
            <div class="header-1">
                <a href="#" class="logo"> wedding planner </a>
            </div>
        </header>

		<div class="login-form-container">
			<form action="login.php" method="post">
					<h2>Sign In</h2>
					<span>Username</span>
					<input type="email" name="Email" class="box" placeholder="enter your email" id="" required>
					<span>Password</span>
					<input type="password" name="Password" class="box" placeholder="enter your password" id="" required>
					<div class="checkbox">
						<input type="checkbox" name="" id="remember-me">
						<label for="remember-me"> remember me</label>
					</div>
					<input type="submit" value="sign in" class="btn">
					<p><i>forget password ? <a href="#">click here</a></i></p>
					<p><i>dont't have an account ?  <a href="http://localhost/wedding-planner-main/signup.php">create one</a></i></p>

			</form>

		</div>




<?php
	   session_start();
		$server_name = "localhost";
		$username = "root";
		$password = "";
		$database_name = "wedding_planner";
		
		$conn = mysqli_connect($server_name, $username, $password, $database_name);
		// Now check the connection
		if (!$conn) {
			die("Connection Failed: " . mysqli_connect_error());
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// Retrieve form data
			$Email = mysqli_real_escape_string($conn, $_POST['Email']);
			$Password = mysqli_real_escape_string($conn, $_POST['Password']);
			
		
			if (!empty($Email) && !empty($Password) && !is_numeric($Email)) {
				$query = "SELECT * FROM signup_data WHERE Email = '$Email' LIMIT 1";
				$result = mysqli_query($conn, $query);
				if ($result) {
					if (mysqli_num_rows($result) > 0) {
						$user_data = mysqli_fetch_assoc($result);
		
						if ($user_data['Password'] == $Password) {
							$_SESSION['user_id'] = $user_data['id'];
							$_SESSION['Email'] = $user_data['Email'];
							header("Location: /wedding-planner-main/index.php");
							die;
						} else {
							echo "<script type='text/javascript'>alert('Wrong username or password')</script>";
						}
					} else {
						echo "<script type='text/javascript'>alert('User not found')</script>";
					}
				} else {
					echo "Error: " . mysqli_error($conn);
				}
			} else {
				echo "<script type='text/javascript'>alert('Invalid email or password')</script>";
			}
		}
	
		
?>


</body>
</html>