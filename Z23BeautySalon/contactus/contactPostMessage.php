<!DOCTYPE html>
<html>
<head>
    <title>Thank you!</title>
	<link rel="stylesheet" href="../style/webstyles.css">
	<style>
	body {
			padding: 25px;
			text-align: center;
		}
	</style>
</head>
<body>
    <div class="contactus">
		<?php
        // Retrieve form data
        $salutation = $_POST['salutation'];
        $enquiry = implode(", ", $_POST['enquiry']);
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $subject = $_POST['message'];
        $subscribe = isset($_POST['subscribe']) ? 1 : 0;

        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Z23_Beauty_Salon";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert data into the database
        $sql = "INSERT INTO contact_info (salutation, enquiry, name, email, phone, subject, subscribe)
                VALUES ('$salutation', '$enquiry', '$name', '$email', '$phone', '$subject', '$subscribe')";

        if ($conn->query($sql) === TRUE) {
            echo "Thank you for your enquiries. We will get back to you as soon as possible.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close connection
        $conn->close();
        ?>
		<div class="button-container">
            <input type="button" class="styled-button" onclick="window.location.href='../index.php'" value="Done">
        </div>
    </div>
</body>
</html>
