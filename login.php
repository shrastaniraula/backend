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
        $name = $_POST['name'];
        $password = $_POST['password'];

        $checkquery = "Select * from users where user_name = '$name'";
        
        $execute_query = mysqli_query($database_connection, $checkquery);

        $num_rows = mysqli_num_rows($execute_query);
        if($num_rows > 0){
            echo "number: $num_rows";
            http_response_code(200);
        }
        else{
            http_response_code(400);

        }

    }else{
        echo"Method not valid";
    }

}