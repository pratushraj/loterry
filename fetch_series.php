<?php
session_start();
include 'conn.php';
if(!isset($_SESSION['USER_ROLE'])) {
    header("Location: login.php");
  }

  $sql_select = "SELECT * FROM `series` WHERE id = '".$_POST['_id']."'";

    $fetch = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($fetch);
    echo json_encode($row);

?>