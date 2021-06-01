<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign Up</title>
  <link rel="icon" href="imges/title.svg" type="image/icon type">

  <link rel="stylesheet" type="text/css" href="css_stuffs/style_reg.css">

</head>
<body>
  <div class="c">
    <div class="a">
        <h2>Registration Form</h2>
    </div>

    <form action="php_stuffs/signup.inside.php" method="post">

      <div class="container">
        <div class="imgcontainer">
          <img src="imges/r.png" alt="" class="avatar" style="width:20%">
        </div>

        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label for="email"><b>E-mail</b></label>
        <input type="text" placeholder="Enter E-mail" name="email" required>

        <label for="pwd"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="pwd" required>
        
        <label for="pwd-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="pwd-repeat" required>

        <?php 
        //Check for urls, give message accordingly
                if(isset($_GET['result'])){
                    if($_GET['result'] == "invalidmail"){
                      echo'<p style="font-size:14px; color:red;" class="error">INVALID E-mail</p>';
                    }
                    else if($_GET['result'] == "invaliduid"){
                        echo'<p style="font-size:14px; color:red;" class="error">INVALID User ID !!</p>';
                    }else if($_GET['result'] == "passwordcheck"){
                        echo'<p style="font-size:14px; color:red;" class="error">Password do not match!!</p>';
                    }else if($_GET['result'] == "usertaken"){
                        echo'<p  style="font-size:14px; color:red;" class="error">User name already taken. Use another one</p>';
                    } else if($_GET['result'] == "successful"){
                      echo'<p  style="font-size:15px; color:green;">Signed up Success</p>';
                      header( "refresh:2; url= home.php" );
                    } else if($_GET['result'] == "unsucessful"){
                      echo'<p  style="font-size:14px; color:red;"> Please try again :(</p>';
                    }
                }

                ?>





        <button type="submit" name="signup-submit">Sign up</button>
        <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
      </div>

      <div class="container" style="background-color:#f1f1f1">
        <a style="text-decoration: none; color:white;" href="sign.php" type="button" class="cancelbtn">Cancel</a>

      </div>
    </form>
  </div>
  
</body>
</html>



