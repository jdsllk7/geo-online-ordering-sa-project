<?php

$error_msg = 'Sorry could not connect to server...';
$servername = 'localhost';
$username = 'root';
$password = 'mysql';
$db = 'onlineOrders_db';

// CREATE CONNECTION
$conn = mysqli_connect($servername, $username, $password);

// CHECK CONNECTION
if (!$conn) {
    die($error_msg);
}

// CREATE THE DATABASE
// $sql = "DROP DATABASE IF EXISTS $db";
$sql = "CREATE DATABASE IF NOT EXISTS $db";
if (mysqli_query($conn, $sql)) {
    $conn = mysqli_connect($servername, $username, $password, $db);
} else {
    die($error_msg);
}

$sql = "CREATE TABLE IF NOT EXISTS orders (
	ordersId BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	email VARCHAR(255),
	lng VARCHAR(255) NOT NULL,
	lat VARCHAR(255) NOT NULL,
	orderText VARCHAR(255),
    totalPrice DECIMAL(15,2) DEFAULT 0.0,
    orderDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    orderStatus tinyint(1) NOT NULL     /* 0=pending | 1=attended to */
	)";
// $sql = "DROP TABLE IF EXISTS orders";
mysqli_query($conn, $sql);

$sql = "CREATE TABLE IF NOT EXISTS items (
	itemsId BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255),
    quantity INT(5) DEFAULT 1,
    itemPrice DECIMAL(15,2) DEFAULT 0.0,
    itemStatus tinyint(1) DEFAULT 1,
    ordersId BIGINT(20) UNSIGNED,
    FOREIGN KEY (ordersId) REFERENCES orders(ordersId)
	)";
// $sql = "DROP TABLE IF EXISTS items";
mysqli_query($conn, $sql);

//INSERT INTO `orders`(`email`, `lng`, `lat`, `orderText`, `orderStatus`) VALUES ('user@web.com', '12.334455', '-7.55534', 'Lusaka Complex', 0)


//GET TIME AGO
function getTimeAgo($timestamp)
{
    $time_ago = strtotime($timestamp);
    $current_time = time();
    $time_difference = $current_time - $time_ago;
    $seconds = $time_difference;
    $minutes = round($seconds / 60);
    $hours = round($seconds / 3600);
    $days = round($seconds / 86400);
    $weeks = round($seconds / 604800);
    $months = round($seconds / 2629440);
    $years = round($seconds / 31553280);

    if ($seconds <= 60) {    //seconds
        return "Just Now";
    } else if ($minutes <= 60) {
        if ($minutes == 1) {
            return "1 min ago";
        } else {
            return $minutes . " min ago";
        }
    } else if ($hours <= 24) {    //hours
        if ($hours == 1) {
            return "An hour ago";
        } else {
            return $hours . " hours ago";
        }
    } else if ($days <= 7) {    //days
        if ($days == 1) {
            return "A day ago";
        } else {
            return $days . " days ago";
        }
    } else if ($weeks <= 4.3) {    //weeks
        if ($weeks == 1) {
            return "A week ago";
        } else {
            return $weeks . " weeks ago";
        }
    } else if ($months <= 12) {    //months
        if ($months == 1) {
            return "A month ago";
        } else {
            return $months . " months ago";
        }
    } else {    //years
        if ($years == 1) {
            return "A year ago";
        } else {
            return $years . " years ago";
        }
    } //end main elseif()
}//end time_ago_uploaded()
