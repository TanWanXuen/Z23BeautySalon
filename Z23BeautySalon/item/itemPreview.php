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
    // Fetch items from the database
    $sql = "SELECT * FROM item";
    $result = $conn->query($sql);

    // Generate HTML markup for each item
	// Display every item
	if ($result->num_rows > 0) {
		// Output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<div class='preview' target-id='" . $row['id'] . "'>";
			echo "<div class='close-button' onclick='closePreview()'>X</div>";
			echo "<h4>". $row['id'] . "</h4>";
            echo "<h5>" . $row['type'] . "</h5>";
			echo "<img src='" . $row['image_url'] . "' alt='" . $row['title'] . "' width='140' height='200'>";
			echo "<h6>" . $row['title'] . "</h6>";
			echo "<p>" . $row['description'] . "</p>";
			echo "<p>Price: RM" . $row['price'] . "</p>";
			echo "<p>Quantity: " . $row['quantity'] . "</p>";
			echo "<form class='addToCartForm' action='../wishlist/index.php' method='post'>";
			echo "<input type='hidden' name='item-id' value='" . $row['id'] . "'>";
			echo "<br>";
			echo "<button type='button' class='button addToCartBtn'>Add to Cart</button>";
			echo "</form>";
			echo "</div>";
		}
    } else {
        echo "0 results";
    }   

    // Close the database connection
    $conn->close();
 ?>