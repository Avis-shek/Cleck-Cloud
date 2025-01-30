<?php
include("session.php");
include("connection.php");

$_SESSION['email_error_message'] = "";
$_SESSION['password_error_message'] = "";

$_SESSION["username_error_message"] = "";
$_SESSION["mail_sent_message"]= "";
$_SESSION["invalid_credential_error_message"]="";
$_SESSION["not_active_error_message"]="";
$_SESSION["shopname_error_message"] = "";

function email_validation($email,$user_role)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL))
     {
        return $email;
      }  
      else
      {
        $_SESSION['email_error_message'] = "* Invalid email address. *";
          if($user_role=='C')
          {
           header("location: newregister.php");
          }
          if($user_role=='T'){
            header("location: traderregister.php");
          }
        
      }
}

function password_validation($password)
{    // if the length is not 6 or greater

    if(strlen($password)<6)
    {
        $_SESSION['password_error_message'] = "Password length must be 6 or greater.";
        return false;
    }
    else{
        $pattern = '/[a-z\s]/i';
        $includes_alphabet=preg_match($pattern,$password);
        if($includes_alphabet== 1)
        {
            $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
            $includes_symbol = preg_match($pattern, $password);
            if($includes_symbol == 1)
              {
                $includes_number = preg_match('~[0-9]~', $password);
                if($includes_number == 1)
                {
                    return true;
                }
                else
                {
                    $_SESSION['password_error_message'] = "Password must contain at least one numeric character.";
                    return false;
                    
                }
              }
            else
              {
                  $_SESSION['password_error_message'] = "Password must contain at least one special character.";
                  return false;
              }
        }
        else
        {
            $_SESSION['password_error_message'] = "Password must contain alphabetic character.";
            return false;
        }
        
        }
}

function unique_username($connection,$username,$user_role)
{
    $temp=$username;
    if (!$connection) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
    $query= "select user_name from cleck_user where user_name='$temp'";
    $stid = oci_parse($connection,$query);
    oci_execute($stid);

    $total_result=0;
    while(($row = oci_fetch_array($stid)) != false)
    {
        ++$total_result;
    }
    oci_free_statement($stid);
    oci_close($connection);
    if($total_result == 0)
    {
        return $username;
    }
    else
    {
        $_SESSION["username_error_message"] = "This email address is already used.";

        if($user_role=='C')
          {
           header("location: newregister.php");
          }
          if($user_role=='T'){
            header("location: traderregister.php");
          }
    }


}

