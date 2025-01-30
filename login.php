<!doctype html>
<html lang="en">
<body>
    <?php
      include("customer_header.php");
    ?>
<!--  end of header -->

<!-- start of login container  -->


<br> <br>

<br> <br>

<div class="contactus">
  <div class="container">
    <div class="screen">
      <div class="screen-header">
        <div class="screen-header-left">
          <div class="screen-header-button close"></div>
          <div class="screen-header-button maximize"></div>
          <div class="screen-header-button minimize"></div>
        </div>
        <div class="screen-header-right">
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
        </div>
      </div>
      <div class="screen-body">
        <div class="screen-body-item left">
          <div class="app-title">
            <span>LOGIN</span>
          to your account.
          </div>
          <div class="app-contact">CONTACT INFO : + 12 34 56 78 90</div>
        </div>
        <div class="screen-body-item">
          <form action="login_verification.php" method ="post">
          <div class="app-form">
            <div class="app-form-group">
              <input class="app-form-control" placeholder="EMAIL:" name ="username">
            </div>
            
            <div class="app-form-group">
              <input class="app-form-control"  placeholder="PASSWORD:" name="password">
            </div>
           
            <br>


            <p style="font-size:14px;"> Don't have an account? <a href="newregister.php" style="COLOR:darkgreen;"> Click here</a> </p>
        
             <input type="submit" name="login"> 
          </div>
          <div class="error_message">
            <?php 
              if(isset($_SESSION["feild_empty_message"]))
              {
                echo $_SESSION["feild_empty_message"];
                unset($_SESSION["feild_empty_message"]);
              }
              
              ?>
            </div>
            </div>

          <div class="error_message">
            <?php 
              if(isset($_SESSION["not_active_error_message"]))
              {
                echo $_SESSION["not_active_error_message"];
                unset($_SESSION["not_active_error_message"]);
              }
              
              ?>
            </div>

            <div class="error_message">
            <?php 
              if(isset($_SESSION["invalid_credential_error_message"]))
              {
                echo $_SESSION["invalid_credential_error_message"];
                unset($_SESSION["invalid_credential_error_message"]);
              }
              
              ?>
            </div>

            <div class="success_message">
            <?php 
              if(isset($_SESSION["trader_mail_sent_message"]))
              {
                echo $_SESSION["trader_mail_sent_message"];
                unset($_SESSION["trader_mail_sent_message"]);
              }
              
              ?>
            </div>

            <div class="success_message">
            <?php 
              if(isset($_SESSION["trader_approval_message"]))
              {
                echo $_SESSION["trader_approval_message"];
                unset($_SESSION["trader_approval_message"]);
              }
              
              ?>
            </div>
            
            
            <div class="success_message">
            <?php 
              if(isset($_SESSION["approved_confirm_message"]))
              {
                echo $_SESSION["approved_confirm_message"];
                unset($_SESSION["approved_confirm_message"]);
              }
              ?>
            </div>
            
            <div class="success_message">
            <?php 
              if(isset($_SESSION["mail_sent_message"]))
              {
                echo $_SESSION["mail_sent_message"];
                unset($_SESSION["mail_sent_message"]);
              }
              ?>
            </div>
            
            
        </div>
        </form>
      </div>
    </div>

  </div>
</div>


<br>

<br>

<br>

<!-- 
end of login  container 
 -->


<!--         lower ad -->


<!-- Footer -->
<?php
include("footer.php");
?>

<style>
.error_message{
  color:red;
  font-size: 15px;
  text-align: left;
}

.success_message{
  color:green;
  font-size: 15px;
  text-align: left;
}

</style>

</body>

</html>
