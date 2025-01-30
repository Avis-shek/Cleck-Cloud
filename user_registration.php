<?php

include("session.php");
include("connection.php");
require("functions.php");
$_SESSION['empty_error_message']="";

if(isset($_POST["user_registration"]))
{
    if(!empty($_POST["fullname"])
    && !empty($_POST["email"])
    && !empty($_POST["password"])
    && !empty($_POST["email"])
    && !empty($_POST["birthday"]))
    
    {
        $fullname = strtoupper($_POST["fullname"]);
        $email = strtolower($_POST["email"]);
        $password =$_POST["password"];
        $contact =$_POST["contact"];
        $birthday = date("d-m-Y",strtotime($_POST["birthday"]));
        $user_role = "C";
        $active_status = "0";

        $gmail= email_validation($email,$user_role);
        if(!empty($gmail))
        {
            $fpassword = password_validation($password);
            $final_password = md5($password);
            if($fpassword==true)
            {
                $username = unique_username($connection,$gmail,$user_role);
                if(!empty($username))
                {
                    $token = bin2hex(random_bytes(16));

                    $query = "insert into cleck_user (user_fullname,user_name,password,email,contact,user_role,birthdate,active_status,token) 
                     values(:name,:username,:password,:email,:contact,:role,to_date(:bdate,'DD/MM/YYYY'),:status,:token)";
                    $result = oci_parse($connection, $query);

                     oci_bind_by_name($result, ':name', $fullname);
                     oci_bind_by_name($result, ':username', $username);
                     oci_bind_by_name($result, ':password', $final_password);
                     oci_bind_by_name($result, ':email', $gmail);
                     oci_bind_by_name($result, ':contact', $contact);
                     oci_bind_by_name($result, ':role', $user_role);
                     oci_bind_by_name($result, ':bdate', $birthday);
                     oci_bind_by_name($result, ':status', $active_status);
                     oci_bind_by_name($result, ':token', $token);

                    oci_execute($result);

                    gmail_verification($fullname,$gmail,$token);
                }
                
                
            }
            else
            {
                header("location:newregister.php");
            }

            
        }
        
       

    }
    else
                  {
                       $_SESSION['empty_error_message']="* All fields are must be filled. *";
                       header("location:newregister.php");
        
                  }
    
    

}

?>