<?php
 include ("../connect/database.php"); 
 extract($_POST);

$sql=  "INSERT  INTO employee VALUE (NULL,'$name','$position','$phone','$email','$address','$c_id')" ; 

if(mysqli_query($db , $sql)){
    $response = [
        'status'=>'ok',
        'success'=>true,
        'message'=>'Record created succesfully!'
    ];
    print_r(json_encode($response));
}else{
    $response = [
        'status'=>'ok',
        'success'=>false,
        'message'=>'Record created failed!'
    ];
    print_r(json_encode($response));
} 
?> 