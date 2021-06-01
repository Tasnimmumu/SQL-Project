<?php
require 'database_connection.php';

if (isset($_POST['review_submit'])){
    //take variables from POST method
    $review = $_POST['stars'];
    $comment = $_POST['des'];
    $uid = $_POST['uid'];
    $product_id= $_POST['id'];
    date_default_timezone_set('Asia/Dhaka');
    $time = date('H:i:s',time());
    //echo $review.' '.$comment.' '.$uid;
    //insert them into table
    $sql="INSERT INTO review(uid,time,comment,rating,product_id)
    VALUE ($uid,?,?,$review,$product_id);";
    //prepared statement for string error
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss",$time,$comment);
    $stmt->execute();

    header("Location: ../product.php?success&user=$uid&id=$product_id");
}
