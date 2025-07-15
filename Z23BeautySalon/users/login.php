<?php

	session_start();

	// Define a variable to store the welcome message
	$welcome_message = '';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$conn = mysqli_connect("localhost", "root", "", "Z23_Beauty_Salon");

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		$query = "SELECT * FROM users WHERE email = '$email' AND password='$password'";
		
		$result = mysqli_query($conn,$query);
		
		if (mysqli_num_rows($result)===1){
			$_SESSION['email'] = $email;
			$welcome_message = "Welcome " . htmlspecialchars($email) . "!";
			$_SESSION['welcome_message'] = $welcome_message;
			header('Location: /Z23BeautySalon/index.php');
			exit();
		}else{
			$error = 'Invalid email or password. Login failed.';
			echo $error;
		}
		mysqli_close($conn);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Create Account</title>
	<link rel="stylesheet" href="../style/webstyles.css">   
</head>
<body>
    <div class="dropdown">
        <button onclick="toggleDropdown()" class="dropbtn">Log in</button>
        <div id="myDropdown" class="dropdown-content">
			<?php 
            // Check if user is logged in
            if(isset($_SESSION['email'])) {
                // If logged in, display logout option
                echo '<a href="#" onclick="logout()">Log Out</a>';
            } else {
                // If not logged in, display login option
                echo '<a href="#" onclick="showLoginForm()">Login</a>';
				echo '<a href="#" onclick="createAccount()">Create Account</a>';
            }
            ?>
        </div>
    </div>

    <div class="container" id="login-form">
        <h2>Login</h2>
        <form id="loginform" method="post">
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" value="login">Login</button>		
        </form>
    </div>

    <div class="container" id="createAccount">
        <link href = "users/createAccount.php">
    </div>

    <script>
		function toggleDropdown() {
			var dropdownContent = document.getElementById("myDropdown");
			if (dropdownContent.classList.contains("show")) {
				dropdownContent.classList.remove("show");
			} else {
				closeDropdowns(); // Close other dropdowns if open
				dropdownContent.classList.add("show");
			}
		}

		function showLoginForm() {
			document.getElementById("login-form").style.display = "block";
		}
		
		function logout() {
			// Implement and run logout.php
			window.location.href = "/Z23BeautySalon/users/logout.php";
		}

		function createAccount() {
			// Redirect to createaccount.php
			window.location.href = "users/createaccount.php";
		}

		// Close the dropdown if the user clicks outside of it
		window.onclick = function(event) {
			if (!event.target.matches('.dropbtn')) {
				closeDropdowns();
			}
		}

		function closeDropdowns() {
			var dropdowns = document.getElementsByClassName("dropdown-content");
			for (var i = 0; i < dropdowns.length; i++) {
				var openDropdown = dropdowns[i];
				if (openDropdown.classList.contains('show')) {
					openDropdown.classList.remove('show');
				}
			}
		}
    </script>
</body>
</html>
