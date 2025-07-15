<!DOCTYPE html>
<html>
<head>
    <title>Service List</title>
    <link rel="stylesheet" href="../style/webstyles.css">
    <style>
		h4,h5{
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
        include("../includes/header.php");
        include("../includes/nav.php");
    ?>

    <div id="container">
        <!-- Display a BOOKING button-->
        <button class='bookingButton'><a href='booking.php'>Booking</a></button>
        <!-- Display Title -->
        <h2 class="title">
            Services
        </h2>

        <?php include('serviceNav.php'); ?>
        <!-- Display All Massage -->
    
        <h3 class="itemsList-title">
            MASSAGE</h3>

        <div class="service-container">
            <?php
                // Fetch items from the database
                $sql = "SELECT * FROM service WHERE category='MASSAGE'";
                $result = $conn->query($sql);

                // Generate HTML markup for each item
                // Display every items
                if ($result->num_rows > 0) {

                    //Initialize item pic number count
                    $serviceNum = 1;

                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='item'>";
                        $image_url = "../photos/serviceMassage".$serviceNum.".jpeg";
                        echo "<img src='" . $image_url."' width='140' height='200'>";
                        echo "<h5>" . $row['type'] . "</h4>";
                        echo "<p>Price Range: " . $row['priceRange'] . "</p>";
                        echo "</div>";
                        $serviceNum++;
                    }
                }else {
                    echo "0 results";
                } 
                
                // Close the database connection
                $conn->close();
            ?>
        </div>
    </div>

    <?php include('../includes/footer.php'); ?>
    </br> 
</body>
</html>