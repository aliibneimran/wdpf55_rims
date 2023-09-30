<?php
 include ("../connect/database.php"); 
 extract($_POST);
 $pass = sha1($password);

$sql=  "INSERT  INTO admin_user VALUE (NULL,'$name','$role','$email','$pass','$status')" ; 

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