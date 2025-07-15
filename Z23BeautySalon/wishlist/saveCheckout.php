<?php
session_start();

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'Z23_Beauty_Salon';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve check out form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$shippingAddress = $_POST['shipping-address'];
$reference = $_POST['reference'];
$bank = $_POST['bank'];

// Insert checkout information into the database
$sqlCheckout = "INSERT INTO checkout (buyer_name, buyer_email, buyer_phone, buyer_address, reference, bank) VALUES (?, ?, ?, ?, ?, ?)";
$stmtCheckout = $conn->prepare($sqlCheckout);
$stmtCheckout->bind_param("ssssss", $name, $email, $phone, $shippingAddress, $reference, $bank);

if ($stmtCheckout->execute()) {
    // Get the checkout ID
    $checkoutId = $stmtCheckout->insert_id;

    // Retrieve selected items
    $cartItems = $_SESSION['cartItems'];
    
    // Fetch details of items in the cart
    $itemIds = "'" . implode("','", array_keys($cartItems)) . "'";
    $sqlItems = "SELECT id, title, price FROM item WHERE id IN ($itemIds)";
    $resultItems = $conn->query($sqlItems);

	// Insert bought items into the database
    $sqlItemsBought = "INSERT INTO items_bought (checkout_id, item_id, quantity, price) VALUES (?, ?, ?, ?)";
    $stmtItemsBought = $conn->prepare($sqlItemsBought);

    if ($resultItems->num_rows > 0) {
        while ($row = $resultItems->fetch_assoc()) {
            $itemId = $row['id'];
            $quantity = isset($cartItems[$itemId]['quantity']) ? $cartItems[$itemId]['quantity'] : 0;
            $price = $row['price'];

            $stmtItemsBought->bind_param("isdd", $checkoutId, $itemId, $quantity, $price);
            $stmtItemsBought->execute();
        }
        $stmtItemsBought->close();
        echo "Checkout information and items saved successfully.";
    } else {
        echo "No items found in the database.";
    }
} else {
    echo "Error inserting checkout information: " . $conn->error;
}

// Close connections
$stmtCheckout->close();
$conn->close();
?>
