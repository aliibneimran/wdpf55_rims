<?php
include ("../connect/database.php"); 
$id =$_GET['id' ];  
$sql= "DELETE FROM  company WHERE c_id  =  '$id' " ; 

if(mysqli_query($db , $sql)){
    $response = [
        'status'=>'ok',
        'success'=>true,
        'message'=>'Record deleted succesfully!'
    ];
    print_r(json_encode($response));
}else{
    $response = [
        'status'=>'ok',
        'success'=>false,
        'message'=>'Record deleted failed!'
    ];
    print_r(json_encode($response));
} 
?> 