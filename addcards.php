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
            //caps??
            $title = $_POST['title'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            $user_id = $_POST['user_id'];

            echo $title;
            echo $description;
            echo $category;
            echo $user_id;

            $checkquery = "Select * from cards where card_title = '$title'";
            $old_execute_query = mysqli_query($database_connection, $checkquery);

            $num_rows = mysqli_num_rows($old_execute_query);
            echo $num_rows;
            if($num_rows > 0){
                echo "number: $num_rows";
                http_response_code(400);

            }
            else{
            
                $insertQuery = "INSERT INTO cards VALUES('', '$title','$description','','$category', '1')";

                $execute_query = mysqli_query($database_connection, $insertQuery);
                http_response_code(200);

            }

        }else{
            echo"Method not valid";
        }




}