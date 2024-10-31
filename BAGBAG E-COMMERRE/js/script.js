// -------------------- loader -------------------- 

const load = document.querySelector('.preloadscn');

window.addEventListener("DOMContentLoaded", () => {
    setTimeout(() => {
        load.style.display = "none";
    }, 2000);
});





// add to cart
document.addEventListener('DOMContentLoaded', () => {
    // Increment and decrement functionality
    document.querySelectorAll('.increment').forEach(button => {
        button.addEventListener('click', () => {
            const quantityInput = button.previousElementSibling;
            quantityInput.value = parseInt(quantityInput.value) + 1;
        });
    });

    document.querySelectorAll('.decrement').forEach(button => {
        button.addEventListener('click', () => {
            const quantityInput = button.nextElementSibling;
            if (parseInt(quantityInput.value) > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        });
    });

    // Add to Cart functionality
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', () => {
            const productId = button.getAttribute('data-product-id');
            const productName = button.getAttribute('data-product-name');
            const productPrice = button.getAttribute('data-product-price');
            const productImage = button.getAttribute('data-product-image');
            const quantity = button.previousElementSibling.querySelector('.quantity').value;

            // Add product to cart
            addToCart(productId, productName, productPrice, productImage, quantity);
        });
    });

    function addToCart(id, name, price, image, quantity) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'add_to_cart.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status === 200) {
                alert('Product added to cart!');
            }
        };
        xhr.send(`action=add&id=${id}&name=${name}&price=${price}&image=${image}&quantity=${quantity}`);
    }
});
