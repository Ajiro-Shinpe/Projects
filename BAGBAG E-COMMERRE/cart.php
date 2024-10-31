<?php
session_start();
include 'db.php';
include 'header.php';
?>

<div class="container">
    <h1>Your Cart</h1>
    
    <?php
    // Check if cart is empty
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])):
        $total = 0;

        // Create an array to store fetched product details
        $products_in_cart = [];

        // Fetch product details from the database
        foreach ($_SESSION['cart'] as $product_id => $product) {
            $stmt = $conn->prepare("SELECT p.name, p.price, pi.image FROM products p JOIN product_images pi ON p.id = pi.product_id WHERE p.id = ?");
            $stmt->bind_param("i", $product_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $product_data = $result->fetch_assoc();

            // If the product was found in the database, store the details
            if ($product_data) {
                $products_in_cart[$product_id] = [
                    'name' => $product_data['name'],
                    'price' => $product_data['price'],
                    'image' => $product_data['image'],
                    'quantity' => $product['quantity'],
                ];
            }
        }
    ?>
    
    <form action="order_form.php" method="post">
        <table>
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="cart-items">
                <?php foreach ($products_in_cart as $product_id => $product): 
                    $product_total = $product['price'] * $product['quantity'];
                    $total += $product_total;
                ?>
                <tr data-product-id="<?php echo $product_id; ?>">
                    <td><img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" style="width: 100px;"></td>
                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                    <td>Rs. <span class="product-price"><?php echo number_format($product['price'], 2); ?></span></td>
                    <td>
                        <button type="button" class="btn-decrement btn-light px-3 py-2">-</button>
                        <input type="number" name="quantity[<?php echo $product_id; ?>]" value="<?php echo htmlspecialchars($product['quantity']); ?>" min="1" style="width: 60px; text-align: center;color:white;" class="quantity-input">
                        <button type="button" class="btn-increment  btn-light px-3 py-2">+</button>
                    </td>
                    <td>Rs. <span class="product-total"><?php echo number_format($product_total, 2); ?></span></td>
                    <td>
                        <a href="remove_from_cart.php?product_id=<?php echo $product_id; ?>" class="btn btn-danger">Remove</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">Total</td>
                    <td>Rs. <span id="cart-total"><?php echo number_format($total, 2); ?></span></td>
                    <td>
                        <button type="submit" class="btn btn-success">Buy All</button>
                    </td>
                </tr>
            </tfoot>
        </table>
        <button type="submit" class="btn btn-primary">Update Cart</button>
    </form>

    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
</div>

<?php
include 'footer.php';
?>

<script>
// JavaScript to handle increment, decrement, and real-time updates
document.addEventListener('DOMContentLoaded', function () {
    const cartItems = document.getElementById('cart-items');
    const cartTotalElement = document.getElementById('cart-total');

    cartItems.addEventListener('click', function (event) {
        const target = event.target;
        const row = target.closest('tr');
        const quantityInput = row.querySelector('.quantity-input');
        const productPrice = parseFloat(row.querySelector('.product-price').textContent.replace(/,/g, ''));
        const productTotalElement = row.querySelector('.product-total');

        let quantity = parseInt(quantityInput.value);

        if (target.classList.contains('btn-increment')) {
            quantity += 1;
        } else if (target.classList.contains('btn-decrement') && quantity > 1) {
            quantity -= 1;
        }

        quantityInput.value = quantity;

        const productTotal = productPrice * quantity;
        productTotalElement.textContent = productTotal.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

        updateCartTotal();
    });

    function updateCartTotal() {
        let cartTotal = 0;

        document.querySelectorAll('.product-total').forEach(function (productTotalElement) {
            const productTotal = parseFloat(productTotalElement.textContent.replace(/,/g, ''));
            cartTotal += productTotal;
        });

        cartTotalElement.textContent = cartTotal.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }
});
</script>
