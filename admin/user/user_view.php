<?php
    include ("../connect/database.php"); 
    $id= $_GET['id' ];
    $sql= "SELECT *  FROM admin_user  WHERE  user_id = '$id'";
    $result= mysqli_query($db ,  $sql);
    $fetch= mysqli_fetch_assoc($result) ;
    print_r(json_encode($fetch));
?>