<?php
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_database = "flipfacts";

$database_connection = mysqli_connect($db_host, $db_username, $db_password, $db_database);

// echo "hello";
// Check connection

if (mysqli_connect_errno()) {
    echo "Failed to connect to the Server: " . mysqli_connect_error();
} else {

    $category = $_GET['category'];
    // echo "$category";
   
    // card_title card_description
    $query = "Select * from cards where category = '$category'";
    $values = array();
    $result = mysqli_query($database_connection, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($values, $row);
    }
    echo json_encode($values);
}
