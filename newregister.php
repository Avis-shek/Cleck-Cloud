<?php
include("session.php");
?>
<!doctype html>
<html lang="en">

<body>

<?php
include("customer_header.php");
?>
<!-- end of header  -->

<!-- start of contact us container -->


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
              <span>CREATE</span>
              your account.

            </div>
            <!-- screen body left align -->

            <br>
            <br>
            <div class="column-cs">
              <img src="images/cicon2.png" class="cicon1">
              <p style="font-size:14px; font-family: 'Verdana', sans-serif; color:'darkgrey;'"> Register as a <a href="newregister.php" style="color:darkgreen;"> Customer.</a> </p>

            </div>
            <br>

            <div class="column-cs">
              <img src="images/cicon3.png" class="cicon2">

              <p style="font-size:14px; font-family: 'Verdana', sans-serif;">Register as a <a href="traderregister.php" style="color:darkgreen;"> Trader.</a> </p>

            </div>


            <div class="app-contact">CONTACT INFO : + 12 34 56 78 90</div>
          </div>
          <div class="screen-body-item">
            <form action="user_registration.php" method="post" onsubmit="return validate()">
            <div class="app-form">
              <div class="app-form-group">
                <input class="app-form-control" placeholder="YOUR NAME" name="fullname">
              </div>
              <div class="app-form-group">
                <input class="app-form-control" placeholder="EMAIL" name="email">
              </div>

              <div class="error_message">
                <?php
                if(isset($_SESSION["email_error_message"]))
                {
                  echo $_SESSION["email_error_message"];
                  unset($_SESSION["email_error_message"]);
                }
                 
                 ?>
                 </div>
              <div class="error_message">
                <?php 
                
                if(isset($_SESSION["username_error_message"]))
                {
                  echo $_SESSION["username_error_message"];
                  unset($_SESSION["username_error_message"]);
                }
                  ?>
                  </div>

              <div class="app-form-group">
                <input class="app-form-control" type="password" placeholder="PASSWORD" name="password" id="password">
              </div>

              <div class="error_message">
                <?php
                if(isset($_SESSION["password_error_message"]))
                {
                 echo $_SESSION["password_error_message"];
                 unset($_SESSION["password_error_message"]);
                }
                 ?>
              </div>

              
             

              <div class="app-form-group">
                
                <input class="app-form-control"type="password" placeholder="CONFIRM PASSWORD"name="c_password" id ="c_password" onkeyup="check(this)">
                <error id="alert" class="alert"> </error>
              </div>
              


              <div class="app-form-group">
                <input class="app-form-control" placeholder="CONTACT NUMBER" name="contact">
              </div>


              <div class="app-form-group">
                <label for="birthday" style="font-family:'Verdana'; color:grey; font-size:12px;">BIRTHDAY</label>
                <input class="app-form-control" type="date" id="birthday" name="birthday">
              </div>
<script>
  birthday.max = new Date().toLocaleDateString('en-ca')
</script>

              <input type="checkbox" id="terms" name="terms" value="terms"> <label for="terms" style="font-family:'Verdana', sans-serif; font-size: 9px;"> Do you agree to all the terms? </label>

              <br>
              <p style="font-size:14px;"> Already have an account? <a href="login.php" style="COLOR:darkgreen;"> Click here</a> </p>

              <input type="submit" name="user_registration" value="SUBMIT">
            </div>
            
            <div class="error_message">
                <?php 
                if (isset($_SESSION["empty_error_message"]))
                {
                  echo $_SESSION["empty_error_message"];
                  unset($_SESSION["empty_error_message"]);
                  } 
                  ?>
                  </div>
            
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>


  <br>

  <br>

  <br>

  <!--
end of contact us container
 -->


<!-- lower ad -->

<!-- add a ad here later -->

<!-- footer-->


  <div class="container">

    <div class="row">

      <!-- Footer -->
      <footer class="text-center text-lg-start .bg-light" style="color:black">

        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
          <div class="container text-center text-md-start mt-5" style="font-family: 'Josefin Sans', sans-serif;">
            <!-- Grid row -->
            <div class="row mt-3">
              <!-- Grid column -->
              <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                <!-- Content -->
                <h6 class="text-uppercase fw-bold mb-4">
                  <i class="fas fa-gem "></i>Cleck Cloud
                </h6>
                <p>
                  CleckCloud platform provides local traders to showcase their products into a whole new marketplace, increasing their profits and bringing them to a wider spectrum of suburb citizens.
                </p>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">
                  Pages
                </h6>
                <p>
                  <a href="#!" class="text-reset"> Home </a>
                </p>
                <p>
                  <a href="#!" class="text-reset">About Us</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">Shop by Category</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">Contact Us</a>
                </p>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">
                  Category
                </h6>
                <p>
                  <a href="#!" class="text-reset">Fish Monger</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">Meat</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">??</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">??</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">??</a>
                </p>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">
                  Contact
                </h6>
                <p><i class="fas fa-home me-3"></i> Cleckhauuderfaux, West Yorkshire </p>
                <p>
                  <i class="fas fa-envelope me-3"></i>
                  cleckcloudservice@gmail.com
                </p>
                <p><i class="fas fa-phone me-3"></i> + 12 34 56 78 90</p>
                <p><i class="fas fa-print me-3"></i> + 12 34 56 78 90</p>
              </div>
              <!-- Grid column -->
            </div>
            <!-- Grid row -->
          </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
          © 2022 Copyright:
          <a class="text-reset fw-bold" href="https://mdbootstrap.com/">cleckcloud.com</a>
        </div>
        <!-- Copyright -->
      </footer>
      <!-- Footer -->

    </div>

  </div>
<!-- end -->
  </div>
  </div>


  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>
  .alert{
    color:red;
    font-size: 13px;
    text-align: left;
    
  }

  .error_message{
    color:red;
    font-size: 15px;
    text-align: left;
  }
</style>
<script type="text/javascript">
 var password = document.getElementById('password');
 flag = 1;
 function check(elem){
   if(elem.value.length > 0)
   {
     if(elem.value != password.value)
     {
       document.getElementById('alert').innerText = "Confirm password does not match.";
       flag = 0;
     }
     else{
      document.getElementById('alert').innerText = "";
      flag = 1;
     }
   }
   else{
    document.getElementById('alert').innerText = "Please enter confirm password.";
    flag = 0;
   }
 }


function validate(){
  if(document.getElementById('terms').checked)
  {
    flag =1;
  }
  else{
    alert("Please check terms and conditions before submission.");
    flag = 0;
  }


  if(flag == 1)
  {
    return true;
  }
  else{
    return false; 
  }
}

   
</script>


</body>

</html>
