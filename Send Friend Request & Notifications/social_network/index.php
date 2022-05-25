<?php include('inc/header.php'); ?>
<?php include('../connection.php'); 
?>




<?php
echo $_SESSION['member_id'];
echo  $_SESSION['member_email'];
?>

<a href="logout.php">Logout</a>

<?php include('inc/footer.php') ?>