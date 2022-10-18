<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];//finish this line
    $password = $_POST['password']; //finish this

loginUser($email, $password);

}

function loginUser($email, $password){
    /*
        Finish this function to check if username and password 
    from file match that which is passed from the form
    */
    $handle = fopen('../storage/users.csv', 'r');
    $login = FALSE;
    while(!feof($handle)){
        $data = fgetcsv($handle);
        if (trim($data[1]) == $email && trim($data[2]) == $password ) {
            session_start();
            $_SESSION['username'] = trim($data[0]);
            $login = TRUE;
        }
    }
    if ($login) {
        header('Location: ../dashboard.php', TRUE, 301);
    } else {
        header("Location: ../forms/login.html", TRUE, 302 );
    }
    fclose($handle);
    exit();
}

// echo "HANDLE THIS PAGE";

