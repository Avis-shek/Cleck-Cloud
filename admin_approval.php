<?php
include('session.php');
include('connection.php');
if(isset($_GET['approve']))

{
    $approve = $_GET['approve'];
    $token = $_GET['token'] ;
    $foreign_key = $_GET['fk'];

    if($approve == "YES")
    {
        $updatequery = "update cleck_user set active_status ='1' where token ='$token'";
        $stid = oci_parse($connection,$updatequery);
    
    if(oci_execute($stid))
    {
        
            $query = "update shop set status = '1' where fk1_user_id='$foreign_key'";
            $stid = oci_parse($connection,$query);
            if(oci_execute($stid))
            {
              unset( $_SESSION["approved_confirm_message"]); 
              unset($_SESSION['cleck_user_fullname']);  
              unset($_SESSION['cleck_user_gmail'] );  
              unset($_SESSION['cleck_user_password']); 
              unset($_SESSION['cleck-user_contact']); 
              unset($_SESSION['cleck_user_birthday']); 
              unset($_SESSION['cleck_user_role'] ); 
              unset($_SESSION['cleck_active_status']); 
              unset($_SESSION['cleck_username']);  
              unset($_SESSION['cleck_message_toadmin'] ); 
              unset($_SESSION['cleck_shopname']); 
              unset($_SESSION['cleck_location']); 
              unset($_SESSION['registration_no']); 
              unset($_SESSION['status']); 
              unset($_SESSION['cleck_user_id']); 
              header("location:login.php");
            }
        
    }
    
    }
    else{
        $_SESSION["approved_confirm_message"]="Activation failed.";
                header("location:login.php");
    }
    

}
?>