function gmail_verification($fullname,$gmail,$token)
{
    
$to = $gmail;
$subject = "ACTIVATION EMAIL";
$message = "
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />


    <head>
        <link rel='stylesheet' href='emailstyle.css'>

        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css'
            integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>


        <link rel='preconnect' href='https://fonts.googleapis.com'>
        <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
        <link
            href='https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200&family=Merriweather&family=Montserrat&family=Sacramento&display=swap'
            rel='stylesheet'>
        <link
            href='https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;300&family=Merriweather&family=Montserrat:wght@200;400&family=Poppins:wght@200&family=Sacramento&display=swap'
            rel='stylesheet'>
    </head>

<body>
    <!-- START OF EMAIL TEMP -->
    <div
        style='display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: 'Josefin Sans', sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;'>
    </div>
    <table border='0' cellpadding='0' cellspacing='0' width='100%'>

        <tr>
            <td bgcolor='#b8d6ce' align='center'>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                        <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td>
                    </tr>
                </table>
            </td>
        </tr>
 <tr>
            <td bgcolor='#b8d6ce' align='center' style='padding: 0px 10px 0px 10px;'>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                        <td bgcolor='#ffffff' align='center' valign='top'
                            style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;'>
                            <h1
                                style='font-size: 35px;  margin: 2; font-family: 'Josefin Sans', sans-serif;'>
                                Welcome
                                <div class='name'>
                                    <span style='font-size: 20px;'> $fullname</span>

                                </div>
                            </h1> <img src='https://germane-dwell.000webhostapp.com/template/logo/finallogo.png' style='display: block; border: 0px;' />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                        <td bgcolor='#ffffff' align='center'>
                            <p class='start-text'
                                style='font-family: 'Josefin Sans'; font-size: 17px;'>
                                We're excited to have you get started. First, you need to confirm your
                                account. Just press the button below.</p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor='#ffffff' align='left'>
                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                <tr>
                                    <td bgcolor='#ffffff' align='center' style='padding: 20px 30px 30px 30px;'>
                                        <table border='0' cellspacing='0' cellpadding='0'>
                                            <tr>
                                    

                                              <span> http://localhost/finalportfolio/activation.php?token=$token</span>

                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td bgcolor='#ffffff' align='center'>
                            <p class='start-text'
                                style='font-family: 'Josefin Sans'; font-size: 17px;'  align='center'>

                                CleckCloud lets you shop at various stores in your local area of Cleckhudderfaux. Cleck Cloud focuses on delivering quality, fresh, organic food with a short supply chain, working directly with its local farms, dairies, fisheries, and other food partners. 
                                


                                 </p>
                            <br>
    
                            <img class='rounded mx-auto d-block' src='https://germane-dwell.000webhostapp.com/template/logo/scenery.gif' style='width:500px;'>


                    
<br>
                            <p class='start-text' style='font-family: 'Josefin Sans'; margin-left: 60px; align='center'>
                                If you have any questions, just reply to cleckcloud@gmail.com, we're always happy
                                    to help out.</p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor='#ffffff' align='left' margin-left: 40px; margin-right: 40px; >

                            <p class='start-text'
                                style='font-family: 'Josefin Sans'; margin-left: 40px; margin-right: 40px; font-size: 17px;'>
                                Cheers, <br> Cleck Cloud Team</p>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>
</body>
</html>
";
$eol = PHP_EOL;

$header = "MIME-Version: 1.0" . $eol;
$header .= "Content-type:text/html;charset=UTF-8" .$eol;
// Basic headers
$header .= "From: cleckcloud@gmail.com".$eol;
$header .= "Reply-To: cleckcloud@gmail.com".$eol;


$mail_sent = mail($to,$subject,$message,$header);
if($mail_sent==true)
{
    $_SESSION["mail_sent_message"]= "Please, Check your gmail to activate your account $gmail";
    header("location: login.php");
}
}



function keep_user_details($username,$password,$user_id,$user_role,$name,$gmail,$contact,$birthdate,$image)
{
    $_SESSION["username"]=$username;
    $_SESSION["password"]=$password;
    $_SESSION["user_id"]=$user_id;
    $_SESSION["name"]=$name;
    $_SESSION["gmail"] = $gmail;
    $_SESSION["contact"] = $contact;
    $_SESSION["birthdate"] = $birthdate;
    $_SESSION["user_role"] = $user_role;
    $_SESSION["user_image"] = $image;

    if($user_role == 'C')
    {
        $_SESSION["user_role"]=$user_role;
        header("location: index.php");
    }
    elseif($user_role == 'T')
    {
        $_SESSION["user_role"]=$user_role;
        header("location: trader-dashboard/traderdash1.php");
    }
    elseif($user_role == 'A'){
        $_SESSION["user_role"]=$user_role;
        header("location: admin.php");
    }
    else{
        $_SESSION["user_role"]="Unknown";
        echo "Your account does not exit in our database.";
    }
}

