<?php
    include ("../connect/database.php"); 
    $sql= "SELECT *  FROM company" ; 
    $result = mysqli_query($db ,  $sql); 
    $data = [];
    while ($fetch=mysqli_fetch_assoc($result)){
        $data[] = $fetch;
    }
    print_r(json_encode($data));
?> 