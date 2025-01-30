<?php
include('session.php');
include('functions.php');
include('connection.php');
?>

<!doctype html>
<html lang="en">
<?php
include('customer_header.php');
?>


<!--start of header -->
<div class="container" style="margin-top:20px">
      <div class="row">
        <div class="col-3">
          <div class="banner1">
            <div class="d-sm-none d-md-block d-none d-sm-block">
              <img src="images/banner1.gif" class="img-fluid" id="banners">
            </div>
          </div>
        </div>



        <div class="col-md-9" style="margin-bottom:50px;">
          <div class="banner2" style="margin-right:20px;">
            <img src="images/newbanner.gif" class="img-fluid" id="banners">
            <div class="d-flex align-items-center">
              <div class="banner-content">
                <h1 class="bannerc1">Fresh and Organic.</h1>
                <h3 class="bannerc2">Your daily need products!</h3>
                <br>
                <a href="shop.php" class="btn btn-dark">Get started.</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>



  <div class="container">
    <div class="row">
      <div class="category-head" style="margin-bottom:20px">
        <h1> Shop by Category </h1>
      </div>
      <div class="col-lg-12">
        <div class="new-category">
          <ul class="nav product-tab-nav " id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a id="vegetable-tab"  href="shop.php" role="tab" aria-controls="vegetable"
                aria-selected="false" style="text-decoration: none;">
                <div class="product-tab-icon">
                  <img src="images/category-icon/1.png" alt="Product Icon" style="margin-left: 10px;">
                </div>
                <div class="category-icon-items">All Items</div>
              </a>
            </li>

            <li class="nav-item" role="presentation">
              <a id="vegetable-tab"  href="shop.php?category[]=1" role="tab" aria-controls="vegetable"
                aria-selected="false" style="text-decoration: none;">
                <div class="product-tab-icon">
                  <img src="images/category-icon/2.png" alt="Product Icon" style="margin-left: 10px;">
                </div>
                <div class="category-icon-items">Fruits</div>
              </a>
            </li>

            <li class="nav-item" role="presentation">
              <a id="vegetable-tab"  href="shop.php?category[]=2" role="tab" aria-controls="vegetable"
                aria-selected="false" style="text-decoration: none;">
                <div class="product-tab-icon">
                  <img src="images/category-icon/3.png" alt="Product Icon" style="margin-left: 10px;">
                </div>
                <div class="category-icon-items">Vegetable</div>
              </a>
            </li>

            <li class="nav-item" role="presentation">
              <a id="vegetable-tab"  href="shop.php?category[]=3" role="tab" aria-controls="vegetable"
                aria-selected="false" style="text-decoration: none;">
                <div class="product-tab-icon">
                  <img src="images/category-icon/4.png" alt="Product Icon" style="margin-left: 10px;">
                </div>
                <div class="category-icon-items">Meat</div>
              </a>
            </li>

            <li class="nav-item" role="presentation">
              <a id="vegetable-tab"  href="shop.php?category[]=4" role="tab" aria-controls="vegetable"
                aria-selected="false" style="text-decoration: none;">
                <div class="product-tab-icon">
                  <img src="images/category-icon/5.png" alt="Product Icon" style="margin-left: 10px;">
                </div>
                <div class="category-icon-items">Bakery Item</div>
              </a>
            </li>

           
            
          </ul>
        </div>
