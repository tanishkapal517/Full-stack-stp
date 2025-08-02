<?php
session_start();
include '../dbconfig/config.php';
$conn = @mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $qry = "DELETE FROM users WHERE user_id = $id";
    mysqli_query($conn, $qry);
}

mysqli_close($conn);
header("Location: ./viewuser.php");
exit();
?>
