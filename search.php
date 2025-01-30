<!doctype html>
<html lang="en">
<?php
include('session.php');
include('connection.php');
include('functions.php');
include('customer_header.php');

?>

    <div class="wrapper">
      <!-- Sidebar  -->
      <nav id="sidebar">

        <div class="searchbar-product">
        </div>
        <br>

                <!--start of category -->

        <div class="category-product" style="margin-top: 0px;">
          <p class="cat-head"> <em> Category
              <hr style="color: cadetblue; width: 230px; height: 5px;">


            </em></p>

          <form action="search.php" method="get">
            <ul class="list-group">
            <?php
           
                 $query = "select * from PRODUCT_CATEGORY";
                 $result = oci_parse($connection,$query);
                 if(oci_execute($result))
                 {
                   while(($row = oci_fetch_assoc($result)) != false)
                   {
                   $category_id = $row["PRODUCT_CATEGORY_ID"];
                    $category_name = $row["CATEGORY_NAME"];
                 
                ?>
                
              <li class="list-group-item">
                <input type="checkbox" id="<?php echo $category_id ;?>" name="category[]" value="<?php echo $category_id ;  ?>"
                <?php if(isset($_GET["category"]) && (in_array($category_id,$_GET["category"]))){echo 'checked="checked"';} ?>
                >
                <?php echo $category_name ;  ?>
              </li>
             <?php
                  }
                }
             ?>
            </ul>

        </div>
        <!--         end of category -->

        <!--         start of shop category -->

        <div class="category-product" style="margin-top: 10px;">
          <p class="cat-head"> <em> Shop
              <hr style="color: cadetblue; width: 230px; height: 5px;">
            </em></p>

          <ul class="list-group">
          <?php
              
              $query="select * from shop where status ='1'";
              $result = oci_parse($connection,$query);
              if(oci_execute($result))
              {
                while(($row = oci_fetch_assoc($result)) != false)
                {
                  
                  $shop_id = $row["SHOP_ID"];
                  $shop_name = $row["SHOP_NAME"];
                  echo $shop_name;
                  
            ?>
            <li class="list-group-item">
              <input type="checkbox" id="<?php echo $shop_id;?>" name="shopname[]" value="<?php echo $shop_id;?>" 
               <?php if(isset($_GET["shopname"]) && in_array($shop_id,$_GET["shopname"])){ echo 'checked="checked"'; }?>
              >
              <?php
                 echo $shop_name;
              ?>
            </li>
            <?php
                  }
                }
              
            ?>
            
          </ul>

        </div>


        <!-- start of price input box -->
        <div class="category-product" style="margin-top: 10px;">
          <p class="cat-head" style="margin-bottom: 0px;"> <em> Price
              <hr style="color: cadetblue; width: 230px; height: 5px;">
            </em></p>

          
            <ul class="list-group" style="border-style: none;">
              <li class="list-group-item" style="border-style: none;">

                <label> £ </label> <input type="number" id="price1" name="price1" 
                  style="width:80px;  border-color: lightgray;" placeholder="  From"
                  <?php if(isset($_GET["price1"])){echo $_GET["price1"];} ?>>

                <label> £ </label> <input type="number" id="price2" name="price2" 
                  style="width:80px;  border-color: lightgray;" placeholder="  To"
                  <?php if(isset($_GET["price2"])){echo $_GET["price2"];} ?>>

              </li>
            </ul>
        </div>


                <!-- end of price input box -->




        <!--         start of rating category -->

        <div class="category-product" style="margin-top: 20px;">
          <p class="cat-head"> <em> Rating
              <hr style="color: cadetblue; width: 230px; height: 5px;">
            </em></p>

          <ul class="list-group">
            <li class="list-group-item">
              <input type="checkbox" id="rating1" name="rating[]" value="1"
              <?php if(isset($_GET["rating"]) && (in_array('1',$_GET["rating"]))){echo 'checked="checked"';}?>>
              <span class="fa fa-star checked"></span>
            </li>
            <li class="list-group-item">
              <input type="checkbox" id="rating1" name="rating[]" value="2"
              <?php if(isset($_GET["rating"]) && (in_array('2',$_GET["rating"]))){echo 'checked="checked"';}?>>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
            </li>
            <li class="list-group-item">
              <input type="checkbox" id="rating1" name="rating[]" value="3"
              <?php if(isset($_GET["rating"]) && (in_array('3',$_GET["rating"]))){echo 'checked="checked"';}?>>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
            </li>
            <li class="list-group-item">
              <input type="checkbox" id="rating1" name="rating[]" value="4"
              <?php if(isset($_GET["rating"]) && (in_array('4',$_GET["rating"]))){echo 'checked="checked"';}?>>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
            </li>
            <li class="list-group-item">
              <input type="checkbox" id="rating1" name="rating[]" value="5"
              <?php if(isset($_GET["rating"]) && (in_array('5',$_GET["rating"]))){echo 'checked="checked"';}?>>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
            </li>
          </ul>

        </div>

        <!--         end of star category -->
        <br>


        <button type="submit" class="btn btn-outline-success" name="filter" style="margin-left: 10px;">Filter</button>
        </form>
      </nav>



      <!-- Page Content  -->
      <div id="content">


        <!--start of header -->
        <div class="container" style="margin-top: 40px;">
          <div class="row">
            <div class="col-3">
              <div class="banner1" style="margin-left:20px;">
                <div class="d-sm-none d-md-block d-none d-sm-block">
                  <img src="images/123.jpg" class="img-fluid" id="banners">
                </div>
              </div>
            </div>


            <div class="col-md-9" style="margin-bottom:50px;">
              <div class="banner2" style="margin-right:20px;">
                <div class="d-sm-none d-md-block d-none d-sm-block">
                  <img src="images/newbanner-1.jpg" class="img-fluid" id="banners">
                </div>
                <div class="d-flex align-items-center .d-md-none .d-lg-block">

                  <div class="banner-content">
                    <h1>Eat Healthy!</h1>
                    <h3>Your daily need products!</h3>
                    <br>
                    <a href="#" class="btn btn-dark">Buy now!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>




