<?php
    include ("../connect/database.php"); 
    $id= $_GET['id' ];
    $sql= "SELECT *  FROM  job_seeker  WHERE  js_id = '$id'";
    
    // $result = $db->query("SELECT * FROM job_seeker");
    // $row = $result->fetch_assoc(); 
    $result= mysqli_query($db ,  $sql);
    $fetch= mysqli_fetch_assoc($result) ;
    print_r(json_encode($fetch));
?>