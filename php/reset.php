<?php
if(isset($_POST['submit'])){
    $email = $_POST['email']; //complete this;
    $password = $_POST['password']; //complete this;

    resetPassword($email, $password);
}

function resetPassword($email, $password){
    //open file and check if the username exist inside
    //if it does, replace the password
    $handle = fopen('../storage/users.csv', 'r');
    $arr = [];
    $match = false;
    while(!feof($handle)){
        $data = fgetcsv($handle);
        if (trim($data[1]) == $email) {
            $data[2] = $password;
            $arr[] = $data;
            $match = true;
        }else {
            $arr[] = $data;
        }
    }
    fclose($handle);
    
    $handle = fopen('../storage/users.csv', 'w');
    foreach ($arr as $key => $value) {
        if ($value) {
            # code...
            fputcsv($handle,array_values($value));
        }
    }
    fclose($handle);
    if (!$match) {
        print_r('User does not exist');
    } else {
        print_r('Reset password succesful');
        // header('Location:../forms/login.html');
    }
    
}
// echo "HANDLE THIS PAGE";
// print_r(file('../storage/users.csv'));


