<?php
include('session.php');
include('trader_header.php');


?>

<!doctype html>
<html lang="en">
<body>

<div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="trader-profile">Manage Product</h2>
</div>
</div>

<?php
if(isset($_GET["id"]))
{
    $shop_id = $_GET["id"];
    $query = "select * from shop where SHOP_ID = $shop_id";
    $result = oci_parse($connection,$query);
    if(oci_execute($result))
    {
        while(($row = oci_fetch_assoc($result)) != false)
        {
            $shop_id = $row["SHOP_ID"];
            $shop_name = $row["SHOP_NAME"];
            $shop_location = $row["SHOP_LOCATION"];
            $image = $row["LOGO"];

            $_SESSION["s_shop_id"] = $shop_id;
            $_SESSION["s_shop_name"] = $shop_name;
            $_SESSION["s_shop_location"] = $shop_location;
            $_SESSION["s_image"] = $image;
        }
    }

}
?> 
                                        <form action="update_shop.php" method="post" enctype='multipart/form-data' >
                                            


                                                    <div class="row mt-2">
                                                        <div class="col-md-12">
                                                            <label class="labels"></label>
                                                            <input type="hidden" class="form-control" value="<?php echo $_SESSION["s_shop_id"]; ?>" name = "shop_id">
                                                        </div>
                                                    </div>

                                                        <div class="row mt-2">
                                                            <div class="col-md-6">
                                                                <label class="labels">Shop Name* </label>
                                                                <input type="text" class="form-control" value="<?php echo $_SESSION["s_shop_name"]; ?>" name = "shopname">
                                                                <div class="error_message">
                <?php
                
                if(isset( $_SESSION["shopname_error_message"]))
                {
                    echo  $_SESSION["shopname_error_message"];
                    unset($_SESSION["shopname_error_message"]); 
                }
                ?>
                </div>  
                                                            </div>
                                                        </div>
                                                        
                                                              
                                        
                                        
                                                    <div class=" row mt-2">
                                                        <div class="col-md-6">
                                                            <label class="labels">Shop Location* </label>
                                                                <input type="hidden" class="form-control" value="<?php echo $_SESSION["s_image"]; ?>" name = "image"><input
                                                                type="text" class="form-control" value="<?php echo $_SESSION["s_shop_location"]; ?>" name = "location">
                                                            </div>
                                                    </div>
                                                            
                                                           
                                                        <div class=" row mt-2">
                                                            <div class="col-md-6">
                                                                <label class="labels">Shop Logo </label> <label for="img" class="labels">(select image):</label>
                                                                
                                                                    <br>
                                                                    <input type="file" id="img" name="file">
                                                            </div>
                                        
                                                        </div>
                                        
                                        
                                                        <div class="row mt-4">
                                                            <div class= "col-md-6">
                                                    
                                                            <button class="btn btn-dark profile-button" id="tbutton" type="submit" name = "edit_shop">Update
                                                                Shop</button>
                                                                </div>
                                                        </div>
                                
                           </div>
                                        </form>

               

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
    color:red;
    font-size: 20px;
    margin-left:170px;
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
