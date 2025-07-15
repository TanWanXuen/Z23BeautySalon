<!DOCTYPE HTML>
<html>
<head>
    <title>Create an Account</title>
    <link rel="stylesheet" href="../style/webstyles.css">
    <style>
        body {
            padding: 25px;
        }
    </style>
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <?php include('../includes/nav.php'); ?>
    <?php include('../includes/database.php'); ?>
    
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Initialize variables
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $password = $_POST['password'] ?? '';

            // Initialize an array to hold error messages
            $errors = [];

            // Perform validation
            if (empty($name)) {
                $errors['name'] = 'Your name is required.';
            }
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'A valid email is required.';
            }
            $phone = str_replace([' ', '-', '(', ')'], '', $phone); // Strip common formatting characters
            if (empty($phone)) {
                $errors['phone'] = 'Phone number is required.';
            } elseif (!ctype_digit($phone)) {
                $errors['phone'] = 'Phone number must be numeric.';
            } 
            if (empty($password)) {
                $errors['password'] = 'A password of your choice is required.';
            }

            // Check if there are any errors
            if (empty($errors)) {
                // Check if email already exists
                $check_stmt = $conn->prepare("SELECT COUNT(*) as count FROM users WHERE email = ?");
                $check_stmt->bind_param("s", $email);
                $check_stmt->execute();
                $result = $check_stmt->get_result();
                $row = $result->fetch_assoc();

                if ($row['count'] > 0) {
                    // Email already exists, display error
                    echo '<div id="contentWrapper" class="content">';
                    echo "<h2>Error</h2>";
                    echo "The email address you provided is already registered.\nPlease choose login to proceed.";
                    echo "<br><br>";
                    echo '<button class="accountButton"><a href="/Z23BeautySalon/index.php">Return to Home Page</a></button>';
                    echo "</div>";
                } else {
                    // Email does not exist, proceed with insertion
                    $insert_stmt = $conn->prepare("INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)");
                    $insert_stmt->bind_param("ssss", $name, $email, $phone, $password);
                    
                    if ($insert_stmt->execute()) {
                        // Success message
                        echo '<div id="contentWrapper" class="content">';
                        echo "<h2>Submission Details</h2>";
                        echo "Name: " . htmlspecialchars($name) . "<br>";
                        echo "Email: " . htmlspecialchars($email) . "<br>";
                        echo "Phone: " . htmlspecialchars($phone) . "<br>";
                        echo "Password: " . htmlspecialchars($password). "<br><br>";
                        
                        echo "Thank you for signing up with us! Your account has been successfully created!";
                        echo "<br>";
                        echo "Please return to the home page and log into your new account!";
                        echo "<br><br>";
                        echo '<button class="accountButton"><a href="/Z23BeautySalon/index.php">Return to Home Page</a></button>';
                        echo "</div>";
                    } else {
                        // Error message
                        echo "Error: " . $insert_stmt->error;
                    }
                }
            } else {
                // Redisplay the form, with error messages
                include('form.php');
            }
        } else {
            // Display the form for the first time
            $name = $email = $phone = $password = '';
            $errors = [];
            include('form.php');
        }
    ?>
    <?php include('../includes/footer.php'); ?>
</body>
</html>
