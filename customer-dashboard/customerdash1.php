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
    <link rel="stylesheet" href="style3.css">


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


<!-- start of nav bar -->




<!-- end of nav bar -->



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

        <!-- Image upload  -->

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


                <li class="active">
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

                <li>
                    <a href="customerdash6.php" class="traderui">Reset Password </a>
                    <hr>
                </li>

            </ul>



        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>

<div class="navitems">

 <a href="../index.php" class="navitems" style="text-decoration: none;"> Back to Home</a>


</div>
</div>
            </nav>

            <h2 class="trader-profile" style="margin-left:50px;">Account Details</h2>


            <br>

            <form action="upload_image.php" method = "post" enctype='multipart/form-data' style="margin-left:60px;">
               <div class="row mt-2">
                    <div class="col-md-12">

                        <!-- Image upload  -->
                        <div class="ppimage">
                            <div class="control-group file-upload" id="file-upload1">
                                <div class="image-box">
                                    <img src="images/<?php echo $image;?>" alt="" class="imgupload">
                                </div>
                                <br>
                                <button type="submit" name ="upload_image" id="text1" style="color: black;"> Upload Image </button>
                                <div class="controls" style="display: none;">
                                <input type="file" name="file" />
                                </div>

                                 
                            
                            </div>
                        </div>
                        <div class="error_message">
                <?php
                if(isset($_SESSION['image_extension']))
                {
                 echo $_SESSION['image_extension'];
                 unset($_SESSION['image_extension']);
                }
                 ?>
              </div>

              <div class="error_message">
                <?php
                if(isset($_SESSION['image_error']))
                {
                 echo $_SESSION['image_error'];
                 unset($_SESSION['image_error']);
                }
                 ?>
              </div>

                    </div>
                </div>
            </form>
<style>
        .error_message{
    color:red;
    font-size: 14px;
    text-align: left;
    
  }
</style>




<br> <br>
                <div class="row mt-2">
                    <div class="col-md-12" style="margin-left:60px;"><label class="labels3"><strong style="font-size:17px;">Name: </strong> </label>
                        <span class="labels2"> <?php echo $name;?> <img src="images/verified.png" alt="" srcset="" style="margin-bottom:5px;">
                        </span>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-md-12" style="margin-left:60px;"><label class="labels3"><strong style="font-size:17px;">Email Address: </strong>  </label>
                        <span class="labels2"> <?php echo $gmail;?></span>
                    </div>

                    <div class="col-md-12" style="margin-top: 10px; margin-left:60px;"><label class="labels3" style="font-size:17px;"><strong style="font-size:17px;"> Mobile Number: </strong> </label>
                        <span class="labels2"><?php echo $contact;?></span>
                    </div>
        

                    <div class="col-md-12" style="margin-top: 10px; margin-left:60px; font-size:17px;"><label class="labels3"><strong>Birthday: </strong> </label>
                        <span class="labels2"> <?php echo $birthdate;?></span>
                 
                    </div>

                    <br>
                    <div class="col-md-12" style="margin-top: 10px; margin-left:60px; font-size:17px;">
                    <a href="customerdash5.php"><button class="btn btn-dark profile-button" id="tbutton" type="button">Update
                        Profile</button></a></div>
                   
                    <br>
               
                </div>

                <br>
                <br>

                
                <div class="row mt-2">
                    <div class="col-md-12">

                        <img src="images/scenery.gif" alt="" srcset="" class="img-responsive center-block d-block mx-auto" style="border-radius: 20px;">
                  
                    </div>
                </div>




        </div>
        





        <!-- 
        <div class="col-md-12">
            <img src="images/bannercust.png" class="img-fluid" id="banners">
        </div>
 -->


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