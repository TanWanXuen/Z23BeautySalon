 function removeItem(itemId, event) {
        event.preventDefault(); // Prevent the default form submission behavior
        
        // Send an AJAX request to remove the item from the session
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "removeItem.php?id=" + itemId, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        // Remove the item from the page
                        var itemElement = document.getElementById('cart-item-' + itemId);
                        if (itemElement) {
                            itemElement.parentNode.removeChild(itemElement);
                        }
                        // Refresh the total price after successful removal
                        updateTotalPrice(response.price, '-');
                        alert('Item removed successfully');
                    } else {
                        // Handle error response
                        alert('Error: ' + response.error);
                    }
                } else {
                    // Handle HTTP error
                    alert('Error: ' + xhr.status);
                }
            }
        };
        xhr.send();
    }

document.addEventListener('DOMContentLoaded', function () {
    var incrementButtons = document.querySelectorAll('.increment-btn');
    var decrementButtons = document.querySelectorAll('.decrement-btn');

    incrementButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            var input = this.closest('.quantity-selector').querySelector('.quantity-input');
            var value = parseInt(input.value, 10);
            value = isNaN(value) ? 0 : value;
            if (value < 10) {
                value++;
                input.value = value;

                // Send an AJAX request to increase items
				var itemId = this.closest('.cart-item- ').getAttribute('data-item-id');
				increaseItem(itemId);
            }
        });
    });

    decrementButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            var input = this.closest('.quantity-selector').querySelector('.quantity-input');
            var value = parseInt(input.value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                input.value = value;

                // Send an AJAX request to decrease items
                var itemId = this.closest('.cart-item- ').getAttribute('data-item-id');
                decreaseItem(itemId);
           } 
        });
    });	
});

function decreaseItem(itemId) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'decrementItem.php?id=' + itemId, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    // Update quantity input field 
                    var quantityInput = document.getElementById('quantity-input-' + itemId);
                    quantityInput.value = response.quantity;

                    // Update total price
                    updateTotalPrice(response.price, '-');
					
                } else {
                    // Handle error response
                    alert('Error: ' + response.error);
                }
            } else {
                // Handle HTTP error
                alert('Error: ' + xhr.status);
            }
        }
    };
    xhr.send();
}

function increaseItem(itemId) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'incrementItem.php?id=' + itemId, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    // Update quantity input field 
                    var quantityInput = document.getElementById('quantity-input-' + itemId);
                    quantityInput.value = response.quantity;

                    // Update total price
                    updateTotalPrice(response.price, '+');
                } else {
                    // Handle error response
                    alert('Error: ' + response.error);
                }
            } else {
                // Handle HTTP error
                alert('Error: ' + xhr.status);
            }
        }
    };
    xhr.send();
}

function updateTotalPrice(price, operation) {
    var totalPriceElement = document.getElementById('total-price-value');
    var totalPrice = parseFloat(totalPriceElement.innerText.replace('RM ', ''));
    var itemPrice = parseFloat(price);
    if (operation === '+') {
        totalPrice += itemPrice;
    } else if (operation === '-') {
        totalPrice -= itemPrice;
    }
    totalPriceElement.innerText = 'RM ' + totalPrice.toFixed(2);
        
    // Reload the page after updating the total price
    window.location.reload();
}
    
// Get all buttons on the page
var buttons = document.querySelectorAll('button');
buttons.forEach(function(button) {
	button.addEventListener('click', function() {
		// Reload the page
		location.reload();
	});
});

/*for productChecOut.php validation*/
function validateForm(event) {
        event.preventDefault(); // Prevent default form submission behavior
        
        var form = document.getElementById('checkoutForm');
        var isValid = true; 

        // Clear previous error messages
        document.querySelectorAll('.error-message').forEach(function (error) {
            error.textContent = '';
        });
		
        // Validate name
        if (form['checkoutName'].value.trim() === '') {
            document.getElementById('checkoutNameError').textContent = 'Name is required.';
            isValid = false;
        }

        // Validate email
        if (form['checkoutEmail'].value.trim() === '') {
            document.getElementById('checkoutEmailError').textContent = 'Email is required.';
            isValid = false;
        } else if (!(/^\S+@\S+\.\S+$/.test(form['checkoutEmail'].value))) {
            document.getElementById('checkoutEmailError').textContent = 'Email is not valid.';
            isValid = false;
        }

        // Validate phone number
        if (form['checkoutPhone'].value.trim() === '') {
            document.getElementById('checkoutPhoneError').textContent = 'Phone number is required.';
            isValid = false;
        } else if (!/^\d+$/.test(form['checkoutPhone'].value)) {
            document.getElementById('checkoutPhoneError').textContent = 'Phone number must be numeric.';
            isValid = false;
        }

        // Validate shipping address
        if (form['checkoutShippingAddress'].value.trim() === '') {
            document.getElementById('checkoutShippingAddressError').textContent = 'Shipping address is required.';
            isValid = false;
        }
		
		//Validate reference number
		if(form['referenceNo'].value.trim()===''){
			document.getElementById('referenceError').textContent='Payment reference number is required.';
			isValid=false;
		}
		
		//Validate bank name
		if(form['checkoutBank'].value.trim()===''){
			document.getElementById('checkoutBankError').textContent='Bank name is required.';
			isValid=false;
		}
		
        if (isValid) {
        // Submit the form if all inputs are valid
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'saveCheckout.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                if (xhr.status == 200) {
                    alert('Checkout information and items saved successfully.');
                    window.location.href = 'postMessage.php';
                } else {
                    // Error message
                    alert('Error: ' + xhr.responseText);
                }
            }
        };
        xhr.send(new URLSearchParams(new FormData(form)));
    }
    }
