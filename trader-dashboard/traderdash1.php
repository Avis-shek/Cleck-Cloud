
<?php
include('trader_header.php')
?>
<!doctype html>
<html lang="en">
   <?php
        $username = $_SESSION["username"];
        $name = $_SESSION["name"];
        $gmail = $_SESSION["gmail"];
        $contact = $_SESSION["contact"];
        $birthdate = $_SESSION["birthdate"];
        $image = $_SESSION["user_image"];
        
   ?>

<body>
    <!-- start of form for trader's account -->

         <form action="upload_image.php" method = "post" enctype='multipart/form-data' >
               <div class="row mt-2">
                    <div class="col-md-12 text-center">

                        <!-- Image upload  -->
                        <div class="ppimage">
                            <div class="control-group file-upload" id="file-upload1">
                                <div class="image-box text-center ">
                                    <img src="images/<?php echo $image;?>" alt="" class="imgupload">
                                </div>
                                <br>
                                <button type="submit" name ="upload_image" class="text-center" id="text1" style="color: black;"> Upload Image </button>
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
    font-size: 16px;
    align:left;
  }
</style>




<br> <br>
                <div class="row mt-2">
                    <div class="col-md-12 text-center"><label class="labels3"><strong>Name: </strong> </label>
                        <span class="labels2"> <?php echo $name;?> <img src="images/verified.png" alt="" srcset="" style="margin-bottom:5px;">
                        </span>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-md-12 text-center" ><label class="labels3"><strong>Email Address: </strong>  </label>
                        <span class="labels2"> <?php echo $gmail;?></span>
                    </div>

                    <div class="col-md-12 text-center" style="margin-top: 10px;"><label class="labels3"><strong> Mobile Number: </strong> </label>
                        <span class="labels2"><?php echo $contact;?></span>
                    </div>
        

                    <div class="col-md-12 text-center" style="margin-top: 10px;"><label class="labels3"><strong>Birthday: </strong> </label>
                        <span class="labels2"> <?php echo $birthdate;?></span>
                 
                    </div>
                    <div class="col-md-12 text-center" style="margin-top: 10px;">
                    <a href="traderdash5.php"><button class="btn btn-dark profile-button" id="tbutton" type="button">Update
                        Profile</button></a></div>
                   
                    <br>
               
                </div>

                <br>
                <br>

                
                <div class="row mt-2">
                    <div class="col-md-12">

                        <img src="images/custbanner.png" alt="" srcset="" class="img-responsive center-block d-block mx-auto" style="border-radius: 20px;">
                  
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