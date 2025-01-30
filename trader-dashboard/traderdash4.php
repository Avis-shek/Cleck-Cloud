<?php
include('trader_header.php');

?>
<!doctype html>
<html lang="en">
</body>



            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="trader-profile">Manage Product</h2>


                        <!-- Start of Manage Product Table -->

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Price</th>
                                    <th scope="col">Product Quantity</th>
                                    <th scope="col">Product Category</th>
                                    <th scope="col"> Product Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                            $shop_id =array();
                            $shop_id=shopid_key($connection);
                            
                            if(!empty($shop_id))
                            {
                                $counter = 1;
                                $size = sizeof($shop_id);
                                
                                if($size == 1)
                                {
                                $query ="select * from product where fk1_shop_id=$shop_id[0]  ";
                               }
                               if($size == 2)
                               {
                                $query ="select * from product where fk1_shop_id=$shop_id[0] or Fk1_shop_id=$shop_id[1] ";
                               }
                                $stid = oci_parse($connection,$query);
                                
                                oci_execute($stid);
                                
                                    while (($row = oci_fetch_assoc($stid)) != false)  {
                                        $status = $row["PRODUCT_STATUS"];
                                        if($status == 2)
                                        {
                                            continue;
                                        }
                                        $product_id = $row["PRODUCT_ID"];
                                        $Product_name = $row["PRODUCY_NAME"];
                                        $Price = $row["PRODUCT_PRICE"];
                                        $Quantity = $row["PRODUCT_STOCK"];
                                        $Category_id = $row["FK2_PRODUCT_CATEGORY_ID"];
                                        $image = $row["PRODUCT_IMAGE"];
                                        $maximum = $row["MAXIMUM_ORDER"];
                                        $minimun = $row["MINIMUM_ORDER"];
                                        $PRODUCT_DESCRIPTION = $row["PRODUCT_DESCRIPTION"];
                                        
                                        
                                        
                            
                            ?>
                                <tr>
                                    <th scope="row"><?php echo  $counter ;?> </th>
                                    <td><?php echo $Product_name ; ?></td>
                                    <td><?php echo $Price ; ?></td>
                                    <td><?php echo $Quantity ; ?></td>
                                    <td>
                                        <?php 
                                         $query = "select CATEGORY_NAME from PRODUCT_CATEGORY where PRODUCT_CATEGORY_ID = $Category_id ";
                                         $result = oci_parse($connection, $query);
                                         if(oci_execute($result))
                                         {
                                             while(($row = oci_fetch_array($result)) != false)
                                             {
                                                 echo $row["CATEGORY_NAME"];
                                             }
                                         }
                                    ?></td>
                                    <td> <img src="./images/<?php echo $image ;?>" style="height:70px; width:70px;"> </td>

                                    

                                    <td>
                                    <a href="trader_product.php?id=<?php echo $product_id; ?>">
                                        <button class="btn btn-default" style="display: inline-block; padding: 0px;"
                                            data-toggle="modal" data-target="#example">
                                            <img src="./images/edit.png" width="20" />
                                        </button>
                                        </a>
                                        <a href="delete_product.php?id=<?php echo $product_id; ?>">
                                        <button class="btn btn-default" style="display: inline-block; padding: 0px;">
                                            <img src="./images/delete.png" width="20" />
                                        </button>
                                        </a>
                                        <?php
                                            if(isset($status))
                                            {
                                                if($status == '1')
                                                { $task ="deactive";
                                                    ?>
                                                    <a href="product_status.php?id=<?php echo $product_id;?>&task=<?php echo $task;?>">
                                                       <button class="btn btn-default" style="background-color:#FF6666; margin-left: 15px">Deactivate</button>
                                                    </a>
                                                    <?php
                                                   }
                                                else{
                                                    $task ="active";
                                                    ?>
                                                    <a href="product_status.php?id=<?php echo $product_id;?>&task=<?php echo $task;?>">
                                                       <button class="btn btn-default" style="background-color:#a8e4a0; margin-left: 15px">Activate</button>
                                                    </a>
                                                   <?php 
                                                   
                                                }
                                            }
                                        ?>
                                        
                                        
                                       



                                    </td>


                                </tr>
                                <?php 
                                $counter ++;
                                    };
                                    
                                    };
                                    ?>
                                
                            </tbody>
                        </table>
                        

                        <div class="success_message">
                <?php
                if(isset($_SESSION['deleted_message']))
                {
                 echo $_SESSION['deleted_message'];
                 unset($_SESSION['deleted_message']);
                }
                 ?>
              </div>
              <style>
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