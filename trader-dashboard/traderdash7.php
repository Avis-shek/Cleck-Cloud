<?php
include('trader_header.php')
?>
<!doctype html>
<html lang="en">
</body>

            <h2 class="trader-profile"> Add Shop</h2>

            <form action="add_shop.php" method="post" enctype='multipart/form-data'>

                <div class="ppimage">
                    <div class="control-group file-upload" id="file-upload1">
                        <div class="image-box">
                            <img src="" alt="" class="imgupload">
                        </div>
                        <p class="text-left" id="text1" style="color: black;">Upload Logo! </p>
                        <div class="controls" style="display: none; ">
                        <input type="file" id="myFile" name="file">
                        </div>
                    </div>
                </div>
                
                <div class="imAGE_extension">
                <?php
                if(isset($_SESSION['imAGE_extension']))
                {
                 echo $_SESSION['imAGE_extension'];
                 unset($_SESSION['imAGE_extension']);
                }
                 ?>
              </div>
                <br> <br>









                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Shop Name <span class="red-fade">*</span> </label><input type="text"
                            class="form-control" name="shop_name"></div>
                </div>
                
                <div class="error_message">
                <?php
                
                if(isset($_SESSION['shopname_error_message']))
                {
                 echo $_SESSION["shopname_error_message"];
                 unset($_SESSION["shopname_error_message"]);
                }
                 ?>
              </div>
              

                <div class=" row mt-2">
                    <div class="col-md-6"><label class="labels">Shop Location <span class="red-fade">*</span> </label><input type="text"
                            class="form-control" name="location"></div>
                </div>
                <div class=" row mt-2">
                    <div class="col-md-6"><label class="labels">Shop Registration Number  <span class="red-fade">*</span></label><input type="number"
                            class="form-control" name="pan"></div>


                </div>
                
                <div class="error_message">
                <?php
                
                if(isset($_SESSION["pan_error_message"]))
                {
                 echo $_SESSION["pan_error_message"];
                 unset($_SESSION["pan_error_message"]);
                }
                 ?>
              </div>

                <!-- <div class=" row mt-2">
                        <div class="col-md-6"><label class="labels">Shop Logo </label> <label for="img" class="labels">(select image):</label>
                            <br>
                            <input type="file" id="img" name="img" accept="image/*">
                            </div>

                    </div> -->


                <div class="mt-4 text-left"><button class="btn btn-dark profile-button" id="tbutton" type="submit" name ="submit">Add
                        Shop</button></div>


                        
                        <div class="error_message">
                <?php
                if(isset($_SESSION['empty_error']))
                {
                 echo $_SESSION['empty_error'];
                 unset($_SESSION['empty_error']);
                }
                 ?>
              </div>
              
              <div class="success_message">
                <?php
                
                if(isset($_SESSION['trader_approval_message']))
                {
                 echo $_SESSION['trader_approval_message'];
                 unset($_SESSION['trader_approval_message']);
                }
                 ?>
              </div>
              
              <div class="error_message">
                <?php
                
                if(isset($_SESSION['shop_number_exceeded']))
                {
                 echo $_SESSION['shop_number_exceeded'];
                 unset($_SESSION['shop_number_exceeded']);
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
  }</style>
              
        </div>
    </div>
    </div>
    </div>
    </form>

    </div>
    </div>



    <!-- TODO: ad banner here! -->




    <script src="pickout.js"></script>
    <script>
        // With Search
        pickout.to({
            el: '.pickout',
            search: true,
            txtBtnMultiple: 'CONFIRMAR SELECIONADAS'
        });


        // Value default
        pickout.updated('.country');
    </script>
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