<?php
include "../admin/connection/connect.php";


if (isset($_POST['action'])) {
    $item_id = $_POST['item_id'];
    $action = $_POST['action'];

    $sql = "SELECT quantity, price FROM cart_tb WHERE id = $item_id";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);

    $current_quantity = $row['quantity'];
    $current_price = $row['price'];

    // Update quantity first
    if ($action == "increase") {
        $new_qty = $current_quantity + 1;
    } elseif ($action == "decrease") {
        $new_qty = max(1, $current_quantity - 1);
    }

    // ✅ Now calculate subtotal using updated quantity
    $new_subtotal = $new_qty * $current_price;

    // ✅ Calculate delivery
    $delivery = ($new_subtotal > 1000) ? 0 : 40;

    // ✅ Update all three values
    $update_query = "UPDATE cart_tb SET quantity = $new_qty, subtotal = $new_subtotal, delivery = $delivery WHERE id = $item_id";
    $updated = mysqli_query($conn, $update_query);

    if ($updated) {
        header("Location: " . $SITEURL . "cart.php");
        exit();
    } else {
        echo "Error updating cart.";
    }
}

?>

