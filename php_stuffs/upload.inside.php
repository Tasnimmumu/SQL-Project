
<?php


require 'database_connection.php';

$target_dir = "../imges/"; //the directory where you will keep your image
$target_file1 = $target_dir . basename($_FILES["productupload"]["name"]);
$target_file2 = $target_dir . basename($_FILES["displayupload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));//takes the extentions
$imageFileType1 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
$file1 = pathinfo($_FILES['productupload']['name'], PATHINFO_FILENAME);//I used this to take the files names
$file2 = pathinfo($_FILES['displayupload']['name'], PATHINFO_FILENAME);
$filename = "$file1.$imageFileType";//complete name.extension file
$filename1="$file2.$imageFileType1";

//BLOB display
$image = addslashes(file_get_contents($_FILES['displayupload']['tmp_name']));

$stitle = $_POST['stitle'];
$pname = $_POST['pname'];
$ram = $_POST['ram'];
$rom = $_POST['rom'];
$camera = $_POST['camera'];
$battery = $_POST['battery'];
$battery = $_POST['battery'];
$cpu = $_POST['cpu'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$des = $_POST['des'];
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
 $check1 = getimagesize($_FILES["productupload"]["tmp_name"]);
 
  if($check1 !== false ) {
    //echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
   
  } else {
   echo "File is not an image.";
   $uploadOk = 0;
 }
}


// Check if file already exists
if (file_exists($target_file1)) {
  echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    //if statement uploades both images
    if (move_uploaded_file($_FILES["productupload"]["tmp_name"], $target_file1)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["productupload"]["name"])). " has been uploaded.";

        //upload all the values into the product table
        $sql1="INSERT INTO products(short_title,product_name,ram,rom,camera,battery,cpu,price,img_name,count)
        VALUES('$stitle','$pname','$ram','$rom','$camera','$battery','$cpu','$price','$filename','$stock');";
       $conn->query($sql1) or die($conn->error);

        //Get the new product id from the product table
        $sql3="SELECT product_id 
        FROM products
        WHERE product_name='$pname'";
       $result= $conn->query($sql3) or die($conn->error);
       $row = mysqli_fetch_assoc($result);
        $id=$row['product_id']; //keep the product id into this id variable

        //update the new item into display table
        $sql2="INSERT INTO display(product_id,description,image)
        VALUES( $id,'$des','$image')";
        $conn->query($sql2) or die($conn->error);

        header("Location: ../admin.php?legit&success");//everythings done then return to admin page
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }