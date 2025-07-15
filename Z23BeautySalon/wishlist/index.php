<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Z23_Beauty_Salon";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Include header and navigation
include("../includes/header.php");
include("../includes/nav.php");
?>
    
<head>
    <title>My Wishlist</title>
	<link rel="stylesheet" href="../style/webstyles.css">
</head>
<body>
    <div class="wishlist-container">
        <div class="wishlist-heading"><b>My Wishlist</b></div>
        <?php
            
        // Initialize cartItems array
        if (!isset($_SESSION['cartItems'])) {
            $_SESSION['cartItems'] = [];
        }

        // Check if an item ID is submitted
        if (isset($_POST['item-id'])) {
            $itemId = $_POST['item-id'];
            
            // Check if the item already exists in the cart
            if (array_key_exists($itemId, $_SESSION['cartItems'])) {
                $_SESSION['cartItems'][$itemId]['quantity']++;
            } else {
                $_SESSION['cartItems'][$itemId] = ['quantity' => 1];
            }
        }

        $totalPrice = 0;
        ?>
        
        <?php
        if (empty($_SESSION['cartItems'])) {
            ?>
            <div id="wishlist-product-col">
                <br><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6"/>
                </svg>
                <p>There are no items in the cart</p>
                <a href="../item/index.php" class="shopping-button">Go Shopping</a>
            </div>
        <?php
        } else {
        ?>
        
        <!-- Display the items added to cart -->
        <div class="wishlist">        
        <?php
            // Retrieve selected items
            $cartItems = $_SESSION['cartItems'];

            // Fetch details of items in the cart
            $itemIds = "'" . implode("','", array_keys($cartItems)) . "'";
            $sql = "SELECT id, title, price, image_url FROM item WHERE id IN ($itemIds)";
            $result = $conn->query($sql);

            // Display items in the cart
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $quantity = isset($cartItems[$row['id']]['quantity']) ? $cartItems[$row['id']]['quantity'] : 0;
					$quantity = max(0, $quantity);
					
                        ?>                          
                        <div class='cart-item' id='cart-item-<?php echo $row['id']; ?>'>
							<p><b><?php echo $row['id'];?></b></p>
                            <img src='<?php echo $row['image_url']; ?>' alt='<?php echo $row['title']; ?>' width='100' height='250'>
                            <h4><?php echo $row['title']; ?></h4>
                            <p>Price: RM<?php echo $row['price']; ?></p>
                            <div class="quantity-selector">
								<button id="quantity-input- " class="decrement-btn" data-item-id="<?php echo $row['id']; ?>" onclick="decreaseItem('<?php echo $row['id']; ?>')">-</button>
                                <input type="number" class="quantity-input" id="quantity-input-<?php echo $row['id']; ?>" value="<?php echo $quantity; ?>">
                                <button id="quantity-input- " class="increment-btn" data-item-id="<?php echo $row['id']; ?>" onclick="increaseItem('<?php echo $row['id']; ?>')">+</button>
                            </div>
                            <button class='remove-btn' onclick='removeItem("<?php echo $row['id']; ?>", event)'>Remove</button>
                        </div>
                        <?php

                        $totalPrice += $row['price']*$quantity;
                    }
                }
            }
        ?>
        </div>
        <form action="productCheckOut.php" method="post">
        <?php
        // Check if the cart is not empty
        if (!empty($_SESSION["cartItems"])) {
        ?>
            <!-- Display the total price and checkout button -->
            <div class='wishlist-product-col' id="total-price-section">
                <div class='total-price'>  
                    <p>Total: <span class='fw-bold' id="total-price-value">RM <?php echo number_format($totalPrice, 2); ?></span></p>
                </div>
                <div class='text-center'>
                    <input type="hidden" name="cartItems" value='<?php echo json_encode($_SESSION["cartItems"]); ?>'>
                    <input type="submit" class="checkout-btn" value="Checkout">
                </div>
            </div>
    <?php
    }
    ?>

        </form>
    </div>
    
  <script src="wishlist.js"></script>
    
<!-- Display Footer -->
<?php include("../includes/footer.php");?>
<br>
</body>
</html>
