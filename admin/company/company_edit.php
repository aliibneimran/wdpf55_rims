<?php
    include ("../connect/database.php"); 
     extract($_POST);
    // $name= $_POST['name'];
    // $type= $_POST['type'];
    // $phone= $_POST['phone'];
    // $email= $_POST['email'];
    // $address= $_POST['address'];
    
    // $id= $_POST['cp_id' ];

    $sql= "UPDATE company  SET  c_name = '$name', c_type = '$type', c_phone = '$phone' , c_email = '$email',c_address = '$address' WHERE c_id ='$get_id'" ;


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