<?php
require 'database_connection.php';
$update=false;
$id =0;
if (isset($_GET['edit'])){
   //if press edit button take the product name from products table and make update variable= true
    $id=$_GET['edit'];
    $sql="SELECT product_name
    FROM products
    WHERE product_id=$id;";
    $result=$conn->query($sql) or die($conn->error);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $name = $row['product_name'];
        $update = true;
        header("Location: ../admin.php?legit&update=$update&id=$id&name=$name");}
    }

else if(isset($_POST['update'])){
    //update the products table with new data
    $id = $_POST['id'];
    $newprice= $_POST['price'];
    $newstock= $_POST['stock'];

    $sql ="UPDATE products
    SET price = $newprice, count = $newstock
    WHERE product_id=$id;";

    $r8esult=$conn->query($sql) or die($conn->error());
    header("Location: ../admin.php?legit&success");

}
else if(isset($_POST['cancel'])){
    //go back to admin page
    header ("Location: ../admin.php?legit");
}

else if(isset($_GET['delete'])){
    //run the delete SQL in display and products table
    $id=$_GET['delete'];
    $sql2="DELETE FROM display
    WHERE product_id=$id;";
    $conn->query($sql2) or die($conn->error());

    $sql1="DELETE FROM products
    WHERE product_id=$id;";
    $conn->query($sql1) or die($conn->error());

    header("Location: ../admin.php?legit&success2");
}

