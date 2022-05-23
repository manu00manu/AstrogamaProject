<?php
   include "backend/database/database.php";

   $conn=databaseconn();
   session_start();

   $username =$_POST["username"];
   $email=$_POST["email"];
   $password=$_POST["password"];
   $gender=$_POST["gender"]
   $birthdate=$_POST["dateOfBirth"];

   $sqlInsert = "INSERT * INTO 'USER' ('username' , 'email', 'password', 'gender', 'dateOfBirth') VALUES ('$username' , '$email', '$password', '$gender', '$birthdate'')" ;
   $sqlQuery = "SELECT * FROM 'User' WHERE 'Email' ='$email' AND 'password' ='$password';";

   $result =my_sqli_query($conn , $sqlQuery );

   $returnedRow = $queryResult -> fetch_all(MYSQLI_ASSOC);
   $creatingUser ="returnedRow[0]";


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
    <?php
      if($reuslt = false){
          echo"ACCOUNT  CREATED FAILED";
          header("location : zodiaccalculator.html");
      }

      else{
          echo "ACCOUNT SUCCESFULLY CREATED";
          $_SESSION["creatinguser"]=$creatingUser;
          header("location :result.html")
      }

?>
</body>
</html>