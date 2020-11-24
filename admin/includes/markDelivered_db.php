<?php
include_once 'connect.php';

if (isset($_POST["ordersId"])) {
    $ordersId = $_POST["ordersId"];

    $data = mysqli_query($conn, "SELECT orderStatus FROM `orders` WHERE ordersId = $ordersId");
    $ordersResult = mysqli_fetch_assoc($data);
    $newOrderStatus = 0;
    if ($ordersResult["orderStatus"] == 0) {
        $newOrderStatus = 1;
    }
    if (mysqli_query($conn, "UPDATE orders SET orderStatus = $newOrderStatus WHERE ordersId = $ordersId")) {
        $ordersPending = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `orders` WHERE orderStatus = 0"));
        $ordersCompleted = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `orders` WHERE orderStatus = 1"));
        $ordersAll = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `orders`"));

        $output = 'success__' . $ordersPending . '__' . $ordersCompleted . '__' . round((($ordersCompleted / $ordersAll) * 100), 0);
    } else {
        $output = 'Error occurred. Reload page & try again';
    }
} else {
    $output = 'Error occurred. Reload page & try again';
}
echo $output;
