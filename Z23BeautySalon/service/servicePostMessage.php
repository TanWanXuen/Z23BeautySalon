<!DOCTYPE html>
<html>
<head>
    <title>Thank you!</title>
	<link rel="stylesheet" href="../style/webstyles.css">
</head>
<body>
    <div class="service-details">
        <h2>Thank you for choosing us!</h2>
        <p>Your service details are:</p>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "Z23_Beauty_Salon";
            
            //Connect the database
            $conn = new mysqli($servername, $username, $password, $dbname);
        
            //Check connection
            if($conn->connect_error){
                die("Connection failed: ".$conn->connect_error);
            }
        
            // Retrieve form data
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $numPax = $_POST['numPax'];
            $serviceType = implode(", ", $_POST['serviceType']); 
            $date = $_POST['booking-date'];
            $time = $_POST['time'];
            $message = $_POST['booking-message'];
            
            // SQL query to insert data into the table
            $sql = "INSERT INTO service_bookings (name, email, phone, num_pax, service_type, preferred_date, preferred_time, additional_message) 
            VALUES ('$name', '$email', '$phone', '$numPax', '$serviceType', '$date', '$time', '$message')";

            // Execute the query
            if ($conn->query($sql) === TRUE) {
                // Build the query string
                $queryString = http_build_query([
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'numPax' => $numPax,
                    'serviceType' => $serviceType,
                    'date' => $date,
                    'time' => $time,
                    'message' => $message
                ]);

                // Redirect to the thank you page with the query string
                header('Location: thank-you.php?' . $queryString);
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close the database connection
            $conn->close();
        ?>
    </div>
</body>
</html>
