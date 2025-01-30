<?php
include('trader_header.php')
?>
<!doctype html>
<html lang="en">
</body>
    
    

        <!-- Page Content  -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="trader-profile">Manage Shop</h2>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Shop Name</th>
                                <th scope="col">Shop Reg. Number</th>
                                <th scope="col">Shop Location</th>
                                <th scope="col">Shop Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $user_id= $_SESSION["user_id"] ;
                            if(!empty($user_id))
                            {
                                $counter = 1;
                                $query ="select * from shop where fk1_user_id=$user_id and STATUS = '1'";
                                $stid = oci_parse($connection,$query);
                                
                                oci_execute($stid);
                                					
                                while (($row = oci_fetch_assoc($stid)) != false)  {
                                       
                                        if($row["STATUS"] == 1)
                                        {
                                            
                                            
                                            $shop_id = $row["SHOP_ID"];
                                            $shop_name = $row["SHOP_NAME"];
                                            $location = $row["SHOP_LOCATION"];
                                            $pan = $row["SHOP_REGISTRATION_NO"];
                                            $image = $row["LOGO"];
                                        }
                                        
                                     ?>
                            <tr>
                            <?php echo $image; ?>
                                <th scope="row"><?php echo $counter ;  ?></th>
                                <td><?php echo $shop_name ;  ?></td>
                                <td><?php echo $pan ;  ?></td>
                                <td><?php echo $location ;  ?></td>
                                <td> <img src="./images/vendors/<?php echo $image; ?>" alt="" style="height:70px; width:70px;"></td>
                                    <!--  FROM: NANCY to ABHISHEK Dimensions needs to be resized after image gets fetched from database -->

                                <td>
                                    <a href="shop_update_form.php?id=<?php echo $shop_id; ?>">
                                    <button class="btn btn-default" style="display: inline-block; padding: 0px;">
                                        <img src="./images/edit.png" width="20" />
                                    </button>
                                    </a>
                                    <a href="delete_shop.php?id=<?php echo $shop_id; ?>">
                                    <button class="btn btn-default" style="display: inline-block; padding: 0px;">
                                        <img src="./images/delete.png" width="20" />
                                    </button>
                                    </a>
                                  </td>


                            </tr>
                            <?php 
                                $counter ++;
                                    };
                                    
                                    };
                                    ?>

                        </tbody>
                    </table>

                    

               
              
              
              <div class="error_message">
                <?php
                if(isset($_SESSION['update_message']))
                {
                 echo $_SESSION['update_message'];
                 unset($_SESSION['update_message']);
                }
                 ?>
              </div>

              <div class="error_message">
                <?php
               
                if(isset($_SESSION['empty_error']))
                {
                 echo $_SESSION['empty_error'];
                 unset($_SESSION['empty_error']);
                }
                 ?>
              </div> 
              <style>
    .error_message{
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