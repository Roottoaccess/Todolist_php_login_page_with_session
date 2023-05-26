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
    if($_POST['operation'] == "Login"){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "select * from student where email='$email' and password='$password'";
        $result = mysqli_query($conn,$sql);
        if($row = mysqli_fetch_assoc($result)){
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];

            $location = "todo.php";
            header("Location:$location");
        }
        else{
            $location = "login.php";
            header("Location:$location");
        }
    }

    if($_POST['operation'] == 'Logout'){
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        session_destroy();
        $location = "login.php";
        header("Location:$location");
    }
}


?>