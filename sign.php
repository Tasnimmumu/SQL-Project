<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign Up</title>
  <link rel="icon" href="imges/title.svg" type="image/icon type">

  <link rel="stylesheet" type="text/css" href="css_stuffs/style_sign.css">

</head>
<body>
  <div class="c">
    <div class="a">
        <h2>Login Form</h2>
    </div>

    <form action="php_stuffs/login.inside.php" method="post">
      <div class="imgcontainer">
        <img src="imges/avatar.png" alt="Avatar" class="avatar" style="width:20%">
      </div>

      <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label for="pwd"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="pwd" required>
        <?php 
          if(isset($_GET['result'])){// check the url, give the message accordingly
            if($_GET['result']=='emptyfields'){
              echo '<p style="color:red; font-size:13px;">One or multiple fields are empty</p>';
            }
            else if($_GET['result']=='notfound'){
              echo '<p style="color:red; font-size:13px; font-weight:bold;">User does not exist :(</p>';
            }
            else if($_GET['result']=='wrongpwd'){
              echo '<p style="color:red; font-size:13px; font-weight:bold;">Password does not match! :(</p>';
            }
          }
        ?>
        <button type="submit" name="login-submit">Login</button>
        <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
      </div>

      <div class="container" style="background-color:#f1f1f1">
      <a style="text-decoration: none; color:white;" href="home.php" type="button" class="cancelbtn">Cancel</a>

       <!-- <span class="psw">Forgot <a href="reset.html">password?</a></span>-->
        <p>Don't have an account</p>
        <a href="registration.php">Create a new account</a>
      </div>
    </form>
  </div>
</body>
</html>



