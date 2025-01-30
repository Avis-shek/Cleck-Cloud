<?php
include('session.php');
include('connection.php');
include('functions.php');
if(isset($_POST["traderl"]))
{
    if(!empty($_POST["fullname"])
    && !empty($_POST["email"])
    && !empty($_POST["password"])
    && !empty($_POST["contact"])
    && !empty($_POST["birthday"])
    && !empty($_POST["sell-textbox"]))

    {
        $fullname= strtoupper($_POST["fullname"]);
        $email= $_POST["email"];
        $password= $_POST["password"];
        $contact= $_POST["contact"];
        $birthday = date("d-m-Y",strtotime($_POST["birthday"]));
        $message_to_admin= strtoupper($_POST["sell-textbox"]);
        $user_role = "T";
        $active_status = "0";

        $gmail= email_validation($email,$user_role);
        
        if(!empty($gmail))
        {
            $fpassword = password_validation($password);
            if($fpassword == true)
            {
                $final_password = md5($password);
                $username = unique_username($connection,$gmail,$user_role);
                if(!empty($username))
                {
                    $_SESSION['cleck_user_fullname'] = $fullname;
                    $_SESSION['cleck_user_gmail'] = $gmail;
                    $_SESSION['cleck_user_password']=$final_password;
                    $_SESSION['cleck-user_contact']=$contact;
                    $_SESSION['cleck_user_birthday']=$birthday;
                    $_SESSION['cleck_user_role'] = $user_role;
                    $_SESSION['cleck_active_status']=$active_status;
                    $_SESSION['cleck_username'] = $username;
                    $_SESSION['cleck_message_toadmin'] = $message_to_admin;

                    header('location: traderregister2.php');
                    
                }
            }
            else{
                header('location:traderregister.php');
            }
        }

        


    }
    else
      {
        $_SESSION['empty_error_message']="All fields are required.";
        header("location:traderregister.php");
      }

      
}

                    if(isset($_POST['trader2']))
                    {
                        if(!empty($_POST['shop_name'])
                        && !empty($_POST['location'])
                        && !empty($_POST['pan'])
                        && !empty($_POST['sell-point']))
                        {
                          $shop_name = strtoupper($_POST['shop_name']);
                          $_SESSION['cleck_location'] = strtoupper($_POST['location']);
                          $pan = $_POST['pan'];
                          $_SESSION['cleck_sellingPoint']  = $_POST['sell-point'];
                          $_SESSION['status'] = '0';
                          $redirect = "traderregister2.php";
                         $_SESSION['cleck_shopname'] =unique_shopname($connection,$shop_name,$redirect);
                         if(!empty($_SESSION['cleck_shopname']))
                         {
                             $panNumber = intval($pan);
                             if(is_int($panNumber))
                             {
                                $_SESSION['registration_no'] = unique_pan($connection,$panNumber,$redirect);
                                if(!empty($_SESSION['registration_no']))
                                {

                                    $token = bin2hex(random_bytes(10));

                                    $query = "insert into cleck_user (user_fullname,user_name,password,email,contact,user_role,birthdate,active_status,token) 
                                    values(:name,:username,:password,:email,:contact,:role,to_date(:bdate,'DD/MM/YYYY'),:status,:token)";
                                    $result = oci_parse($connection, $query);

                                   oci_bind_by_name($result, ':name', $_SESSION['cleck_user_fullname']);
                                   oci_bind_by_name($result, ':username', $_SESSION['cleck_username']);
                                   oci_bind_by_name($result, ':password', $_SESSION['cleck_user_password']);
                                   oci_bind_by_name($result, ':email', $_SESSION['cleck_user_gmail']);
                                   oci_bind_by_name($result, ':contact', $_SESSION['cleck-user_contact']);
                                   oci_bind_by_name($result, ':role', $_SESSION['cleck_user_role']);
                                   oci_bind_by_name($result, ':bdate', $_SESSION['cleck_user_birthday']);
                                   oci_bind_by_name($result, ':status',$_SESSION['cleck_active_status'] );
                                   oci_bind_by_name($result, ':token', $token);
                                   oci_execute($result);
                                   
                                   
                                  $foreign_key = foreign_key($connection,$_SESSION['cleck_username']);
                                  

                                  $sql = "insert into shop (shop_name,shop_location,shop_registration_no,status,fk1_user_id)
                                  values(:shopname,:location,:registration,:status,:foreign)";
                                  $results = oci_parse($connection, $sql);

                                  oci_bind_by_name($results, ':shopname', $_SESSION['cleck_shopname']);
                                  oci_bind_by_name($results, ':location', $_SESSION['cleck_location']);
                                  oci_bind_by_name($results, ':registration', $_SESSION['registration_no']);
                                  oci_bind_by_name($results, ':status', $_SESSION['status']);
                                  oci_bind_by_name($results, ':foreign', $foreign_key);
                                  if(oci_execute($results))
                                  {
                                    trader_gmail_verification($_SESSION['cleck_user_fullname'],$_SESSION['cleck_user_gmail'],$token,$foreign_key);
                                  }

                                }
                                
                                
                             }
                             else{
                                $_SESSION['pan_error_message']="Invalid registration number.";
                                header("location: traderregister2.php");
                             }
                             
                         }
                        }
                        else{
                            $_SESSION['empty_error_message']="All fields are required.";
                            header("location: traderregister2.php");
                        }

                    }
?>