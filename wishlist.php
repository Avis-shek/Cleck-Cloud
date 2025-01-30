<?php
include('session.php');
include('customer_header.php');

?>
<!doctype html>
<html lang="en">



  <!-- start of wishlist -->

  <br>

  <br>

<?php
if(!empty($_SESSION["user_id"]))
{
$counter = 0;
$user_id = $_SESSION["user_id"];
$query = "select * from WISHLIST_PRODUCT where FK2_USER_ID= $user_id";
$result = oci_parse($connection,$query);
if(oci_execute( $result))
{
  
  while(($row = oci_fetch_assoc($result)))
  {
    ++$counter;
  }
}
}
?>
  <div class="cart-titles">
    <div class="shopping-title"> YOUR WISHLIST </div>
    <span class="shopping-title-2"> There are
      <span>

        <?php
            if(!empty($counter)){echo  $counter;} else{echo "0";}
        ?>
      </span>

      products in your Wishlist.</span>

  </div>
  <br>
  <br>





  <div class="shopping-cart">

    <div class="column-labels">
      <label class="product-image">Image</label>
      <label class="product-details">Product</label>
      <label class="product-price">Price</label>
      <label class="product-status">Status </label>
      <label class="product-removal">Remove</label>
      <label class="product-action">Action</label>
</div>
<?php
 if(!empty($_SESSION["user_id"]))
 {
 $user_id = $_SESSION["user_id"];
 $query = "select * from WISHLIST_PRODUCT where FK2_USER_ID= $user_id";
 $result = oci_parse($connection,$query);
 if(oci_execute( $result))
 {
   while(($row = oci_fetch_assoc($result)))
   {
    $product_id = $row["FK1_PRODUCT_ID"];

    $Query = "select * from product where PRODUCT_ID = $product_id";
          $stid = oci_parse($connection,$Query);
          if(oci_execute($stid))
          {
            while(($row = oci_fetch_assoc($stid )) != false)
            {
              $name = $row["PRODUCY_NAME"];
              $image = $row["PRODUCT_IMAGE"];
              $price = $row["PRODUCT_PRICE"];
              $stock = $row["PRODUCT_STOCK"];
              $s=0;
      
 
?>
    <div class="product">
      <div class="product-image">
        <img src="images/<?php echo $image; ?>">
      </div>
      <div class="product-details">
        <div class="product-title"><?php echo $name; ?></div>
      </div>
      <div class="product-price"><?php echo $price; ?></div>
      <div class="product-status">
        <button class="instock-product"> <?php if($stock >0 ){ echo 'In Stock';} else{echo 'Out Of Stock';}?></button>
      </div>
      <div class="product-removal">
        <a href="delete_from_wishlist.php?id=<?php echo $product_id;?>&user=<?php echo $user_id;?>">
        <button class="remove-product">
          Remove
        </button>
        </a>
      </div>
      <div class="product-line-action">
        <a href="add_to_cart.php?id=<?php echo $product_id ; ?>&page=wishlist.php">
        <button class="instock-product"> Add to Cart</button>
        </a>
      </div>
   </div>
   <?php
      }
    }

}
}
}
   ?>

<div class="error_message">
            <?php 
              if(isset($_SESSION["cart_remove_message"]))
              {
                echo $_SESSION["cart_remove_message"];
                unset($_SESSION["cart_remove_message"]);
              }
              
              ?>
            </div>


            <style>
  
  .error_message{
  color:green;
  font-size: 2opx;
  text-align: center;
}

  <br>

  <br>


  <!-- footer-->



  <div class="container">

    <div class="row">

      <!-- Footer -->
      <footer class="text-center text-lg-start .bg-light" style="color:black">

        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
          <div class="container text-center text-md-start mt-5" style="font-family: 'Josefin Sans', sans-serif;">
            <!-- Grid row -->
            <div class="row mt-3">
              <!-- Grid column -->
              <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                <!-- Content -->
                <h6 class="text-uppercase fw-bold mb-4">
                  <i class="fas fa-gem "></i>Cleck Cloud
                </h6>
                <p>
                  CleckCloud platform provides local traders to showcase their products into a whole new marketplace,
                  increasing their profits and bringing them to a wider spectrum of suburb citizens.
                </p>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">
                  Pages
                </h6>
                <p>
                  <a href="#!" class="text-reset"> Home </a>
                </p>
                <p>
                  <a href="#!" class="text-reset">About Us</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">Shop by Category</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">Contact Us</a>
                </p>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">
                  Category
                </h6>
                <p>
                  <a href="#!" class="text-reset">Fish Monger</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">Meat</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">??</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">??</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">??</a>
                </p>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">
                  Contact
                </h6>
                <p><i class="fas fa-home me-3"></i> Cleckhauuderfaux, West Yorkshire </p>
                <p>
                  <i class="fas fa-envelope me-3"></i>
                  cleckcloudservice@gmail.com
                </p>
                <p><i class="fas fa-phone me-3"></i> + 12 34 56 78 90</p>
                <p><i class="fas fa-print me-3"></i> + 12 34 56 78 90</p>
              </div>
              <!-- Grid column -->
            </div>
            <!-- Grid row -->
          </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
          © 2022 Copyright:
          <a class="text-reset fw-bold" href="https://mdbootstrap.com/">cleckcloud.com</a>
        </div>
        <!-- Copyright -->
      </footer>
      <!-- Footer -->


    </div>


  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


  <!-- end -->
  </div>
  </div>


  <script>
    /* Set rates + misc */
    var disRate = 20.05;
    var fadeTime = 300;

    /* Assign actions */
    $(".product-quantity input").change(function () {
      updateQuantity(this);
    });

    $(".product-removal button").click(function () {
      removeItem(this);
    });

    /* recalculate cart */
    function recalculateCart() {
      var subtotal = 0;

      /* sum up row totals */
      $(".product").each(function () {
        subtotal += parseFloat($(this).children(".product-line-price").text());
      });

      /* calculate totals */
      var dis = subtotal - disRate;
      var total = subtotal - dis;

      /* update totals display */
      $(".totals-value").fadeOut(fadeTime, function () {
        $("#cart-subtotal").html(subtotal.toFixed(2));
        $("#cart-tax").html(dis.toFixed(2));
        $("#cart-total").html(total.toFixed(2));
        if (total == 0) {
          $(".checkout").fadeOut(fadeTime);
        } else {
          $(".checkout").fadeIn(fadeTime);
        }
        $(".totals-value").fadeIn(fadeTime);
      });
    }

    /* update quantity */
    function updateQuantity(quantityInput) {
      /* calculate line price */
      var productRow = $(quantityInput).parent().parent();
      var price = parseFloat(productRow.children(".product-price").text());
      var quantity = $(quantityInput).val();
      var linePrice = price * quantity;

      /* update line price display and recalc cart totals */
      productRow.children(".product-line-price").each(function () {
        $(this).fadeOut(fadeTime, function () {
          $(this).text(linePrice.toFixed(2));
          recalculateCart();
          $(this).fadeIn(fadeTime);
        });
      });
    }

    /* remove item from cart */
    function removeItem(removeButton) {
      /* remove row from DOM and recalc cart total */
      var productRow = $(removeButton).parent().parent();
      productRow.slideUp(fadeTime, function () {
        productRow.remove();
        recalculateCart();
      });
    }
  </script>


  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>


</body>
</html>