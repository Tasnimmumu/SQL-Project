<?php

if (isset($_POST['login-submit'])) {
    require 'database_connection.php';

    $User = $_POST['uname'];
    $password = $_POST['pwd'];

    if(empty($User) || empty($password)){
        header("Location: ../sign.php?result=emptyfields");
        exit();
    } else {
        //SQl to find the user
        $sql = "SELECT * FROM user_info 
        WHERE user_name='$User' OR Email='$User';";
    $result = $conn->query($sql) or die($conn->error);

    if(mysqli_num_rows($result) == 0){
        //if the user doen not exist 
        header("Location: ../sign.php?result=notfound");
        exit();
    } else if ($row = mysqli_fetch_assoc($result)){
        //check for password match
        
        if($password != $row['password']){
        header("Location: ../sign.php?result=wrongpwd");
        exit();
    } else if($password == $row['password']){

        session_start();
        $_SESSION['userid'] = $row['uid'];
        $_SESSION['username'] = $row['user_name'];
        header("Location: ../home.php?result=Rightpwd");
        exit();
    }
    }
    }

} 
else{
    header("Location: ../sign.php");
}