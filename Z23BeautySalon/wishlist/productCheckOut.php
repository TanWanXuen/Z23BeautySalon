<?php
    session_start();

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'Z23_Beauty_Salon';

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>

<html>
<head>
	<title>Checkout</title>
	<title>My Wishlist</title>
	<link rel="stylesheet" href="../style/webstyles.css">
</head>
<body class="checkoout-body"  style="background-color:#ded8ce;">

<!--Show payment guidelines-->
<div class="payment-container">
	<div class="head">
		<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" viewBox="0 0 24 24">
		  <path fill-rule="evenodd" d="M5.535 7.677c.313-.98.687-2.023.926-2.677H17.46c.253.63.646 1.64.977 2.61.166.487.312.953.416 1.347.11.42.148.675.148.779 0 .18-.032.355-.09.515-.06.161-.144.3-.243.412-.1.111-.21.192-.324.245a.809.809 0 0 1-.686 0 1.004 1.004 0 0 1-.324-.245c-.1-.112-.183-.25-.242-.412a1.473 1.473 0 0 1-.091-.515 1 1 0 1 0-2 0 1.4 1.4 0 0 1-.333.927.896.896 0 0 1-.667.323.896.896 0 0 1-.667-.323A1.401 1.401 0 0 1 13 9.736a1 1 0 1 0-2 0 1.4 1.4 0 0 1-.333.927.896.896 0 0 1-.667.323.896.896 0 0 1-.667-.323A1.4 1.4 0 0 1 9 9.74v-.008a1 1 0 0 0-2 .003v.008a1.504 1.504 0 0 1-.18.712 1.22 1.22 0 0 1-.146.209l-.007.007a1.01 1.01 0 0 1-.325.248.82.82 0 0 1-.316.08.973.973 0 0 1-.563-.256 1.224 1.224 0 0 1-.102-.103A1.518 1.518 0 0 1 5 9.724v-.006a2.543 2.543 0 0 1 .029-.207c.024-.132.06-.296.11-.49.098-.385.237-.85.395-1.344ZM4 12.112a3.521 3.521 0 0 1-1-2.376c0-.349.098-.8.202-1.208.112-.441.264-.95.428-1.46.327-1.024.715-2.104.958-2.767A1.985 1.985 0 0 1 6.456 3h11.01c.803 0 1.539.481 1.844 1.243.258.641.67 1.697 1.019 2.72a22.3 22.3 0 0 1 .457 1.487c.114.433.214.903.214 1.286 0 .412-.072.821-.214 1.207A3.288 3.288 0 0 1 20 12.16V19a2 2 0 0 1-2 2h-6a1 1 0 0 1-1-1v-4H8v4a1 1 0 0 1-1 1H6a2 2 0 0 1-2-2v-6.888ZM13 15a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-2Z" clip-rule="evenodd"/>
		</svg>
		<h2>Payment Method</h2>
	</div>
	<div class="payment-info">
	<article>
        <p>PLEASE READ THIS BEFORE PROCEED:</p>
        <p>Kindly note that all payments should be transferred to the following bank account:</p>
        <p><strong>Z23 Beauty Salon</strong></p>
        Account Number: 738-888-0054<br>
        Bank: Public Bank Berhad
	</article>
    </div>
    <div class="payment-instruction">
	<article>
        <p>Upon completion of the transfer, we will send you a confirmation email within 3 days. If you wish to modify or cancel
        your order, kindly contact us at 012-7389779.
        Your cooperation is highly appreciated.</p>
    </article>
	</div>
	
