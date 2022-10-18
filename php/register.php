<?php
if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

registerUser($username, $email, $password);

}

function registerUser($username, $email, $password){
    //save data into the file
    $filename = '../storage/users.csv';
    $handle = fopen($filename,'a+');
    $result = fputcsv($handle, [$username,$email,$password]);
    fclose($handle);
    if ($result>0) {
        echo 'User Successfully registered';
    } else {
        # code...
    };
    
    // echo "OKAY";
}
// echo "HANDLE THIS PAGE";


?>