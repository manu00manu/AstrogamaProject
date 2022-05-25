<?php include('inc/header.php'); ?>
<?php include('../connection.php'); 



$sender_id =  $_REQUEST['sender_id']; 

$sql_friend_request = "SELECT * FROM friend_request where sender_id = '$sender_id'";
$result_register = mysqli_query($conn, $sql_friend_request);  

$row_register = mysqli_fetch_assoc($result_register); 

$name =  $row_register['name'];
$email =  $row_register['email'];


$sql_profile = "SELECT * FROM users where user_id = '$user_id'";
$result_profile = mysqli_query($conn, $sql_profile);  

    $row_profile = mysqli_fetch_assoc($result_profile); 
  $gender_id =   $row_profile['gender'];
  $dateOfBirth =   $row_profile['dob'];
  $profile_pic =   $row_profile['profile_pic']; 

?>
<div class="row">
<div class="col-4">
<div class="row mt-5">
<div class="col-12 text-center pb-3">
<img src="images/<?php echo $profile_pic; ?>" alt="" height=200 width=200>
</div>
 
<div class="col-6">
Name:
</div>
<div class="col-6">
<?php echo $name; ?>
</div>
<div class="col-6">
gender:
</div>
<div class="col-6">
<?php echo $gender_id; ?>

</div>
<div class="col-6">
Dob:
</div>
<div class="col-6">
<?php echo $dateOfBirth; ?>

</div>
<div class="col-12 pt-2">
<?php
   $sendFrom= $_SESSION["user_id"]; 
$sql_CheckReq = "SELECT * FROM requests where sendingfrom = '$sendFrom' and sendingto = '$id' and accepted='0'";

$result_CheckReq = mysqli_query($conn, $sql_CheckReq);   
if (mysqli_num_rows($result_CheckReq) > 0) {
  echo "Request Already Sent";
}else{
  if(  $sendFrom == $id){

  }else{

  ?>

<button class='btn btn-primary' id='sendReq' onclick='sendAction(1,"<?php echo $id ?>")'>Send Friend Request</button>

<?php
}
} 
?>



</div>
</div>

</div>
<div class="col-8">

</div>
</div>
 
<script>
function sendAction(constant,id){
   $.post(`handler/action.php?action=sendReq&id=${id}`,function(res){
      
       if(res=='Request send, saved into DB'){
$('#sendReq').hide()
$('#sendReq').parent().html('Request Send Successfully')
       }
   })
}
</script>
 

<?php include('inc/footer.php') ?>