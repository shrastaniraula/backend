<?php
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_database = "flipfacts";

$database_connection = mysqli_connect($db_host, $db_username, $db_password, $db_database);

if(!$database_connection){
    echo "Error";
    echo http_response_code(404);
}
else{

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $title = $_POST['title'];
            $description = $_POST['description'];
            $card_id = $_POST['card_id'];

            echo $title;
            echo $description;
            echo $card_id;


            
                $updateQuery = "DELETE FROM cards WHERE card_id='$card_id'";

                $execute_query = mysqli_query($database_connection, $updateQuery);
                http_response_code(200);

        }else{
            echo"Method not valid";
        }




}