function login_verification($connection,$username,$password)
{
    $query ="select USER_ID,USER_FULLNAME,USER_NAME,PASSWORD,EMAIL,CONTACT,USER_ROLE,BIRTHDATE,ACTIVE_STATUS,user_image from cleck_user where user_name='$username' and password='$password'";
    $stid = oci_parse($connection,$query);
    
    oci_execute($stid);
    
        while (($row = oci_fetch_assoc($stid)) != false)  {
            
            $user_role = $row["USER_ROLE"];
            $status = $row["ACTIVE_STATUS"];
            $name = $row["USER_FULLNAME"];
            $user_id = $row["USER_ID"];
            $gmail = $row["EMAIL"];
            $contact = $row["CONTACT"];
            $birthdate = $row["BIRTHDATE"];
            $image = $row["USER_IMAGE"];
           }
    
    if(!empty($user_id))
    {
        if($status == 1)
     {
        keep_user_details($username,$password,$user_id,$user_role,$name,$gmail,$contact,$birthdate,$image);
     }
    else{
           $_SESSION["not_active_error_message"]="You have not activated your accout yet. Please check your gmail to activate your account.";
           header("location: login.php");
     }
    }

    else{
        $_SESSION["invalid_credential_error_message"]="Incorrect credentials.";
        header("location: login.php"); 
    }
    

}




function unique_shopname($connection,$shopname,$redirect)
{
    $query= "select shop_name from shop where UPPER(shop_name)='$shopname'";
    $stid = oci_parse($connection,$query);
    oci_execute($stid);

    $total_result=0;
    while(($row = oci_fetch_array($stid)) != false)
    {
        ++$total_result;
    }
    if($total_result == 0)
    {
        return $shopname;
    }
    else
    {
        $_SESSION["shopname_error_message"] = "This shop is already registered.";
        if($redirect == 'traderregister2.php')
        {
            header("location: traderregister2.php");
        }
        if($redirect == 'traderregister7.php'){
            header('location: traderdash7.php');
        }
        if($redirect == 'traderregister8.php'){
            header('location: traderdash8.php');
        }
        
        
        
    }


}


function unique_pan($connection,$pan,$redirect)
{
    
    if (!$connection) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
    $query= "select shop_registration_no from shop where shop_registration_no='$pan'";
    $stid = oci_parse($connection,$query);
    oci_execute($stid);

    $total_result=0;
    while(($row = oci_fetch_array($stid)) != false)
    {
        ++$total_result;
    }
    oci_free_statement($stid);
    oci_close($connection);
    if($total_result == 0)
    {
        return $pan;
    }
    else
    {
        $_SESSION["pan_error_message"] = "This shop is already registered.";
        if($redirect == 'traderregister2.php')
        {
            header("location: traderregister2.php");
        }
        else{
            header('location: traderdash7.php');
        }
        
        
    }


}


function foreign_key($connection,$value)
{
    $query="select user_id from cleck_user where user_name='$value'";
    $stid = oci_parse($connection,$query);
    oci_execute($stid);

    while(($row = oci_fetch_array($stid)) != false)
    {
        $user_id = $row["USER_ID"];
    }
    if(!empty($user_id))
    {
        return $user_id;
    }
}



