<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <link rel="icon" href="imges/title.svg" type="image/icon type">

    <script src="JavaScript_stuffs/jquery.min.js"></script>
    <style>
    <?php include "css_stuffs/admin.css" ?>
    </style>
    <script src="JavaScript_stuffs/admin.js"></script>
</head>

<body>
    <?php 
    if(isset($_GET['legit'])){
        
    } else{
        header("Location: home.php");
    }
    
    ?>
    <div class="container">

        <div class="functions"> <!-- each button performes different javascript function, see javascript file  -->
            <button id="Mybtn">Add New Model</button>
            <button id="Mybtn2">Add Phone Stocks</button>
            <button id="Mybtn3">Purchase History</button>
            <button id="Mybtn4">User Panel Info</button>
            <button id="Mybtn5">Total Sell</button>
            <a href="home.php" id="Mybtn6">Back To Home</a>
        </div>
<?php
        
        if(isset($_GET['update'])){
                  //if the update button is pressed this variables will be declared
           $update = $_GET['update'];
           $name=$_GET['name'];
           $id=$_GET['id'];
           } else {$update=false;$id=null;} //else they will be null

          
           require 'php_stuffs/database_connection.php';

           $sql = "SELECT * 
               FROM products;";
           $result = $conn->query($sql) or die($conn->error);// selecting everything from products table , will display in webpage later
            
        if($update){//if the update button is pressed a new form will show up (won't show up until update=true)
                echo'<form style="margin:0 auto; margin-top:10rem;" action="php_stuffs/admin.inside.php" method="post">
                <input type="hidden" name="id" value = "'.$id.'">
                <div class="form-group">
                <label>Product Name: '.$name.' </label>
                </div>
                <div class="form-group">
                    <label>New Price: </label>
                    <input type="text" name="price" placeholder="New price for product">
                </div>
                <div class="form-group">
                    <label>Update Stock: </label>
                    <input type="text" name="stock" placeholder="New stock for product">
                </div>
                
               <button type="submit" name="update">UPDATE</button>
               <button type="submit" name="cancel">CANCEL</button>
                
                </form>
                ';}
                else{
                    echo' <div id="heading">
                    <h1>Welcome Admin</h1>';// by default show this
                
                if(isset($_GET['success'])){  
                    echo '<p style="font-size:14px;font-weight:bold; color: green;"> Database updated </p>';   //show a messege if successfull
            } elseif(isset($_GET['success2'])){
                echo '<p style="font-size:14px;font-weight:bold; color: #22ff05;"> Product Deleted</p>';   

            }
            echo '</div> ';
                }
            ?>
           
                  

       

        <div class="form"><!-- form to take input for product and display products-->
            <form id="MyForm" action="php_stuffs/upload.inside.php" method="post" enctype="multipart/form-data">
                <input type="text" placeholder="Short Title" name="stitle" />
                <input type="text" placeholder="Product Name" name="pname" />
                <input type="text" placeholder="Ram" name="ram" />
                <input type="text" placeholder="Rom" name="rom" />
                <input type="text" placeholder="Camera" name="camera" />
                <input type="text" placeholder="Battery" name="battery" />
                <input type="text" placeholder="Cpu" name="cpu" />
                <input type="text" placeholder="Price" name="price" />
                <input type="text" placeholder="Stock" name="stock" />

                <textarea rows="5" cols="60" placeholder="Description" name="des"></textarea><br>
                <label style="display:block;">Select image to upload into Products:</label>
                <input type="file" name="productupload" id="productupload">
                <label style="display:block;" >Select image to upload into Display:</label>
                <input type="file" name="displayupload" id="displayupload">

                <input type="submit" value="Upload" name="submit">

            </form>
           




            <div id="MyForm2" ><!-- div to display existing products details -->
               
            <div class="flex-con">
            <?php
            if(mysqli_num_rows($result) > 0){
             while($row = mysqli_fetch_assoc($result)){
                ?>

                <div>
                <label >Name: <?php echo $row['product_name']; ?><br></label>
                <label >Stock: <?php echo $row['count']; ?> <br></label>
                <label >Price: <?php echo $row['price']; ?> <br></label>
                <hr>
                <a style="color:white; background-color:blue; border-radius:3px; " href="php_stuffs/admin.inside.php?edit=<?php echo $row['product_id'];?>"> edit</a>
                <a style="color:white; background-color:red; border-radius:3px; " href="php_stuffs/admin.inside.php?delete=<?php echo $row['product_id'];?>"> Delete</a>
       
                </div>
                <?php 
                }
                } else {
                 echo"empty database";
                     }
                     ?>
               
             </div>
           </div>

                 



           <div id="MyForm3"><!-- purchase details -->
                <ol>
                <?php  
                         $sql1 = "SELECT * 
                         FROM purchase;";

                         $sql2 = "SELECT user_name
                         FROM user_info
                         NATURAL JOIN purchase;";

                         $result2 = $conn->query($sql2) or die($conn->error);
                        $result1 = $conn->query($sql1) or die($conn->error);
                        // showing user name and purchase history
                        if((mysqli_num_rows($result1) > 0) && (mysqli_num_rows($result2) > 0)){
                            while(($row1 = mysqli_fetch_assoc($result1))&&($row2 = mysqli_fetch_assoc($result2))){
                     ?>
                <li>
                    <h4><?php echo $row2['user_name']; ?></h4>
                 <p>Purchase Date: <?php echo $row1['date']; ?></p>
                 <p>Price: <?php echo $row1['price']; ?></p>
                  <p>Delivery Address: <?php echo $row1['address']; ?></p>
                  <p>Phone Number: <?php echo $row1['phone_number']; ?></p>
                </li>
              <?php }
                } else {
                 echo"empty database";
                     } ?>
                </ol>
            </div>





                <div id="MyForm4"><!-- showing existing users-->
                
                    <ul>
                      <?php  
                         $sql3 = "SELECT * 
                         FROM user_info;";

                         $result3 = $conn->query($sql3) or die($conn->error);

                        if((mysqli_num_rows($result3) > 0)){
                            while(($row3 = mysqli_fetch_assoc($result3))){
                                if($row3['user_name'] == 'Admin'){
                                    ?>
                                    <h4 style="color: red;"> <?php echo $row3['user_name'] ?> </h4>
                                    <p  style="color: red;">EMAIL: <?php echo $row3['email'] ?> </p>
                                <?php }
                                else{
                       ?>
                     <li>
                            <h4> <?php echo $row3['user_name'] ?> </h4>
                            <p>EMAIL: <?php echo $row3['email'] ?> </p>

                     </li>
                     <?php }}
                } else {
                 echo"empty database";
                     } ?>
                    </ul>
                
                </div>
            





                     <div id="MyForm5"><!-- total sell and reviews -->
                     <?php  
                        $sql4="SELECT ROUND(AVG(price),2) AS 'Avg', SUM(price) AS 'Total',COUNT(*) AS 'Count'
                        FROM purchase;";
                        $sql5="SELECT * FROM review;";

                        $result4 = $conn->query($sql4) or die($conn->error);
                        $result5 = $conn->query($sql5) or die($conn->error);
                       
                        $row4 = mysqli_fetch_assoc($result4);
                     ?>
                     <div class="chunk">
                     <h4>Overall Sell</h4>
                     <p><?php echo $row4['Total']; ?></p>
                     </div>

                     <div class="chunk">
                     <h4>Average Sell</h4>
                     <p><?php echo $row4['Avg']; ?></p>
                     </div>

                     <div class="chunk">
                     <h4>Total products Sold</h4>
                     <p><?php echo $row4['Count']; ?></p>
                     </div>

                     <div class="review">
                     <h4 style="margin-right:6px ;">All Reviews</h4>
                     <?php 
                        if((mysqli_num_rows($result5) > 0)){
                            while(($row5 = mysqli_fetch_assoc($result5))){
                     ?>
                     <span>
                            <h5>Product ID: <?php echo $row5['product_id']; ?> ---- Rating: <?php echo $row5['rating']; ?></h5>
                         <?php echo $row5['comment']; ?>

                            
                     </span>
                                <?php }} ?>
                                </div>
                     </div>
        </div>
    </div>
    
</body>

</html>