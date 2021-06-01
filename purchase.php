<!DOCTYPE html>
<html>

<head>
        <title>Purchase</title>
        <link rel="icon" href="imges/title.svg" type="image/icon type">

        <link rel="stylesheet" type="text/css" href="css_stuffs/style_purchase.css">
</head>
<h1></h1>

<body>
        <?php
                require 'php_stuffs/database_connection.php';

                //get variables from product page get method 
                $product_id=$_GET['product_id'];
                $user_id=$_GET['userid'];
                $count=$_GET['count'];
                 date_default_timezone_set('Asia/Dhaka');//date default set
                 $time = date('Y/m/d',time());

                 //get all info from product table
                $sql="SELECT *
                FROM products
                WHERE product_id=$product_id";

                $result = $conn->query($sql) or die($conn->error);
                $row = mysqli_fetch_assoc($result);
        ?>
        <div class="t">
                <h1></h1>
        </div>

        <div class="bdy">
                <table>

                        <tr>
                                <td>
                                        <div class="c"><!--showing info of product in left side-->
                                                <img src="imges/<?php echo $row['img_name']; ?>" alt="Pic Of Product" class="image"
                                                        style="height: 400px;width: 300px;">
                                                <div class="overlay">
                                                        <div class="text">
                                                                <ul style="list-style: none; padding:4px;">
                                                                        <li>
                                                                        <h2><?php echo $row['product_name']; ?></h2>
                                                                        </li>
                                                                        <li>BDT <?php echo $row['price']; ?></li>
                                                                        <li style="font-size: 10px;"><?php echo $row['short_title']; ?></li>
                                                                </ul>
                                                        </div>
                                                </div>
                                        </div>
                                </td>
                                <td>
                                        <div class="container"><!-- form for user, to get his address and phone number -->


                                                <form action="php_stuffs/purchase.inside.php" method="POST">

                                                        <!--date and quantity are fixed from product page -->
                                                        <label for="date"><b>Date</b></label>
                                                        <input style="border: none;" type="text" placeholder="yyyy-mm-dd" value="<?php echo $time ?>" name="date" readonly>
                                                        <label for="count"><b>Quantity</b></label>
                                                        <input  style="border: none;" type="number" placeholder="Price" value="<?php echo $count; ?>" name="count" readonly>

                                                        <label for="address"><b>Address</b></label>
                                                        <input type="text" placeholder="Enter Address" name="address" required>

                                                        <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                                                        <input type="hidden" name="uid" value="<?php echo $user_id; ?>">
                                                        <input type="hidden" name="product" value="<?php echo $product_id; ?>">
                                                        
                                                        <label for="phn"><b>Phone No.</b></label>
                                                        <input type="text" placeholder="+880" name="phone" required>

                                                        <button type="submit" name="purchase_submit">Purchase</button>
                                                        <a href="home.php" name="cancel">Cancel</a>
                                                </form>
                                        </div>
                                </td>

                        </tr>
                </table>
                <div>
</body>

</html>