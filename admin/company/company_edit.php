<?php
    include ("../connect/database.php"); 
    // extract($_POST);
    $name= $_POST['name'];
    $type= $_POST['type'];
    $phone= $_POST['phone'];
    $email= $_POST['email'];
    $address= $_POST['address'];
    
    $id= $_POST['cp_id' ];

    $sql= "UPDATE company  SET  company_name = '$name', company_type = '$type', company_phone = '$phone' , company_email = '$email',company_address = '$address' WHERE company_id ='$id'" ;


    if(mysqli_query($db , $sql)){
        $response = [
            'status'=>'ok',
            'success'=>true,
            'message'=>'Record updated succesfully!'
        ];
        print_r(json_encode($response));
    }else{
        $response = [
            'status'=>'ok',
            'success'=>false,
            'message'=>'Record updated failed!'
        ];
        print_r(json_encode($response));
    } 
?>