<body style="background-color:white;">
        <br>
        <br>

        <!-- start of product area -->
        <div class="product-area product-style-2 section-space-y-axis-100">
          <div class="container">
            <div class="section-title text-center pb-55">
              <div class="category-head" style="margin-bottom:20px">
                <h1> New Arrival! </h1>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container d-flex justify-content-center mt-60">
      <div class="row">
      <?php
               $query = "select * from  ( select * from product where PRODUCT_STATUS ='1'order by PRODUCT_ID desc ) where ROWNUM <= 4";
              $result = oci_parse($connection,$query);
              if(oci_execute($result ))
              {
                while(($row = oci_fetch_assoc($result)) != false)
                {
                  $id = $row["PRODUCT_ID"];
                  $name = $row["PRODUCY_NAME"];
                  $image = $row["PRODUCT_IMAGE"];
                  $price = $row["PRODUCT_PRICE"];

                  $discountc =0;
                  $Query = "select * from discount  where FK1_PRODUCT_ID= $id";
                  $stid = oci_parse($connection,$Query);
                  if(oci_execute($stid))
                  { 
                    while(($row = oci_fetch_assoc($stid )) != false)
                    {
                      $discount = $row["DISCOUNT_PERCENT"];
                      ++$discountc;
                      
                    }
                  }

          ?>
        <div class="col-md-3 "style="width:auto;">
          <div class="product-wrapper text-center">
             
            <div class="product-img"> <a href="productdetail.php?id=<?php echo $id;?>" data-abc="true"> <img src="images/products/<?php echo $image ; ?>" alt="">
              </a>

              <div class="product-img mt-10">
                <br>
                <a href="productdetail.php?id=<?php echo $id;?>" data-abc="true"
                  style="color:black; text-decoration: none;  font-family: 'Josefin Sans', sans-serif; font-size: 22px;">
                  <?php echo $name ?> </a>
              </div>
 
              
              <span class="text-center">
                <span class="pound-sign"> $</span>
                <?php echo $price ; ?><br>
              </span>

              <?php if($discountc!=0){?>
              <span class="text-center">
                <span>
                
              <?php echo $discount."% OFF" ; }?><br>
                  </span>
                  </span>
             

             

              <div class="product-action" style ="width:100%; right:20%;" >
                <div class="product-action-style">
                  <a href="add_to_wishlist.php?id=<?php echo $id ; ?>&page=index.php"> <img src="images/icons/heart.png" alt="" srcset=""> </a>
                  <a href="add_to_cart.php?id=<?php echo $id ; ?>&page=index.php"> <img src="images/icons/shopping-bag.png" alt="" srcset=""> </a>
                </div>
              </div>
            </div>
         

          </div>
         
        </div>

        <?php
         }
        }
      
    
           ?>

        
      </div>
    </div>
  


  <!-- end of product area-->

  <br> <br>

  <div class="row">
    <div class="col-md-6">
      <div class="card" style="height: 280px;">
        <div class="card-body" style="background-image: url(images/mini-banner1.jpg);">

          <h2 class="card-title"> Fresh from the Farmer's Market </h2>
          <p class="card-text">Brought to your homes.</p>
          <a href="shop.php" class="btn btn-dark">Shop now!</a>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card" style="height: 280px;">
        <div class="card-body" style="background-image: url(images/mini-banner2.jpg);">
          <h2 class="card-title">100% Organic</h2>
          <p class="card-text">Natural freshly blended juice</p>
          <a href="shop.php" class="btn btn-dark">Shop now!</a>
        </div>
      </div>
    </div>
  </div>

  <br>


  <br>

  <br>


  <div class="product-area product-style-2 section-space-y-axis-100">
    <div class="container">
      <div class="section-title text-center pb-55">
        <div class="category-head" style="margin-bottom:20px">
          <h1> Top Rated Products! </h1>
        </div>

      </div>
    </div>
  </div>
  </div>
  </div>
  <!-- 
  start of top rated products -->
  <?php


  ?>

  <div class="container d-flex justify-content-center mt-60">
    <div class="row">

         <?php
             $query = "SELECT a.* FROM(SELECT PRODUCT_ID,PRODUCT_PRICE,PRODUCY_NAME, COUNT_SUM/COUNT_TOTAL AS AVERAGE FROM (SELECT COUNT(*) AS COUNT_TOTAL,P.PRODUCT_ID,PRODUCT_PRICE,PRODUCY_NAME ,SUM(REVIEW_RATING) AS COUNT_SUM FROM PRODUCT P JOIN REVIEW R ON FK1_PRODUCT_ID = P.PRODUCT_ID WHERE PRODUCT_STATUS='1' GROUP BY P.PRODUCT_ID, PRODUCT_PRICE,PRODUCY_NAME ) ORDER BY AVERAGE DESC)a  WHERE ROWNUM <= 4";
             $result = oci_parse($connection,$query);
             if(oci_execute( $result ))
             {
               while(($row= oci_fetch_assoc($result)) != false)
               {
                 $product_id = $row["PRODUCT_ID"];
                 $price = $row["PRODUCT_PRICE"];
                 $name = $row["PRODUCY_NAME"];
                 $image = get_product_image($connection,$product_id);
              

        ?>
      <div class="col-md-3" style="width:auto;">
        <div class="product-wrapper text-center">
          <div class="product-img"> <a href="productdetail.php?id=<?php echo $product_id;?>" data-abc="true"> <img src="images/<?php echo $image;?>" alt="">
            </a>

            <div class="product-img mt-10">
              <br>
              <a href="productdetail.php?id=<?php echo $product_id;?>" data-abc="true"


                style="color:black; text-decoration: none;  font-family: 'Josefin Sans', sans-serif; font-size: 22px;">
                <?php echo $name; ?> </a> </div>



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
              <?php echo  $price;?> <br>
            </span>
            <div class="product-action" style="margin-bottom: 30px;">
              <div class="product-action-style">
                <a href="add_to_wishlist.php?id=<?php echo $product_id ; ?>&page=index.php"> <img src="images/icons/heart.png" alt="" srcset=""> </a>
                <a href="add_to_cart.php?id=<?php echo $product_id ; ?>&page=index.php"> <img src="images/icons/shopping-bag.png" alt="" srcset=""> </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php
       }
       }
    ?>

     
      
    </div>
  </div>
  </div>



  <!-- top rates products END -->
  <br>
  <br>

  <!-- scenery background -->

  <div class="container">
    <div class="row">
      <div class="category-head-2" style="margin-bottom:20px">
        <h1> Bringing Local Farmers right to <br>
          your screen! </h1>
      </div>
      <div class="span4"></div>
      <div class="span4"><img class="center-block img-fluid" src="images/scenery.gif" style="border-radius: 30px;/></div>
    <div class=" span4></div>
    </div>
  </div>


  <!--         scenery background -->

  <br>

  <br>

  <br>

  <!-- lower ad -->

  

  <!-- lower ad -->
  <br>
  <br>

  <!-- footer-->

<?php
include('footer.php');
?>
  
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
</body>

</html>