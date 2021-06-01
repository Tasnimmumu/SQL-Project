<?php
require 'database_connection.php';

if(isset($_POST['purchase_submit'])){
    //take all the variables sent by POST meyhod
    $date = $_POST['date'];
    $count = $_POST['count'];
    $address = $_POST['address'];
    $price = $_POST['price'];
    $uid = $_POST['uid'];
    $phone = $_POST['phone'];
    $product_id = $_POST['product'];

    //update count of products and insert details into purchase table
    $sql="UPDATE products
    SET count = count-$count
    WHERE product_id = $product_id";

    $sql2="INSERT INTO purchase(product_id,uid,date,price,address,phone_number)
    VALUE($product_id,$uid,'$date',$price,'$address',$phone);";

    $conn->query($sql2) or die($conn->error);
    $conn->query($sql) or die($conn->error);

    //show these messeges when done
    echo '<h1 style="color:indigo;
                    text-align:center;
                    font-family: sans-serif
                    margin-top:100px">
                    Thanks for your purchase</h1>';

    echo '<h3 style="color:indigo;
        text-align:center;
        font-family: sans-serif">
    You will receive your product as soon as possible. </h3>';

    echo '<h6 style="color:indigo;
        text-align:center;
        font-family: sans-serif">
    This page will be redirected in 5 seconds. </h6>';

    header( "refresh:5; url= ../home.php" );//redirect after 5 seconds
}
else {
    echo 'Not Found';
}