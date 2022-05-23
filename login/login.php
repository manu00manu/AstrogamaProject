<?php
  include "../backend/database/database.php";
  $conn= databaseconn();
  session_start();
  $email=$_POST["email"];
  $password=$_POST["password"];
  $sqlquery ="SELECT * FROM user WHERE 'Email'='$email' AND 'Password'='$password';";
  

  $result =mysqli_query($conn ,$sqlQuery);
  $num_rows=mysqli_num_rows($result);
  $returnedrow=$result -> fetch_all(MYSQLI_ASSOC);
  $loggeduser =$returnedrow[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
       <?php 
          if($num_rows <1){
            echo "Login failed , please check your password";
            header("Location : login.html");
          }

          else {
            echo "Login Successful. Welcome to Astrogama";
            $_SESSION["isLoggedIn"]=TRUE;
            $_SESSION["loggedUser"]=$loggeduser;
            header("Location:../feedpage/feedpage.html")
          }
          ?>
   </h1>
</body>
</html>
