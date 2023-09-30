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

    $sql= "UPDATE employee  SET  employee_name = '$name', employee_position = '$position', employee_phone = '$phone' , employee_email = '$email',employee_address = '$address',company_id = '$c_id' WHERE employee_id ='$e_id'" ;


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