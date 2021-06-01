<?php

if (isset($_POST['signup-submit'])) {
    require 'database_connection.php';

    $username = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

        //check for any possible errors
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../registration.php?result=invalidmail&uid=" . $username);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../registration.php?result=invaliduid&mail=" . $email);
        exit();
    } else if ($passwordRepeat !== $password) {
        header("Location: ../registration.php?result=passwordcheck&uid=" . $username . "&email=" . $email);
        exit();
    }
    
    else {//if duplicate username exists
        $sql="SELECT User_Name FROM user_info
        WHERE User_Name = '$username'";
     $result = $conn->query($sql) or die($conn->error);
     if(mysqli_num_rows($result) > 0){
        header("Location: ../registration.php?result=usertaken&mail=" . $email);
        exit();
     } else {
        // run this if no errors

        $sql = "INSERT INTO user_info(User_Name,Email,Password)
                VALUES ('$username','$email','$password')";
        
                if(mysqli_query($conn,$sql)){
                    header("Location: ../registration.php?result=successful");
                } else {
                    header("Location: ../registration.php?result=unsucessful");
                }
            }
    }


} 

else {
    header("Location: ../registration.php");
}

