<?php
include('session.php');
include('connection.php');
if(isset($_POST["update_profile"]))
{
    if(!empty($_POST["name"]) &&
       !empty($_POST["gmail"]) &&
       !empty($_POST["number"])
       
    )
    {
        $name = strtoupper($_POST["name"]);
        $_SESSION["c_name"] = $name;
        $gmail = $_POST["gmail"];
        $contact = $_POST["number"];
        $_SESSION["c_contact"] = $contact;
        $birth_date = $_SESSION["birthdate"];
        $_SESSION["c_date"] = $birth_date;
        if(!empty($_POST["date"]))
        {
        $birth_day = date('d-m-Y',strtotime($_POST['date']));
        $format= 'DD-MM-YY';
        
        $_SESSION["c_date"] = $birth_day;
        }
        $user_id = $_SESSION["user_id"];
    if (filter_var($gmail, FILTER_VALIDATE_EMAIL))
     {
         $_SESSION["c_gmail"] = $gmail;
        $email = $_SESSION["gmail"];
        if($email == $gmail)
        {
          $query = "update cleck_user set USER_FULLNAME ='$name', CONTACT ='$contact', BIRTHDATE =to_date('.$birth_day.','.$format.') where USER_ID =$user_id";
          $result = oci_parse($connection,$query);

          if(oci_execute($result))
          {
            if(oci_num_rows($result) != false)
            {
                $_SESSION['update_message'] = "Profile updated Successfully.";
                unset($_SESSION["name"]);
                $_SESSION["name"] = $name;
                unset($_SESSION["contact"]);
                $_SESSION["contact"] = $contact;
                unset($_SESSION["birthdate"]);
                $_SESSION["birthdate"] = $birth_day;
                

                
                header("location: customerdash5.php");
            }
          }
        }
        else{
            $counter = 0;
            $query = "select * from cleck_user where EMAIL = '$gmail' and USER_NAME != '$email' ";
            $result = oci_parse($connection,$query);
             if(oci_execute($result))
             {
                 while(($row = oci_fetch_assoc($result)) != false)
                 {
                     ++$counter;
                 }
             }
            if($counter != 0)
            {
                $_SESSION['email_error_message'] = "This email address is already taken.";
                header('location:customerdash5.php');
            }
            else
            {
            $fullname = $_SESSION["name"];
            $to = $_SESSION["gmail"];
            $subject = "GMAIL VERIFICATION";
            $a = "YES";
            $b = "NO";
            
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
                                            We have received a request to update this gamil. We want to confirm that is this you who have requested for gmail upadte.
                                            if this is you, please click this link to confirm</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor='#ffffff' align='left'>
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                            <tr>
                                                <td bgcolor='#ffffff' align='center' style='padding: 20px 30px 30px 30px;'>
                                                    <table border='0' cellspacing='0' cellpadding='0'>
                                                        <tr>
                                                
            
                                                          <span><a href='http://localhost/finalportfolio/customer-dashboard/customerdash5.php?itisme=$a'><button class='button' style='background-color:green'>Yes That was me</button></a></span>
                                                           <p><br>If this is not you please click this link : </p>
                                                           <span><a href='http://localhost/finalportfolio/customer-dashboard/customerdash5.php?itisme=$b'><button  class='button'>That was not me</button></a></span>
                                                           <style>
                                                           .button {
                                                            background: #FF4742;
                                                            
                                                            border-radius: 6px;
                                                            box-shadow: rgba(0, 0, 0, 0.1) 1px 2px 4px;
                                                            box-sizing: border-box;
                                                            color: #FFFFFF;
                                                            cursor: pointer;
                                                            display: inline-block;
                                                            font-family: nunito,roboto,proxima-nova,'proxima nova',sans-serif;
                                                            font-size: 16px;
                                                            font-weight: 800;
                                                            line-height: 16px;
                                                            min-height: 40px;
                                                            outline: 0;
                                                            padding: 12px 14px;
                                                            text-align: center;
                                                            text-rendering: geometricprecision;
                                                            text-transform: none;
                                                            user-select: none;
                                                            -webkit-user-select: none;
                                                            touch-action: manipulation;
                                                            vertical-align: middle;
                                                          }

                                                          .button:hover,
                                                          .button:active {
                                                            background-color: initial;
                                                            background-position: 0 0;
                                                            color: #FF4742;
                                                          }
                                                          
                                                       </style>
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
                $_SESSION["trader_mail_sent"]= "Please, Check your gmail to verify it's you.";
                
                header('location:customerdash5.php');
                
            }
            
        }
    }
      }  
      else
      {
        $_SESSION['email_error_message'] = "Invalid email address.";
        header('location:customerdash5.php');
      }
    }
    else
    {
        $_SESSION["empty_field"] = "All field must be filled.";
        header('location:customerdash5.php');
    }
}
?>