function trader_gmail_verification($fullname,$gmail,$token,$foreign_key)
{
    
$to = $gmail;
$subject = "ACCOUNT ACTIVATION";

$message = "
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />


    <head>
        <link rel='stylesheet' href='emailstyle.css'>

        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css'
            integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>


        <link rel='preconnect' href='https://fonts.googleapis.com'>
        <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
        <link
            href='https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200&family=Merriweather&family=Montserrat&family=Sacramento&display=swap'
            rel='stylesheet'>
        <link
            href='https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;300&family=Merriweather&family=Montserrat:wght@200;400&family=Poppins:wght@200&family=Sacramento&display=swap'
            rel='stylesheet'>
    </head>

<body>
    <!-- START OF EMAIL TEMP -->
    <div
        style='display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: 'Josefin Sans', sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;'>
    </div>
    <table border='0' cellpadding='0' cellspacing='0' width='100%'>

        <tr>
            <td bgcolor='#b8d6ce' align='center'>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                        <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td>
                    </tr>
                </table>
            </td>
        </tr>
 <tr>
            <td bgcolor='#b8d6ce' align='center' style='padding: 0px 10px 0px 10px;'>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                        <td bgcolor='#ffffff' align='center' valign='top'
                            style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;'>
                            <h1
                                style='font-size: 35px;  margin: 2; font-family: 'Josefin Sans', sans-serif;'>
                                Welcome
                                <div class='name'>
                                    <span style='font-size: 20px;'> $fullname</span>

                                </div>
                            </h1> <img src='https://germane-dwell.000webhostapp.com/template/logo/finallogo.png' style='display: block; border: 0px;' />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                        <td bgcolor='#ffffff' align='center'>
                            <p class='start-text'
                                style='font-family: 'Josefin Sans'; font-size: 17px;'>
                                We're excited to have you get started. First, you need to confirm your
                                account. Just press the button below.</p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor='#ffffff' align='left'>
                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                <tr>
                                    <td bgcolor='#ffffff' align='center' style='padding: 20px 30px 30px 30px;'>
                                        <table border='0' cellspacing='0' cellpadding='0'>
                                            <tr>
                                    

                                              <span> http://localhost/finalportfolio/trader_activation.php?ttoken=$token&fk=$foreign_key </span>

                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td bgcolor='#ffffff' align='center'>
                            <p class='start-text'
                                style='font-family: 'Josefin Sans'; font-size: 17px;'  align='center'>

                                CleckCloud platform provides local traders to showcase their products into a whole new
                                marketplace, increasing their profits and bringing them to a wider spectrum of suburb
                                citizens. </p>
                            <br>
    
                            <img class='rounded mx-auto d-block' src='https://germane-dwell.000webhostapp.com/template/logo/scenery.gif' style='width:500px;'>


                    
<br>
                            <p class='start-text' style='font-family: 'Josefin Sans'; margin-left: 60px; align='center'>
                                If you have any questions, just reply to @cleckcloud@gmail.com, we're always happy
                                    to help out.</p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor='#ffffff' align='left'>

                            <p class='start-text'
                                style='font-family: 'Josefin Sans'; margin-left: 40px; margin-right: 40px; font-size: 17px;'>
                                Cheers, <br> Cleck Cloud Team</p>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>
</body>
</html>

";

$eol = PHP_EOL;

$header = "MIME-Version: 1.0" . $eol;
$header .= "Content-type:text/html;charset=UTF-8" .$eol;
// Basic headers
$header .= "From: cleckcloud@gmail.com".$eol;
$header .= "Reply-To: cleckcloud@gmail.com".$eol;


$mail_sent = mail($to,$subject,$message,$header);
if($mail_sent==true)
{
    $_SESSION["trader_mail_sent_message"]= "Please, Check your gmail to activate your account $gmail";
    header("location: login.php");
}
}

function unique_product_name($connection,$product)
{
    
    $query= "select producy_name from product where UPPER(producy_name)='$product'";
    $stid = oci_parse($connection,$query);
    oci_execute($stid);

    $total_result=0;
    while(($row = oci_fetch_array($stid)) != false)
    {
        ++$total_result;
    }
    oci_free_statement($stid);
    oci_close($connection);
    if($total_result == 0)
    {
        return $product;
    }
    else
    {
        $_SESSION["product_error_message"] = "This product is already in sell.";
        header('location: traderdash3.php');
          
          
    }
}


function shopid_key($connection)
{
    $user_id = $_SESSION["user_id"];
    $query="select shop_id from shop where fk1_user_id = $user_id";
    $stid = oci_parse($connection,$query);
    oci_execute($stid);
    $count =0;
    $shop_id =array();
    while(($row = oci_fetch_array($stid)) != false)
    {
        $shop_id[$count] = $row["SHOP_ID"];
        ++$count;
        
    }
    return $shop_id;
    
}


