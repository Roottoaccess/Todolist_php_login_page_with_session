<?php
# Here we will code the database connection of this login system
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "github";

# Making the connection

$conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);


# Checking that the connection is done or not 
if(!$conn){
    die("sorry we cannot make you connect 404 database not found".mysqli_connect_error());
}
// else{
//     echo "200 ok !";
// }

# Successfully connected !

?>