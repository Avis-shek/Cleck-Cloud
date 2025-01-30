<?php
include('session.php');
include('trader_header.php');
if(isset($_GET["id"]))
{
    $product_id =$_GET["id"];
    $query = "select * from product where PRODUCT_ID = $product_id";
    $stid = oci_parse($connection,$query);
                                
    oci_execute($stid);
    
        while (($row = oci_fetch_assoc($stid)) != false)  {
            $product_id = $row["PRODUCT_ID"];
            $Product_name = $row["PRODUCY_NAME"];
            $Price = $row["PRODUCT_PRICE"];
            $Quantity = $row["PRODUCT_STOCK"];
            $Category_id = $row["FK2_PRODUCT_CATEGORY_ID"];
            $image = $row["PRODUCT_IMAGE"];
            $maximum = $row["MAXIMUM_ORDER"];
            $minimun = $row["MINIMUM_ORDER"];
            $PRODUCT_DESCRIPTION = $row["PRODUCT_DESCRIPTION"];

            $_SESSION["p_product_id"] = $product_id;
            $_SESSION["p_product_name"] = $Product_name;
            $_SESSION["p_price"] = $Price;
            $_SESSION["p_quantity"]  = $Quantity;
            $_SESSION["p_category_id"] = $Category_id;
            $_SESSION["p_image"] = $image;
            $_SESSION["p_maximum"] = $maximum;
            $_SESSION["p_minimun"] = $minimun;
            $_SESSION["p_PRODUCT_DESCRIPTION"] = $PRODUCT_DESCRIPTION;




            }
        }
?>
<!doctype html>
<html lang="en">
<body>
<form action="update_product.php" method="post" enctype='multipart/form-data'>
                <div class="row mt-2">
                <input type="hidden" class="form-control" name = "id" value = "<?php echo $_SESSION["p_product_id"];?>">
                    <div class="col-md-6">
                        <label class="labels">Product Name* </label>
                            <input type="text" class="form-control" name = "product_name" value = "<?php echo $_SESSION["p_product_name"];?>"></div>

                            <div class="error_message">
                <?php
                if(isset($_SESSION['product_error_message']))
                {
                 echo $_SESSION['product_error_message'];
                 unset($_SESSION['product_error_message']);
                }
                 ?>
              </div>
                    <div class="col-md-6"><label class="labels">Product Price*</label><input type="number"
                            class="form-control" name="price" value = "<?php echo $_SESSION["p_price"];?>"></div>
                      </div>

            <br>
            <div class=" row mt-2">
                        <div class="col-md-6"><label class="labels">Product Quantity* </label><input type="number"
                                class="form-control" name="quantity" value = "<?php echo $_SESSION["p_quantity"];?>"></div>
                        <div class="col-md-6">
                            <label class="labels">Product Category*</label>


                            <div class="pk-form">
                                <select name="option" id="option" class="option pickout"
                                    placeholder="Select a category">
                                    <option value="1" <?php if(!empty($_SESSION["p_category_id"])){if($_SESSION["p_category_id"] == 1){?> selected <?php } }?> >Fruits</option>
                                    <option value="2" <?php if(!empty($_SESSION["p_category_id"])){if($_SESSION["p_category_id"] == 2){?> selected <?php } }?> >Vegetables</option>
                                    <option value="3" <?php if(!empty($_SESSION["p_category_id"])){if($_SESSION["p_category_id"] == 3){?> selected <?php } }?> >Meat</option>
                                    <option value="4" <?php if(!empty($_SESSION["p_category_id"])){if($_SESSION["p_category_id"] == 4){?> selected <?php } }?> >Bakery Items</option>
                                    <option value="5" <?php if(!empty($_SESSION["p_category_id"])){if($_SESSION["p_category_id"] == 5){?> selected <?php } }?> >Fish and Seafood</option>
                                    <option value="6" <?php if(!empty($_SESSION["p_category_id"])){if($_SESSION["p_category_id"] == 6){?> selected <?php } }?> >Delicatessen</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Product Description*</label><input type="textbox"
                                class="form-control" placeholder="" name="description" id="ptextbox" value ="<?php echo $_SESSION["p_PRODUCT_DESCRIPTION"];?>"> </div>

                        

                        <br>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Product Minimum Quantity* </label><input
                                type="number" class="form-control" name="minimum" value="<?php echo $_SESSION["p_minimun"];?>"></div>
                        <div class="col-md-6"><label class="labels">Product Maximum Quantity*</label><input
                                type="number" class="form-control" name="maximum" value="<?php echo $_SESSION["p_maximum"];?>"></div>
          </div>

          <div class=" row mt-3">
                            <div class="col-md-12" style="margin-top: 10px;"><label class="labels"> Upload an
                                    Image*</label>
                                <br>
                                <input type="hidden" class="form-control" name = "image" value = "<?php echo $_SESSION["p_image"];?>">
                                <input type="file" id="myFile" name="file">
                            </div>
                            <br>
                            <div class="mt-4 text-right"><button class="btn btn-dark profile-button" id="tbutton"
                                    type="submit" name ="update_product">Update
                                    Product</button></div>
                        </div>

               

              <div class="error_message">
                <?php
                if(isset($_SESSION['empty_message']))
                {
                 echo $_SESSION['empty_message'];
                 unset($_SESSION['empty_message']);
                }
                 ?>
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

              <div class="success_message">
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
                if(isset($_SESSION['image_extension']))
                {
                 echo $_SESSION['image_extension'];
                 unset($_SESSION['image_extension']);
                }
                 ?>
              </div>
              
              
              </div>

              

              


              
                    </div>
                </div>
            </form>
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

</body>
</html>