function shop_quantity($connection)
{
    $key = $_SESSION["user_id"];
    $query = "select FK1_USER_ID from shop where FK1_USER_ID = $key";
    $stid = oci_parse($connection,$query);
    if(oci_execute($stid))
    {
    $total_result=0;
    while(($row = oci_fetch_array($stid)) != false)
    {
        ++$total_result;
    }
    }
    
    if($total_result >= 2)
    {
        $_SESSION["shop_number_exceeded"] = "Shop quantity exceeded."; 
        header('location: traderdash7.php');
    }
    else{
        return $total_result;
    }

}



function reset_password_validation($password)
{    // if the length is not 6 or greater
    if(strlen($password)< 5)
    {
        $_SESSION['password_error_message'] = "Password length must be 6 or greater.";
        header("location: traderdash6.php");
          
    }
    else
    {
        $pattern = '/[a-z\s]/i';
        $includes_alphabet=preg_match($pattern,$password);
        if($includes_alphabet== 1)
        {
            $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
            $includes_symbol = preg_match($pattern, $password);
            if($includes_symbol == 1)
              {
                $includes_number = preg_match('~[0-9]~', $password);
                if($includes_number == 1)
                {
                    return $password;
                }
                else
                {
                    $_SESSION['password_error_message'] = "Password must contain at least one numeric character.";
                    header("location: traderdash6.php");
                    
                }
              }
            else
              {
                  $_SESSION['password_error_message'] = "Password must contain at least one special character.";
                  header("location: traderdash6.php");
              }
        }
        else
        {
            $_SESSION['password_error_message'] = "Password must contain alphabetic character.";
            header("location: traderdash6.php");
        }
        
        }
}


