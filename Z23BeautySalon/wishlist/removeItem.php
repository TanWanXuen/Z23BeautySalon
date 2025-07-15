<?php
session_start();

// Check if the item ID is provided in the request
if (isset($_GET['id'])) {
    $itemId = $_GET['id'];
    if (isset($_SESSION['cartItems'][$itemId])) {
        // Get the quantity of the removed item
        $quantity = $_SESSION['cartItems'][$itemId]['quantity'];
        unset($_SESSION['cartItems'][$itemId]);
        // Return the success status
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('error' => 'Item not found in cart'));
    }
} else {
    echo json_encode(array('error' => 'Item ID not provided'));
}
?>
