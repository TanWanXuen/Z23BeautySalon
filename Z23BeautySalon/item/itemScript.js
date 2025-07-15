function closePreview() {
    document.querySelector('#items-preview').style.display = 'none';
}

document.querySelectorAll('.items-container .item').forEach(product => {
    product.addEventListener('click', () => {
        let id = product.getAttribute('item-id');
        let previews = document.querySelectorAll('#items-preview .preview');
        previews.forEach(preview => {
            if (preview.getAttribute('target-id') === id) {
                document.querySelector('#items-preview').style.display = 'block';
                preview.style.display = 'block';
            } else {
                preview.style.display = 'none';
            }
        });
    });
});

 // Get all "Add to Cart" buttons
var addToCartButtons = document.querySelectorAll('.addToCartBtn');

// Loop through each button and attach event listener
addToCartButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        var form = this.closest('.addToCartForm'); 
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../wishlist/index.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Item successfully added to cart
                    alert('Item added to cart!');

                    // Redirect to the next page when the cart logo is clicked
                    document.getElementById('nextPageLink').addEventListener('click', function() {
                        window.location.href = '../wishlist/index.php';
                    });
                } else {
                    alert('Failed to add item to cart. Please try again later.');
                }
            }
        };
        xhr.send(formData);
    });
});