<div class="checkout-container">
    <div class="summary-section">
        <h2>Summary</h2>
		<?php
           // Initialize cartItems array
			if (!isset($_SESSION['cartItems'])) {
				$_SESSION['cartItems'] = [];
			}

			$totalPrice = 0;

			// Check whether the cart is not empty
			if (!empty($_SESSION['cartItems'])) {
				// Retrieve selected items
				$cartItems = $_SESSION['cartItems'];

				// Fetch details of items in the cart
				$itemIds = "'" . implode("','", array_keys($cartItems)) . "'";
				$sql = "SELECT id, title, price, image_url FROM item WHERE id IN ($itemIds)";
				$result = $conn->query($sql);

				// Track the quantity of each item
				$itemQuantities = [];

				// Store the quantity of each item
				foreach ($cartItems as $itemId => $item) {
					$itemQuantities[$itemId] = $item['quantity'];
				}

				// Display items in the cart
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						$quantity = isset($itemQuantities[$row['id']]) ? $itemQuantities[$row['id']] : 0;

						// Show each product once with its respective quantity
						if ($quantity > 0) {
							echo "<div class='cart-item-co' id='cart-item-" . $row['id'] . "'>";
							echo "<p>x" . $quantity . "</p>";
							echo "<img src='" . $row['image_url'] . "' alt='" . $row['title'] . "' width='70' height='180'>";
							echo "<h4>" . $row['title'] . "</h4>";
							echo "<p id='pricePerItem'>RM" . $row['price'] . "</p>";   
							echo "</div>";

							$totalPrice += $row['price'] * $quantity;
						}
					}
				}
			}

			// Close database connection
			mysqli_close($conn);
		?>
		
		<!--Display the total price-->
        <div class='total-price'>  
            <br><br><p class='h5'><b>Total: <span class='fw-bold' id="total-price-value">RM <?php echo number_format($totalPrice, 2); ?></b></span></p>
        </div>
    </div>
	
	<!--Display check out form-->
    <div class="checkout-form">
        <h2>Check Out</h2>
		<form id="checkoutForm" action="" method="post">
			<div class="form-group-co">
				<br>
				<label for="checkoutName" class="input-label-co">Name:</label>
				<input type="text" id="checkoutName" name="name" class="input-field-co" placeholder="Enter your name" autocomplete="off">
				<div id="checkoutNameError" class="error-message"></div>
			</div>
			<div class="form-group-co">
				<label for="checkoutEmail" class="input-label-co">E-mail:</label>
				<input type="email" id="checkoutEmail" name="email" class="input-field-co" placeholder="Enter your email" autocomplete="off">
				<div id="checkoutEmailError" class="error-message"></div>
			</div>
			<div class="form-group-co">
				<label for="checkoutPhone" class="input-label-co">Phone Number:</label>
				<input type="tel" id="checkoutPhone" name="phone" class="input-field-co" placeholder="Enter your phone number" autocomplete="off">
				<div id="checkoutPhoneError" class="error-message"></div>
			</div>
			<div class="form-group-co">
				<label for="checkoutShippingAddress" class="input-label-co">Shipping Address:</label>
				<textarea id="checkoutShippingAddress" name="shipping-address" rows="3" cols="3" class="input-field-co" placeholder="Enter your shipping address" autocomplete="off"></textarea>
				<div id="checkoutShippingAddressError" class="error-message"></div>
			</div>
			<div class="form-group-co">
				<label for="reference" class="input-label-co">Payment Reference Number:</label>
				<input type="text" id="referenceNo" name="reference" class="input-field-co" placeholder="Enter payment reference number" autocomplete="off">
				<div id="referenceError" class="error-message"></div>
			</div>
			<div class="form-group-co">
				<label for="bankName" class="input-label-co">Bank Name:</label>
				<input type="text" id="checkoutBank" name="bank" class="input-field-co" placeholder="Enter bank name" autocomplete="off">
				<div id="checkoutBankError" class="error-message"></div>
			</div>
			<div class="confirmation-message">
				<p>Please note that your products will be shipped within 5 working days once the payment was confirmed.</p>
				<p>We appreciate your cooperation and thank you for choosing us.</p>
				<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
					<path d="m12.75 20.66 6.184-7.098c2.677-2.884 2.559-6.506.754-8.705-.898-1.095-2.206-1.816-3.72-1.855-1.293-.034-2.652.43-3.963 1.442-1.315-1.012-2.678-1.476-3.973-1.442-1.515.04-2.825.76-3.724 1.855-1.806 2.201-1.915 5.823.772 8.706l6.183 7.097c.19.216.46.34.743.34a.985.985 0 0 0 .743-.34Z"/>
				</svg>
			</div>
			<div class="button-container">
				<input type="submit" value="Confirm" class="styled-button-co" onclick="validateForm(event)" name="submit-co">
			</div>
		</form>
    </div>
</div>
<script src="wishlist.js"></script>
</body>
</html>