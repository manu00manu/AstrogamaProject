<?php 
    include('Databaseconnection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login and registration form</form> page</title>
   
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="css/login.css">

</head>
<body>

    <div class="page">
      <img src="image_2022_05_03T20_12_21_513Z.png" class="images">
            <div class="container">
                <div class="forms">
                    <div class="form login">
                        <span class="title"><mark class="red">A</mark>STRO<mark class="red">G</mark>AMA
                            <br><span class ="subheader">EXPLORE NOW</span>
                        </span>
        
                        <<form method="post" action="login.php">
                        <?php include('error.php'); ?>
                            

                            <div class="input-field">
                                <input type="text" placeholder="Username" name="username"  required>
                                <i class="uil uil-user"></i>
                            </div>
                            
                            <div class="input-field">
                                <input type="password" class="password" placeholder="Enter your password" name="password" required>
                                <i class="uil uil-lock icon"></i>
                                <i class="uil uil-eye-slash showHidePw"></i>
                            </div>
        
                            <div class="checkbox-text">
                                <div class="checkbox-content">
                                    <input type="checkbox" id="logCheck">
                                    <label for="logCheck" class="text">Remember me</label>
                                </div>
                                
                                <a href="#" class="text">Forgot password?</a>
                            </div>
        
                            <div class="input-field button">
                                <input type="button" value="Login Now" name="login_user">
                            </div>
                        </form>
        
                        <div class="login-signup">
                            <span class="text">Not a member?
                                <a href="register.php" class="text signup-link">Signup now</a>
                            </span>
                        </div>
                    </div>
                </div> 
        
         <script src="script.js"></script>


        
         <div class="footer-links">
            <div class="left">
             <a href="#" id="foot1">
                Help    
             </a>
              <br>
             <a href="#" id="foot2">
                AboutUs
             </a>
            </div>
        </div>

</div>
    
</body>
</html>