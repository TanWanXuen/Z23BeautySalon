<!DOCTYPE html>
<html>
<head>
    <title>Item List</title>
	<link rel="stylesheet" href="../style/webstyles.css">
    <style>
		h4,h5,h6{
			font-size: 1.5rem;
			text-align: center;
		}
		p{
			font-size: 1.4rem;
		}
    </style>
</head>
<body>
    <?php 
        // Start a session
        session_start();
        
        include("../includes/header.php");
        include("../includes/nav.php");

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Z23_Beauty_Salon";
        
        //Connect the database
        $conn = new mysqli($servername, $username ,$password ,$dbname);
        
        //Check connection
        if($conn->connect_error){
            die("Connection failed: ".$conn->connect_error);
        }
    ?>

    <div id="container">
        <!--Display cart logo-->
        <div id="cart-logo">
            <a href="../wishlist/index.php">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
                </svg>
            </a>
        </div>

        <!-- Display Title -->
        <h2 class="title">
            Products</h2>

        <!-- Display Item Navigation -->
        <?php include('itemNav.php'); ?>

        <h3 class="itemsList-title">
            NAIL TOOL</h3>

        <div class="items-container">
            <?php
                // Fetch items from the database
                $sql = "SELECT id , image_url ,title, type, price, quantity FROM item WHERE category='NAIL TOOL'";
                $result = $conn->query($sql);

                // Generate HTML markup for each item
                // Display every items
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='item' item-id='" . $row['id'] . "'>";
                        echo "<h4>". $row['id'] . "</h4>";
                        echo "<h5>" . $row['type'] . "</h5>";
                        echo "<img src='" . $row['image_url'] . "' alt='" . $row['title'] . "' width='140' height='200'>";
                        echo "<h6>" . $row['title'] . "</h6>";
                        echo "<p>Price: RM" . $row['price'] . "</p>";
                        echo "<p>Quantity: " . $row['quantity'] . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "0 results";
                }    
            ?>
        </div>
    </div>
        
    <div id="items-preview">
        <?php include('itemPreview.php');?>
    </div>
    <script src="itemScript.js"></script>

    <!-- Display Footer -->
    <?php include('../includes/footer.php'); ?>
    <br> 
</body>
</html>