<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_stuffs/bootstrap.min.css">
    <link rel="stylesheet" href="css_stuffs/Product_Page.css">
    <title>Products</title>
    <link rel="icon" href="imges/title.svg" type="image/icon type">

</head>

<body>
    <?php require 'php_stuffs/database_connection.php'; 

        if(isset($_GET['success'])){//show this if review is added to database
            echo '<p style="font-size:10px; color:blue;"> Review Added</p>';
        }
        //get variables from url
        $user_id=$_GET['user'];
        $id=$_GET['id'];

        $sql="SELECT *
        FROM products
        WHERE product_id=$id";

        $sql1="SELECT *
        FROM review
        WHERE product_id=$id";

        $result1= $conn->query($sql1) or die($conn->error);//all reviews
        $result = $conn->query($sql) or die($conn->error);

        $row = mysqli_fetch_assoc($result);//the product

        if(mysqli_num_rows($result) > 0){ //display the product ; where product id matches in table
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-5"><!--left side image -->
                <p class="brand"><b>DBZ Mobile</b> </p>
                <img src="imges/<?php echo $row['img_name']; ?>" alt="" class="img-fluid">
            </div>
            <div class="col-lg-2"></div><!-- blank gap -->
            <div style="border-left: 2px solid gray;" class="col-lg-5 "><!-- product details from product table -->
                <h2> <?php echo $row['product_name']; ?> </h2>
                <h5 style="margin-bottom: 10px;"><?php echo $row['short_title']; ?></h5>
                <a class="link" href="#review">Add Review</a>
                
                <?php 
                    if($row['count']>0){ //checking if product is available , if count is greater than zero product is available 
                        echo' <p style="margin-top: 20px;" class="stock green">Stock: Available</p>';
                    } else {
                        echo ' <p style="margin-top: 20px;" class="stock red">Stock: Unavailable</p>';
                    }
                ?>
                <p style="font-size: 14px;">payment method: Cash on delivery</p>
                <p class="price">BDT <?php echo $row['price']; ?> /-</p>
                <hr>
                <br>
                <div class="row"><!-- showing specifications in product table -->
                    <div class="col-lg-6">
                        <p class="product">CPU </p>
                    </div>
                    <div class="col-lg-6">
                        <p class="product"><?php echo $row['cpu']; ?> </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <p class="product">Ram </p>
                    </div>
                    <div class="col-lg-6">
                        <p class="product"><?php echo $row['ram']; ?> GB</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <p class="product">Rom </p>
                    </div>
                    <div class="col-lg-6">
                        <p class="product"><?php echo $row['rom']; ?> GB</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <p class="product">Camera </p>
                    </div>
                    <div class="col-lg-6">
                        <p class="product"><?php echo $row['camera']; ?> </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <p class="product">Battery </p>
                    </div>
                    <div class="col-lg-6">
                        <p class="product"><?php echo $row['battery']; ?> </p>
                    </div>
                </div>

                <hr>
                <br>

                <div style="text-align: center;"><!-- purchase form, product-id and user-id will be hidden-->
                    <form action="purchase.php" method="get">
                    <p>Quantity <input type="text" name="count" style="width: 40px; border:2px solid indigo;" placeholder="1"
                            required></p>
                            <input type="hidden" name="product_id" value="<?php echo $id;?>">
                            <input type="hidden" name="userid" value="<?php echo $user_id;?>">
                    <input type="submit" value="Add to cart" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid"><!-- review part -->
        <br>
        <h2 class="review">Reviews</h2>
        <?php
            if(mysqli_num_rows($result1) > 0){//display all review for that specific product only
                $sql2="SELECT user_info.user_name
                FROM user_info
                JOIN review ON review.uid=user_info.uid
                WHERE review.product_id=$id";
                $result2= $conn->query($sql2) or die($conn->error);
            while($row1 = mysqli_fetch_assoc($result1)){//loop through the reviews if any
                $row2 = mysqli_fetch_assoc($result2);
        ?>
        <div class="comment">
            <span style="margin-right: 12rem; font-weight: bold;"><?php echo $row2['user_name']; ?></span>
            <span>
                <?php 
                    for($i=0;$i<$row1['rating'];$i++){//show stars based on table row rating
                ?>
                <i class="fi-xnsuxl-star-solid"></i>
                <?php } ?>
            </span>
            <p style="margin-top:10px;">
                <?php echo $row1['comment']; ?>
            </p>
        </div>
        <?php }} ?>
    </div>

    <div style="margin-top:300px; margin-bottom: 200px;" class="container"><!-- adding user review -->
        <h2 id="review">Add Your Review</h2>
        <form action="php_stuffs/review.inside.php" method="post">
            <input type="hidden" name="uid" value="<?php echo $user_id; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input style="width: 80px;" type="text" name="stars" list="star" placeholder="Stars">
            <datalist id="star"><!-- rating options, 1 t0 5 -->
                <option value="1">
                <option value="2">
                <option value="3">
                <option value="4">
                <option value="5">
            </datalist>
            <p for="name">Comment</p><!-- text area for user comment -->
            <textarea rows="5" cols="60" placeholder="Description" name="des"></textarea><br>

            <button class="btn btn-primary" type="submit" name="review_submit">Submit</button>
        </form>
    </div>

    <script defer src="https://friconix.com/cdn/friconix.js"> </script>

   <?php }
    else echo 'NOT FOUND !';
   ?>
</body>

</html>