<?php 
include("session.php");
include("connection.php");
if(isset($_GET['token']))
{
    $token =$_GET['token'];
    $updatequery = "update cleck_user set active_status ='1' where token ='$token'";
    $stid = oci_parse($connection,$updatequery);
    
    if(oci_execute($stid))
    {
        $_SESSION["mail_sent_message"]="Account Activated successfully.";
        header("location:login.php");
        
    }
    
    
}

?>