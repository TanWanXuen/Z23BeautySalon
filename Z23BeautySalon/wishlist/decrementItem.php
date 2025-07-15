<?php
session_start();

// Check if the item ID is provided in the request
if (isset($_GET['id'])) {
    $itemId = $_GET['id'];
    if (isset($_SESSION['cartItems'][$itemId])) {
        // Increment the quantity of the item by 1
        $_SESSION['cartItems'][$itemId]['quantity']--;
        echo json_encode(array('success' => true, 'quantity' => $_SESSION['cartItems'][$itemId]['quantity'], 'price' => $totalPrice));
    } else {
        echo json_encode(array('error' => 'Item not found in cart'));
    }
} else {
    echo json_encode(array('error' => 'Item ID not provided'));
}
?>