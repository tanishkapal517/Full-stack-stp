<?php
if (!isset($_GET['pid'])) {
    header("location:index.php");
    exit();
}
$id = intval($_GET['pid']);
if (isset($_COOKIE['cart']) && $_COOKIE['cart'] != "") {
    $cart = $_COOKIE['cart'] . "," . $id;
    setcookie("cart", $cart, time() + 3600, "/");
} else {
    setcookie("cart", $id, time() + 3600, "/");
}
header("location:desc.php?pid=$id");
exit();
?>
