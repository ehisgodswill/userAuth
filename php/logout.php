<?php
function logout(){
    /*
Check if the existing user has a session
if it does
destroy the session and redirect to login page
*/
    session_start();
    // print_r($_SESSION) ;
    if ($_SESSION['username']) {
        session_abort;
        session_destroy;
    }
    header("Location:../forms/login.html", true, 302);
}
logout();
// echo "HANDLE THIS PAGE";
