<?php
include('session.php');
include('trader_header.php');
include('connection.php');
$user_id = $_SESSION["user_id"];
$query = "select * from cleck_user where USER_ID = $user_id";
$result = oci_parse($connection,$query);
if(oci_execute($result))
{
    while (($row = oci_fetch_assoc($result)) != false)  {
            
        $user_role = $row["USER_ROLE"];
        $status = $row["ACTIVE_STATUS"];
        $name = $row["USER_FULLNAME"];
        $user_id = $row["USER_ID"];
        $gmail = $row["EMAIL"];
        $contact = $row["CONTACT"];
        $birthdate = $row["BIRTHDATE"];
       }
}


if(isset($_GET["itisme"]))
{
    $decision = $_GET["itisme"];
    
    if($decision == "YES")
    {
        $name = $_SESSION["c_name"];
        $contact = $_SESSION["c_contact"];
        $birth_date = $_SESSION["c_date"];

        $gmail = $_SESSION["c_gmail"];
        $user_id = $_SESSION["user_id"];
        $format= 'DD-MM-YY';
         $query = "update cleck_user set USER_FULLNAME ='$name',EMAIL='$gmail',USER_NAME='$gmail', CONTACT ='$contact', BIRTHDATE =to_date('.$birth_date.','.$format.') where USER_ID =$user_id ";
          $result = oci_parse($connection,$query);
          if(oci_execute($result ))
          {
              unset($_SESSION["c_gmail"]);
              unset($_SESSION["c_contact"]);
              unset($_SESSION["c_name"]);
              unset($_SESSION["c_date"]);

                unset($_SESSION["gmail"]);
                $_SESSION["gmail"] = $gmail ;
                unset($_SESSION["name"]);
                $_SESSION["name"] = $name;
                unset($_SESSION["contact"]);
                $_SESSION["contact"] = $contact;
                unset($_SESSION["birthdate"]);
                $_SESSION["birthdate"] = $birth_date;
                unset($_SESSION["username"]);
                $_SESSION["username"]=$gmail;
                
                    // confirmation mail
                    $fullname = $name;
                    $to = $gmail;
                    $subject = "GMAIL VERIFICATION";
                    
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
                                                    We have updated  $gmail as your defult gamial address </p>
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
                        $_SESSION['update_message'] = "Profile updated Successfully.";
                        
                        
                        
                    }

               
                
}
    }
    else
    {
        $_SESSION['update_message'] = "Profile updation failed.";
    }
}
?>
<!doctype html>
<html lang="en">
</body>

            <h2 class="trader-profile">Account Setting</h2>
         
        <form action="update_account.php" method = "post"> 
            <div class="row mt-2">
                <div class="col-md-6"><label class="labels">Name </label><input type="text" class="form-control"
                         value="<?php echo $name ;?>" name = "name"></div>
                
            </div>

            <div class="row mt-3">
                <div class="col-md-12"><label class="labels">Email Address</label><input type="text"
                        class="form-control" placeholder="Populate Data here!!!" name = "gmail" value="<?php echo $gmail ;?>">
             </div>


                <div class="col-md-12" style="margin-top: 10px;"><label class="labels">Mobile Number</label><input
                        type="text" class="form-control" placeholder="Populate Data here!!!" name = "number" value="<?php echo $contact ;?>"></div>
                <br>

                <div class="col-md-12" style="margin-top: 10px;"><label class="labels">Birthday</label><input
                        type="date" class="form-control" placeholder="<?php echo $birthdate ;?>"id="birthday" name = "date" value="<?php echo $birthdate ;?>"></div>
                        <script>
  birthday.max = new Date().toLocaleDateString('en-ca')
</script>
                <br>
                <div class="mt-4 text-right"><button class="btn btn-dark profile-button" id="tbutton" type="submit" name ="update_profile">Save
                        Profile</button></div>
            </div>
            </form>

           

              <div class="error_message">
                <?php
                if(isset($_SESSION['empty_field']))
                {
                 echo $_SESSION['empty_field'];
                 unset($_SESSION['empty_field']);
                }
                 ?>
              </div>
              <div class="error_message">
                <?php
                
                if(isset($_SESSION['email_error_message']))
                {
                 echo $_SESSION['email_error_message'];
                 unset($_SESSION['email_error_message']);
                }
                 ?>
              </div>

              <div class="success_message">
                <?php
                if(isset($_SESSION['update_message']))
                {
                 echo $_SESSION['update_message'];
                 unset($_SESSION['update_message']);
                }
                 ?>
              </div>
              
                      <style>
     .error_message{
    color:red;
    font-size: 20px;
    text-align: left;
    padding-top:15px;

  } 
  
  .success_message{
    color:green;
    font-size: 20px;
    text-align: left;
    padding-top:15px;
  }
 
              </style>

        </div>
    </div>
    </div>
    </div>

    <!-- TODO: ad banner here! -->


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });

        $(".image-box").click(function (event) {
            var previewImg = $(this).children("img");

            $(this)
                .siblings()
                .children("input")
                .trigger("click");

            $(this)
                .siblings()
                .children("input")
                .change(function () {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        var urll = e.target.result;
                        $(previewImg).attr("src", urll);
                        previewImg.parent().css("background", "transparent");
                        previewImg.show();
                        previewImg.siblings("p").hide();
                    };
                    reader.readAsDataURL(this.files[0]);
                });
        });
    </script>
</body>

</html>