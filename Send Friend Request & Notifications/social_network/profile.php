<?php include('inc/header.php') ?>
<?php include('../connection.php') ?>
<?php


$user_id = $_SESSION['user_id'];


$sql_displayValues = "SELECT * FROM users where user_id = '$user_id'";
$result_displayValues = mysqli_query($conn, $sql_displayValues);

 $row_displayValues = mysqli_fetch_assoc($result_displayValues);
$username = $row_displayValues['username'];
$gender_id = $row_displayValues['gender_id'];
$dateOfBirth = $row_displayValues['dateOfBirth'];
$horoscope_id = $row_displayValues['horoscope_id']; 
$profile_pic = $row_displayValues['profile_pic']; 

 

$error = '';
$success = '';

if(isset($_REQUEST['submit'])){

    $username_fetched = $_REQUEST['username'];
    $gender_id_fetched = $_REQUEST['gender_id'];
    $dateOfBirth_fetched = $_REQUEST['dateOfBirth'];
    $horoscope_id_fetched = $_REQUEST['horoscope_id'];
    $dateAdded_fetched = date('Y-m-d');

  
    if(!empty($username_fetched ) && !empty($gender_id_fetched) && !empty($dateOfBirth_fetched) && !empty($horoscope_id_fetched)){


        
$sql_check_isavail = "SELECT * FROM users where user_id = '$user_id'";
$result_check_isavail = mysqli_query($conn, $sql_check_isavail);

// var_dump($_FILES['picture']); 
$fileName = $_FILES['profile_pic']['username'];
$tempLocation = $_FILES['profile_pic']['tmp_name'];
$newfileName = rand(9999,1000).date('ymdhis').$fileName;  
move_uploaded_file($tempLocation,'images/'.$newfileName);



if (mysqli_num_rows($result_check_isavail) == 1) {
    // update query
    $sql_update = "UPDATE users SET profile_pic='$newfileName',
     username='$username_fetched', dateOfBirth=' $dateOfBirth_fetched', gender_id='$gender_id_fetched'
      WHERE user_id='$user_id'";

if (mysqli_query($conn, $sql_update)) {
  echo "Record updated successfully";
  
$sql_displayValues = "SELECT * FROM users where user_id = '$user_id'";
$result_displayValues = mysqli_query($conn, $sql_displayValues);

 $row_displayValues = mysqli_fetch_assoc($result_displayValues);
$username = $row_displayValues['username'];
$gender_id = $row_displayValues['gender_id'];
$dateOfBirth = $row_displayValues['dateOfBirth'];
$horoscope_id = $row_displayValues['horoscope_id'];
$profile_pic = $row_displayValues['profile_pic']; 

} else {
  echo "Error updating record: " . mysqli_error($conn);
}

      
}else{


 
    $sql = "INSERT INTO users (profile_pic, user_id, username, gender_id, dateOfBirth, horoscope_id, date_added) 
    VALUES ('$newfileName','$user_id', '$username_fetched', '$gender_id_fetched', '$dateOfBirth_fetched', '$horoscope_id_fetched','$dateAdded_fetched')"; 
              if (mysqli_query($conn, $sql)) {
                  $success  =  "Profile Created";
                  
$sql_displayValues = "SELECT * FROM users where user_id = '$user_id'";
$result_displayValues = mysqli_query($conn, $sql_displayValues);

 $row_displayValues = mysqli_fetch_assoc($result_displayValues);
 $username = $row_displayValues['username'];
 $gender_id = $row_displayValues['gender_id'];
 $dateOfBirth = $row_displayValues['dateOfBirth'];
 $horoscope_id = $row_displayValues['horoscope_id'];
 $profile_pic = $row_displayValues['profile_pic']; 

              } else {
                  $success  =  "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
  

    
}




              


 
    }
    else{
        $error = 'All fields are compulsory';
    }

}


?>




<div class="mt-5">
<h1 class="text-center">Edit Your Profile</h1>

<?php echo $error; ?>
<?php echo $success; ?>

<form action="profile.php" method='post' enctype='multipart/form-data'>
<div class="row">
<div class="col-6">
<div class="form-group">
        <label for="profile_pic">Add Profile Pic:</label>
        <input type="file" class='form-control' name='profile_pic'>
    </div>
</div>
<div class="col-6">
<?php if(isset($profile_pic)) {?>
<img src="<?php echo isset($profile_pic) ? "images/".$profile_pic : '' ?>" alt="" height=300 width=300><br>
<?php } ?>
</div>
</div>

    <div class="form-group">
        <label for="username">Username:</label>
        <textarea  id="" cols="30" rows="3" class='form-control' name='username'><?php echo (isset($username)) ? "$username" : ""?></textarea>
    </div>
    <div class="form-group">
        <label for="gender">Select Gender:</label> 
       <input type="radio" name='gender' value='m' <?php echo (isset($gender_id) && $gender=='m') ? "checked" : ""?>> Male
       <input type="radio" name='gender' value='f' <?php echo (isset($gender_id) && $gender=='f') ? "checked" : ""?>> Female
    </div>
    <div class="form-group">
        <label for="dob">Select DOB:</label> 
       <input type="date" name='dob' class='form-control' value='<?php echo (isset($dateOfBirth)) ? "$dateOfBirth" : ""?>'>
    </div>
     

     
     
 

  <!-- <input type="text" class="form-control" placeholder="Enter email" name="name" value='<?php echo (isset($name)) ? $name: ''  ?>'> -->

  <button type="submit" name='submit' class="btn btn-primary">Submit</button>
</form>

</div>






<?php include('inc/footer.php') ?>