<!--     Added all these product boxes to check the alignnment properly  -->

        <div class="container d-flex justify-content-center mt-60">
          
          <div class="row">
          <?php 
          if(isset($_GET["filter"]))
          {
                 if(isset($_GET["search"]) && !empty($_GET["search"]))
                 {
                     $search =trim(strtoupper($_GET["search"]));
                     $_SESSION["search"] = $search;
                 }
                 
                $search = $_SESSION["search"];
                $query=  "select * from product where CONCAT(UPPER(PRODUCY_NAME),UPPER(PRODUCT_DESCRIPTION)) like '%$search%' and PRODUCT_STATUS ='1'";
                
                 
                 // filter by category
               if(isset($_GET["category"]) && !empty($_GET["category"]))
               {
                 $category=implode(",", $_GET['category']);
                 $query.=" and FK2_PRODUCT_CATEGORY_ID in($category) ";
               }

             // filter by shop
               if(isset($_GET["shopname"]) && !empty($_GET["shopname"]))
               {
                 $shop_id = implode(",", $_GET['shopname']);
                 $query.=" and FK1_SHOP_ID in($shop_id)";
               }

               // filter by maximum and minimum price
               if(!empty($_GET["price1"])){
                 $minimum = $_GET["price1"];
                 $query .= "and PRODUCT_PRICE >= $minimum";
               }

               if(!empty($_GET["price2"])){
                $maximum = $_GET["price2"];
                $query .= "and PRODUCT_PRICE <= $maximum";
               }

               
            


               $counter = 0;
              $result = oci_parse($connection,$query );
              if(oci_execute($result))
              {
                while(($row = oci_fetch_assoc($result)) != false)
                {
                  
                  $product_id = $row["PRODUCT_ID"];
                  $average_r = get_average_rating($product_id,$connection);
                  if(isset($_GET['rating']) && !empty($_GET['rating']))
                  {
                    if(!in_array($average_r,$_GET['rating']))
                    {
                      continue;

                    }
                  }
                  $Product_name = $row["PRODUCY_NAME"];
                  $Price = $row["PRODUCT_PRICE"];
                  $Quantity = $row["PRODUCT_STOCK"];
                  $Category_id = $row["FK2_PRODUCT_CATEGORY_ID"];
                  $image = $row["PRODUCT_IMAGE"];
                  $maximum = $row["MAXIMUM_ORDER"];
                  $minimun = $row["MINIMUM_ORDER"];
                  $PRODUCT_DESCRIPTION = $row["PRODUCT_DESCRIPTION"];
               ++$counter;
            ?>
            <div class="col-md-3" style="width:auto;">
              <div class="product-wrapper text-center">
                <div class="product-img"> <a href="productdetail.php?id=<?php echo $id;?>" data-abc="true"> <img src="./images/<?php echo $image ;?>" alt="">
                  </a>

                  <div class="product-img mt-10">
                    <br>
                    <a href="productdetail.php?id=<?php echo $id;?>" data-abc="true"
                      style="color:black; text-decoration: none;  font-family: 'Josefin Sans', sans-serif; font-size: 22px;">
                      <?php echo $Product_name ;?> </a> </div>
                  <div class="ratings">
                    <?php
                     $average_r = get_average_rating($product_id,$connection);
                     for($i=0;$i<$average_r;$i++)
                     { ?>

                      <i class="fa fa-star rating-color"></i>
                      <?php
                     }
                     for($i=0;$i<(5-$average_r);$i++)
                     {
                       ?>
                      <i class="fa fa-star"></i>
                      <?php
                     }
                    ?>
                     
                  </div>
                  </a>
                  <span class="text-center">
                    <span class="pound-sign"> £</span>
                    <?php echo $Price ;?> <br>
                  </span>
                  <div class="product-action" style="margin-bottom: 30px;">
                    <div class="product-action-style">
                      <a href="add_to_wishlist.php?id=<?php echo $product_id; ?>&page=shop.php"> <img src="images/icons/heart.png" alt="" srcset=""> </a>
                      <a href="add_to_cart.php?id=<?php echo $product_id; ?>&page=shop.php"> <img src="images/icons/shopping-bag.png" alt="" srcset=""> </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
                 }
                }
            }
              
          
            ?>

             <?php
          
              if($counter == 0)
              {
                ?>
                <div class="no_result_found">
                <!-- Chitikka banara no product found hala huss -->
                <p>No result found</p>
                </div>
                <?php
              }
            ?>
          
            
          </div>
        </div>
      </div>

      <!-- product box ENDs -->
    </div>



  </div>
  <br>
  </div>


  <script>
    $(function () {
      $("#price-range").slider({
        step: 500,
        range: true,
        min: 0,
        max: 20000,
        values: [0, 20000],
        slide: function (event, ui) {
          $("#priceRange").val(ui.values[0] + " - " + ui.values[1]);
        }
      });
      $("#priceRange").val($("#price-range").slider("values", 0) + " - " + $("#price-range").slider("values", 1));

    });
  </script>
</body>

</html>