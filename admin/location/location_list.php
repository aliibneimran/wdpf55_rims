<?php
    include ("../connect/database.php"); 
    $sql= "SELECT *  FROM division" ; 
    $result = mysqli_query($db ,  $sql); 
    $data = [];
    //$sn = 1;
    while ($fetch=mysqli_fetch_assoc($result)){
        $data[] = $fetch;
        // $sn++;
    }
    
    print_r(json_encode($data));
?> 