function get_average_rating($product_id,$connection)
    {   
        $query ="select avg(REVIEW_RATING) from review where FK1_PRODUCT_ID= $product_id";
        $result = oci_parse($connection,$query);
        if(oci_execute($result))
        {
            while(($row = oci_fetch($result))==true)
            {
                $avg = oci_result($result,"AVG(REVIEW_RATING)");
                return ceil($avg);
            }
        }
    }

    function get_discount_rate($connection,$product_id)
    {
     $discount_percent=0;
     $query = "select * from DISCOUNT where fk1_product_id=$product_id";
     $result = oci_parse($connection,$query);
     if(oci_execute($result))
     {
         while(($row = oci_fetch_assoc($result))!= false)
         {
             $discount_percent=$row["DISCOUNT_PERCENT"];
             
         }
     }
     return $discount_percent;
    }

    function get_minimum_quantity($connection,$product_id)
    {
        $query = "select MINIMUM_ORDER from product where PRODUCT_ID=$product_id";
        $result = oci_parse($connection,$query);
        if(oci_execute($result))
        {
            while(($row = oci_fetch_assoc($result))!=false)
            {
                $minimum = $row["MINIMUM_ORDER"];
                return $minimum;
            }
        }
    }

    
    function get_maximum_quantity($connection,$product_id)
    {
        $query = "select MAXIMUM_ORDER from product where PRODUCT_ID=$product_id";
        $result = oci_parse($connection,$query);
        if(oci_execute($result))
        {
            while(($row = oci_fetch_assoc($result))!=false)
            {
                $maximum = $row["MAXIMUM_ORDER"];
                return $maximum;
            }
        }
    }
    function get_stock_quantity($connection,$product_id)
    {
        $query = "select PRODUCT_STOCK from product where PRODUCT_ID=$product_id";
        $result = oci_parse($connection,$query);
        if(oci_execute($result))
        {
            while(($row = oci_fetch_assoc($result))!=false)
            {
                $stock = $row["PRODUCT_STOCK"];
                return $stock;
            }
        }
    }
    

    function get_rating_count($connection,$product_id)
    {
        $count= 0;
        $query = "select count(REVIEW_RATING) from review where FK1_PRODUCT_ID = $product_id";
        $result = oci_parse($connection,$query);
        if(oci_execute($result))
        {
          while(($row = oci_fetch_assoc($result))!= false)
          {
            $count  = oci_result($result,"COUNT(REVIEW_RATING)");
            
          }
        }
        return $count;
    }

    function get_5star_rating($connection,$product_id)
    {
        $count=0;
        $query = "select count(REVIEW_RATING) from review where FK1_PRODUCT_ID = $product_id and REVIEW_RATING = 5";
        $result = oci_parse($connection,$query);
        if(oci_execute($result))
        {
          while(($row = oci_fetch_assoc($result))!= false)
          {
            $count  = oci_result($result,"COUNT(REVIEW_RATING)");
            
          }
        }
        return $count;
    }

    function get_4star_rating($connection,$product_id)
    {
        $count=0;
        $query = "select count(REVIEW_RATING) from review where FK1_PRODUCT_ID = $product_id and REVIEW_RATING = 4";
        $result = oci_parse($connection,$query);
        if(oci_execute($result))
        {
          while(($row = oci_fetch_assoc($result))!= false)
          {
            $count  = oci_result($result,"COUNT(REVIEW_RATING)");
            
          }
        }
        return $count;
    }

    function get_3star_rating($connection,$product_id)
    {
        $count=0;
        $query = "select count(REVIEW_RATING) from review where FK1_PRODUCT_ID = $product_id and REVIEW_RATING = 3";
        $result = oci_parse($connection,$query);
        if(oci_execute($result))
        {
          while(($row = oci_fetch_assoc($result))!= false)
          {
            $count  = oci_result($result,"COUNT(REVIEW_RATING)");
            
          }
        }
        return $count;
    }

    function get_2star_rating($connection,$product_id)
    {
        $count=0;
        $query = "select count(REVIEW_RATING) from review where FK1_PRODUCT_ID = $product_id and REVIEW_RATING = 2";
        $result = oci_parse($connection,$query);
        if(oci_execute($result))
        {
          while(($row = oci_fetch_assoc($result))!= false)
          {
            $count  = oci_result($result,"COUNT(REVIEW_RATING)");
            
          }
        }
        return $count;
    }

    function get_1star_rating($connection,$product_id)
    {
        $count=0;
        $query = "select count(REVIEW_RATING) from review where FK1_PRODUCT_ID = $product_id and REVIEW_RATING = 1";
        $result = oci_parse($connection,$query);
        if(oci_execute($result))
        {
          while(($row = oci_fetch_assoc($result))!= false)
          {
            $count  = oci_result($result,"COUNT(REVIEW_RATING)");
            
          }
        }
        return $count;
    }

    function get_customer_name($connection,$user_id)
{
    $query = "select USER_FULLNAME from cleck_user where USER_ID = $user_id";
    $result = oci_parse($connection,$query);
   
    if(oci_execute($result))
    {
        while(($row = oci_fetch_assoc($result)) != false)
        {
        $user_name = $row["USER_FULLNAME"];
        return $user_name;
        }
    }
    
}

function get_product_id($connection,$order_id)
{
    $query = "select FK2_PRODUCT_ID from order_details where FK1_ORDER_ID=$order_id";
    $result = oci_parse($connection,$query);
    if(oci_execute($result))
    {
        while(($row = oci_fetch_assoc($result )) != false)
        {
            $product_id = $row["FK2_PRODUCT_ID"];
            return $product_id;
        }
    }
}

function get_product_image($connection,$product_id)
{
    $query = "select PRODUCT_IMAGE from product where PRODUCT_ID = $product_id";
    $result = oci_parse($connection,$query);
    if(oci_execute($result))
    {
        while(($row = oci_fetch_assoc($result )) != false)
        {
            $image = $row["PRODUCT_IMAGE"];
            return $image;
        }
    }
    
}
?>

