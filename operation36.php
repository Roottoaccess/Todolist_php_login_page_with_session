<?php
session_start();
require('db_config.php');

# Here in this operation36 we will do the operation of every database query 

if($_POST){
    if($_POST['operation'] == 'Signup'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $number = $_POST['number'];

        # Writing the sql query to insert the data 
        $sql = "insert into student(name,email,password,number)values('$name','$email','$password','$number')";

        if(mysqli_query($conn , $sql)){
            $location = "login.php";
            header("Location:$location");
        }
    }
}


?>