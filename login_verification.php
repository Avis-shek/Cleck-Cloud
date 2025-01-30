<?php
include('session.php');
include('connection.php');
include('functions.php');

if(isset($_POST['login']))
{
    
    if(!empty($_POST['username'])  && !empty($_POST['password']))
    {
        $username =strtolower($_POST['username']);
        $cleck_password =$_POST['password'];
        $password = md5($cleck_password);
        
        login_verification($connection,$username,$password);
    }
        else
        {
            $_SESSION["feild_empty_message"] = "Provide your username and password."; 
            header("location: login.php");
        }
}
    
?>