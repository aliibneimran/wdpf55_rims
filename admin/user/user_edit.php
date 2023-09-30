<?php
    include ("../connect/database.php"); 
     extract($_POST);
    // $name= $_POST['name'];
    // $position= $_POST['position'];
    // $phone= $_POST['phone'];
    // $email= $_POST['email'];
    // $address= $_POST['address'];
    // $c_id= $_POST['c_id' ];

    // $e_id= $_POST['e_id' ];

    $sql= "UPDATE admin_user  SET  name = '$name', role = '$role', email = '$email',password = '$password',status = '$status' WHERE user_id ='$u_id'" ;


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