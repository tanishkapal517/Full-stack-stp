<?php
if (isset($_GET['pid']) && isset($_COOKIE['cart'])) {
    $pid = intval($_GET['pid']);
    $cart = explode(",", $_COOKIE['cart']);
    $cart = array_diff($cart, [$pid]);
    $newCart = implode(",", $cart);

    if ($newCart != "") {
        setcookie("cart", $newCart, time() + 3600, "/");
    } else {
        setcookie("cart", "", time() - 3600, "/");
    }
}
header("location:mycart.php");
exit();
?>
