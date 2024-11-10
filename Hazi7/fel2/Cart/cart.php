<?php
require_once 'autoload.php';

use Cart\Services\Cart;

session_start();

$cart = new Cart();

if (isset($_POST['remove_from_cart'])) {
    $productId = (int)$_POST['product_id'];
    $cart->removeItem($productId);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Shopping Cart</h1>
    <ul>
        <?php foreach ($cart->getItems() as $productId => $item) { ?>
            <li>
                <form method="post">
                    <?php echo htmlspecialchars($item->getProduct()->getName()); ?> -
                    $<?php echo number_format($item->getProduct()->getPrice(), 2); ?>
                    (Quantity: <?php echo $item->getQuantity(); ?>)
                    <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                    <input type="submit" name="remove_from_cart" value="Remove from Cart">
                </form>
            </li>
        <?php } ?>
    </ul>

    <p>Total Price: $<?php echo number_format($cart->getTotalPrice(), 2); ?></p>
</body>
</html>