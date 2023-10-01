<?php
    include ("../connect/database.php"); 
    $sql= "SELECT *  FROM  job_seeker" ; 
    $result = mysqli_query($db ,  $sql); 
    $data = [];
    //$sn = 1;
    while ($fetch=mysqli_fetch_assoc($result)){
        $_SESSION["cv"]= $fetch["js_cv"];
        $data[] = $fetch;
        // $sn++;
    }
    
    print_r(json_encode($data));
?> 