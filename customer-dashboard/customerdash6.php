<?php
include('session.php');
        $username = $_SESSION["username"];
        $name = $_SESSION["name"];
        $gmail = $_SESSION["gmail"];
        $contact = $_SESSION["contact"];
        $birthdate = $_SESSION["birthdate"];
        $image = $_SESSION["user_image"];
        
   ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cleck Cloud</title>




    <!-- link to css -->
    <link rel="stylesheet" href="style8.css">



    <!-- for google font -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200&family=Merriweather&family=Montserrat&family=Sacramento&display=swap"
        rel="stylesheet">



    <!-- link to bootstrap -->


    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">



    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>



    <!-- start of trader dashboard container  -->

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">

                <img src="images/finallogo.png" alt="Cleck Cloud Logo">


            </div>

            <ul class="list-unstyled components">


                <div class="ppimage">
                    <div class="control-group file-upload" id="file-upload1">
                        <div class="image-box text-center">
                            <img src="images/<?php echo $image;?>" alt="" class="imgupload">
                        </div>
                       
                    </div>
                </div>



                <div class="trader-name">

                    <p class="text-center" id="text2" style="color: black;">Welcome <?php echo $name; ?></p>

                </div>

                <li>
                    <a href="customerdash1.php" class="traderui"> Account </a>
                    <hr>
                </li>

                <li>
                    <a href="../shopcart3.php" class="traderui">View Cart </a>
                    <hr>
                </li>

                <li>
                    <a href="../wishlist.php" class="traderui">My Saved Items </a>
                    <hr>
                </li>
                <li>
                    <a href="customerdash2.php" class="traderui">Order History</a>
                    <hr>
                </li>

                <li>
                    <a href="customerdash5.php" class="traderui">Account Setting </a>
                    <hr>
                </li>

                <li class="active">
                    <a href="customerdash6.php" class="traderui">Reset Password </a>
                    <hr>
                </li>

            </ul>



        </nav>

<!-- 
        hello -->

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>

                    <div class="navitems">

                        <a href="../index.php" class="navitems"style="text-decoration: none;" > Back to Home</a>
                       
                       
                       </div>



                </div>
            </nav>

            <h2 class="trader-profile">Reset Password</h2>
            <img src="./images/reset_password.svg" alt="">
            <p class="resetpw"> Please create a new password that you don’t use on any other site. </p>



            <form action="reset_password.php" method="post" onsubmit="return validate()">
                <div class="row mt-3">

                </div>

                <div class="row mt-3">
                    <div class="col-md-6"><input type="password" class="form-control" placeholder="Current Password" name="current">
                    </div>
                    <br>
                    
                    </div>
                <div class="error_message">
                <?php
                if(isset($_SESSION['empty_currentp']))
                {
                 echo $_SESSION['empty_currentp'];
                 unset($_SESSION['empty_currentp']);
                }
                 ?>
              </div>

                <div class="row mt-3">
                    <div class="col-md-6"><input type="password" class="form-control" placeholder="New Password" id="password" name="new">
                    <div class="error_message">
                <?php
                if(isset($_SESSION['password_error_message']))
                {
                 echo $_SESSION['password_error_message'];
                 unset($_SESSION['password_error_message']);
                }
                 ?>
              </div>
                    </div>
                <div class="error_message">
                <?php
                if(isset($_SESSION['empty_newp']))
                {
                 echo $_SESSION['empty_newp'];
                 unset($_SESSION['empty_newp']);
                }
                 ?>
              </div>

            

                    </div>
                    


                
              


                <div class="row mt-3">

                    <div class="col-md-6"><input type="password" class="form-control" name = "recent" onkeyup="check(this)"
                            placeholder="Confirm Password">
                            <error id="alert" class="alert"></error>
                    </div>
                </div>
                <div class="error_message">
                <?php
                if(isset($_SESSION['empty_recentp']))
                {
                 echo $_SESSION['empty_recentp'];
                 unset($_SESSION['empty_recentp']);
                }
                 ?>
              </div>

                <div class="row mt-3">
                    <div class="col-md-6">

                        <div class="resetpw2">

                            Password must:
                            Be between 9 and 64 characters

                            Include at least two of the following:

                            <ul>
                                <li> An uppercase character </li>
                                <li> A lowercase character </li>
                                <li> A number </li>
                                <li> A special character</li>

                            </ul>
                        </div>
                    </div>
                </div>



                <div class="mt-4 text-left"><button class="btn btn-dark profile-button" id="tbutton" name ="reset"type="submit">Reset
                        Password</button></div>
                        <div class="error_message">
                <?php
                if(isset($_SESSION['reset_message']))
                 {
                  echo $_SESSION['reset_message'];
                 unset($_SESSION['reset_message']);
                 }
                ?>
            </div>
        </div>
        
            
    </div>
    </form>
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
    <style>
    .error_message{
    color:green;
    font-size: 20px;
    text-align: left;
  }

  .alert{
    color:red;
    font-size: 13px;
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