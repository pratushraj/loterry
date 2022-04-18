<?php
session_start();
include 'conn.php';
if(!isset($_SESSION['USER_ROLE'])) {
    header("Location: login.php");
  }


  $sql_update = "UPDATE dealer SET `name` = '".$_POST['nam']."', `c_name` = '".$_POST['com']."', `phone` = ".$_POST['phone'].", `address` =  '".$_POST['add']."', `incentive` = ".$_POST['inc'].", `pass` = '".$_POST['pas'].", `mor` = '".$_POST['mor'].", `day` = '".$_POST['day']."', `eve` = '".$_POST['eve']."' WHERE id = '".$_POST['_id']."'";
 echo $sql_update;
  $fetch = mysqli_query($conn, $sql_update);
    $row = mysqli_fetch_array($fetch);
    echo json_encode($row);