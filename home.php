

<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_stuffs/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css_stuffs/slideshow.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" type="text/css" href="css_stuffs/footer_Part.css">

    <title> DBZ BD </title>
    <link rel="icon" href="imges/title.svg" type="image/icon type">

<!--Title Start-->
   
    <style>

        body {
            margin: 0;
            padding: 0;
            background: rgb(248, 248, 248);

        }
        
        .nav-item{
            color: rgb(253, 253, 253) !important;
        }

        h1 {
            font-size: 2.1rem;
            line-height: 1.4;
            letter-spacing: 5pt;
            text-align: center;
            color: rgba(250, 250, 250, 0.884);
            margin-left: 1px;
        }
       

        nav a:hover {
            background: rgb(54, 54, 107);
            color: rgb(245, 245, 250) !important;
            transition: 0.10s;
            text-transform: uppercase;

        }
    </style>

    <!--Title End-->




</head>

<body>
    <h1 style=" color: rgb(2, 2, 27); background-color: rgb(241, 241, 241); margin: 0;"> <strong>DBZ's collection</strong> </h1>

<!-- navbar start-->
    <nav class="navbar navbar-expand-lg navbar-light back">
        <a class="navbar-brand" href="#"><img width="200px;" src="imges/Logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div  class="navbar-nav ml-auto">
                <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active" href="#product">Product <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active" href="#about">About <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active" href="#support">Support <span class="sr-only">(current)</span></a>
             <?php
            if(isset($_SESSION['userid'])){
                if($_SESSION['userid']== 5){//run this for admin only, admin id is 5. link to admin page
                    echo '<form class="logout" action="php_stuffs/logout.inside.php" method="post">
                     <button class="btn btn-primary" type="submit" name="logout-submit">Logout</button>
                     <a href="admin.php?legit" class="btn btn-secondary">Admin</a>
                    </form>';

                } else {//run this for other users, logout button
                echo '<form class="logout" action="php_stuffs/logout.inside.php" method="post">
                     <button class="btn btn-primary" type="submit" name="logout-submit">Logout</button>
                    </form>';}
            } else {
                echo '  <a class="nav-item nav-link" href="sign.php">Log In</a>
                ';
            }
            ?>

            </div>
        </div>
    </nav>
<!--navbar end -->

<div class="slideshow-container"><!-- slideshow with javascript -->

    <div class="slider easein">
      <img src="imges/slide1.jpg"  style="width:100%; height: 90vh;">
    </div>
  
    <div class="slider easein">
      <img src="imges/slide2.jpg" style="width:100%;">
    </div>
  
    <div class="slider easein">
      <img src="imges/slide3.jpg" style="width:100%;">
    </div>

    <div class="slider easein">
      <img src="imges/slide4.jpg" style="width:100%;">
    </div>
  
    
  
 
            <!--about hero section -->
    <section class="hero" style="margin:80px 2px 130px 2px ;">

        <div class="container-fluid" id="about">
            <div class="row">
                <div class="col-lg-4">
                    <img class="img-fluid" src="imges/Untitled1.svg" alt="">
                </div>
                <div class="col-lg-8">

                    <h2> <b>DBZ Information</b></h2>
                    <p>
                        <article> DBZ is a Chinese Mobile company. Until few years back it dominated the mobile phone market in the world and had a type of monopoly. 
                        But things have changed now. Because of lack of R&D and proper marketing and trends, the Brand has lost its position and market share.
                        Manufacturers mobile phone devices for its own Brand as well as for other other Electronic Companies in the World. 
                        Currently, over 80% of the world’s top 50 telecom companies work with DBZ.Popular DBZ Mobile Phone and Smartphone Models are – DBZ P30 Pro, DBZ Mate 20 Pro, DBZ P30, 
                        DBZ P20 Pro, DBZ P20, DBZ Mate 20, DBZ Mate 20 X, DBZ Mate 10 Pro, DBZ Mate 20 Lite, DBZ P Smart (2019).
                        Currently the Company Holds 3Rd Ranking in Top 10 Best Mobile Phone Brands in the World with 8.57% Global Market Share (as in 2019).</article>
                    </p>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <h2><b>What are the benefits</b></h2>
                    <p>
                        All data is linked within the context of a person - and that data can lead to other valuable sources
                        You can individually brand yourself/research
                        Links can help your search engine rankings rise quickly.
                        Getting funding (linking research to grants).
                        Opening research to the world (imagine having your citations displayed on your affiliate society pages and beyond).
                        Finding collaborators (simplifies the process of identifying experts in a field and reaching out to them).
                        Being "found" by potential collaborators.
                        DBZ can help junior faculty and trainees identify mentors.
                        Find campus events and take advantage of local opportunities.
                        Highlight teaching expertise/responsibilities. Teaching is often a thankless job on campus.
                        Keep current on research in my department, on my campus.
                        Find core research facilities and people with expertise within the cores.
                        Track collaborators.
                        Track competitors.
                        Find support services on campus - library liaison, support personnel within administrative groups, etc.
                        Highlight a changed research direction. Publications often lag ~2 years behind what's actually being done in the lab (Research_Objective statement is a vehicle for this).
                        DBZ's ontology makes information easily findable.Search across variety of disciplines.
                        You can Promote your work.
                        Maintain your resume/CV - not yet
                        Put together review panels/committees
                        Find collaborators on projects/grants
                        View personal visualizations on co-author networks and grant funding.
                        Open source, community-developed tool
                        Create public/private groups
                        Connect with colleagues
                        Display course information
                        Share research
                        Highlight upcoming talks or presentations that you are giving.
                        Get statistics on published papers. 
                    </p>
                </div>
                <div class="col-lg-5">
                    <img class="img-fluid" src="imges/Untitled2.svg" alt="">
                </div>
            </div>
        </div>
        <hr>


<div class="container" id="product">
    
<?php
        if(!isset($_SESSION['userid'])){// show this if no one has logged in
                echo '<p style="text-align:center; margin:20px;">You need to log in first to make any purchase</p>';
            }
            ?>
            <div class="row">




<?php
// showing all items in display table
require 'php_stuffs/database_connection.php';

$sql = "SELECT * 
                FROM display;";
$sql2="SELECT price,product_name,products.product_id
FROM products 
LEFT JOIN display ON products.product_id=display.product_id;";

        $result = $conn->query($sql) or die($conn->error);
        $result2= $conn->query($sql2) or die($conn->error);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $row2=mysqli_fetch_assoc($result2)
            ?>
        
                <div class="col">
                    <div class="card" style="width: 20rem;">
                       <?php echo' <img class="card-img-top" src="data:image/jpg;base64,'.base64_encode($row['image']).'" alt="Card image cap"> '?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row2['product_name']?></h5>
                            <h6 style="color: red;" class="sub-title"><b><?php echo $row2['price']?></b></h6>
                            <p class="card-text"><?php echo $row['description']?></p>
                            <?php
                            if(isset($_SESSION['userid'])){ ?>
                            <a href="Product.php?<?php echo 'id='.$row2['product_id'].'&user='.$_SESSION['userid']; ?>" class="btn btn-primary">Purchase</a> <?php }
                            else echo'<a href="sign.php" class="btn btn-secondary">Log In</a>';
                            ?>
                        </div>
                    </div>
                </div>
            
        <?php
        }
    } else {
        echo"empty database";
    }
?>
</div>
        </div>

        
<!--footer Start-->
        <footer id="support" class="footer">
            <div class="con">
                <div class="row">
                    <div class="footer-col">
                        <h4>Company</h4>
                        <ul>
                            <li><a href="#">about us</a></li>
                            <li><a href="#">our services</a></li>
                            <li><a href="#">privacy policy</a></li>
                            <li><a href="#">affiliate program</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Get help</h4>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">shipping</a></li>
                            <li><a href="#">returns</a></li>
                            <li><a href="#">order status</a></li>
                            <li><a href="#">payment options</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Online Shop</h4>
                        <ul>
                            <li><a href="#">Y-series mobile</a></li>
                            <li><a href="#">X-Pro series mobile</a></li>
                            <li><a href="#">V-series mobile</a></li>
                            <li><a href="#">G20-series mobile</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Follow us</h4>
                        <div class="social-links">

                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>

                        </div>

                         
                    </div>
                </div>
            </div>
        </footer>

            
       
       <!--footer End-->

      

        </div>
    </section>




   <script src="JavaScript_stuffs/slider.js"></script>
</body>