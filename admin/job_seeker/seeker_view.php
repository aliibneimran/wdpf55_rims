<?php
    include ("../connect/database.php"); 
    $id= $_GET['id' ];
    $sql= "SELECT js_cv FROM  job_seeker  WHERE  js_id = 1";
    
    $result = $db->query($sql);
    
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $cv = $row["js_cv"];
        echo $cv;
    } else {
        echo "File not found";
    }
    // $result= mysqli_query($db ,  $sql);
    // $fetch= mysqli_fetch_assoc($result) ;
    // $cv = $row["js_cv"];
    // echo $cv;
    // print_r(json_encode($fetch));
?>

