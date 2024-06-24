<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup-form</title>
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

		<div class="signup-form-container">

			<form action="signup.php" method="post">
				<h2>Sign Up</h2>
				<span>First Name</span>
				<input type="text" name="First_name" class="box" placeholder="Enter your First Name" id="full_name" required>
				<span>Last Name</span>
				<input type="text" name="Last_name" class="box" placeholder="Enter your Last Name" id="full_name" required>
				<span>Email</span>
				<input type="email" name="Email" class="box" placeholder="Enter your email" id="email" required>
				<span>Phone</span>
				<input type="tel" name="Phone" class="box" placeholder="Enter your phone number" id="phone" required>
				<span>Password</span>
				<input type="password" name="Password" class="box" placeholder="Enter your password" id="password" required>
				<input type="submit" name="sign_up" value="Sign Up" class="btn">
				<p class="message"><i>Already have an account? <a href="http://localhost/wedding-planner-main/login.php">Sign in</a></i></p>
			</form>
			<p class="message"><i>People who use our service may have uploaded your contact information to BookHeaven. <a href="#">Learn more</a></i></p><br>
			<p class="message"><i>By singing, you agree to our <a href="#">Terms</a>,<a href="#">Privacy policy</a> and <a href="#">Cookies Policy</a></i></p>
		</div>
<?php
	$server_name="localhost";
	$username="root";
	$password="";
	$database_name="wedding_planner";

	$conn=mysqli_connect($server_name,$username,$password,$database_name);
	//now check the connection
	if(!$conn)
	{
		die("Connection Failed:" . mysqli_connect_error());

	}

	if(isset($_POST['sign_up']))
	{	
		$First_name = $_POST['First_name'];
		$Last_name = $_POST['Last_name'];
		$Email = $_POST['Email'];
		$Phone = $_POST['Phone'];
		$Password= $_POST['Password'];

		$sql_query = "INSERT INTO signup_data (First_name,Last_name,Email,Phone,Password)
		VALUES ('$First_name','$Last_name','$Email','$Phone','$Password')";

		if (mysqli_query($conn, $sql_query)) 
		{
			echo "<script type='text/javascript'>alert('successfully register')</script>";
		} 
		else
		{
			echo  "<script type='text/javascript'>alert('enter valid information')</script>" . $sql . "" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
?>

</body>
</html>