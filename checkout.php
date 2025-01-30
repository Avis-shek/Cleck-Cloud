<!doctype html>
<html lang="en">
<?php
include('customer_header.php');
include('functions.php');
          
           $p_quantity = 0;
           $user_id = $_SESSION["user_id"];
           $query = "select * from CART_PRODUCT where fk2_user_id= $user_id and purchase=0";
           $result =oci_parse($connection,$query);
           if(oci_execute($result))
           {
             while(($row = oci_fetch_assoc($result)) != false)
             {
               $quantity = $row["PRODUCT_QUANTITY"];
               $p_quantity = $p_quantity + $quantity;
               
             }
            }
            if($p_quantity > 20)
            {
              $_SESSION["quantity_message"]= "Total product quantity can not be more than 20, Please remove some products or thier quantity to proceed forward.";
              ?><script>
            window.location.href = "shopcart3.php";
              die;
              </script>
              <?php
            }

?>






  <!--  end of header -->

  <br>
  <br>
  <br>

  <!-- cart items summary -->

  <div class="shopping-title"> Order Details </div>

  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>

              <th scope="col">Product Name</th>
              <th scope="col">Product Price</th>
              <th scope="col">Product Quantity</th>

            </tr>
          </thead>
          <tbody>
            <?php
            
            $counter =1;
            $total = 0;
           $user_id = $_SESSION["user_id"];
           $query = "select * from CART_PRODUCT where fk2_user_id= $user_id and purchase=0";
           $result =oci_parse($connection,$query);
           if(oci_execute($result))
           {
             while(($row = oci_fetch_assoc($result)) != false)
             {
               $product_id = $row["FK1_PRODUCT_ID"];
               $quantity = $row["PRODUCT_QUANTITY"];
               $discount = get_discount_rate($connection,$product_id);

               $query = "select * from product where PRODUCT_ID = $product_id";
               $stid = oci_parse($connection,$query);
               if(oci_execute($stid))
               {
                while(($row = oci_fetch_assoc($stid)) != false)
                {
                  $name = $row["PRODUCY_NAME"];
                  $image = $row["PRODUCT_IMAGE"];
                  $price = $row["PRODUCT_PRICE"];
                  $total = $total + (($price - ($price * $discount)/100) *$quantity );
                  
                  

             
            ?>
            <tr>
              <th scope="row"><?php echo $counter ;?></th>
              <td><?php echo $name ;?></td>
              <td><?php echo $price -(($price * $discount)/100) ;?></td>
              <td><?php echo $quantity ;?></td>
            </tr>
             <?php
             ++$counter;
              }
            }
          }
        }
             ?>

          
            
          </tbody>
        </table>

      </div>
    </div>
  </div>


  <br>


  <div class="price-title"> Total Price: £ <span><?php echo $total; ?></span> </div>
  </div>
  </div>
  </div>

  <br>

  <br>

  <br>


  <!-- cart items summary end -->

  <!-- start of checkout -->

  <div class="container">

    <div class="row">

      <div class="col-md-7">

        <form action="checkout_process.php" method="post">
          

          <div class="slot-title">Choose a collection slot: </div>

          <br>

          <p class="collecttxt"> Collection Day: 
         <input type="calender" id="datepicker" name="day" style="width:50%;" /></p>

          <label for="time" class="timetxt"> Collection Time: </label>
          <select name="time" id="time" name="time" style="background-color: white; width:50%;">
          
          <option value="10-13"> 10-13</option>
          <option value="13-16"> 13-16</option>
          <option value="16-19"> 16-19</option>

          </select>
          <input type="hidden" name="total" value="<?php echo $total; ?>">

      </div>

      <div class="offset-1 col-md-4" style="height:400px; background-color: white;">


        <div class="slot-title"> Payment: </div>



        <br>
<img src="images/paypal.png" alt="" srcset="">
<br>
        <br>
        <button class="btn btn-success" type="submit" name="checkout"> Checkout with PayPal </button>
        <br>
      </div>
      </form>

    </div>
  </div>



  <!-- footer-->
    <!-- jquery done for calender with past dates and non-collectable dates disabled. -->

    <script type="text/javascript">
    $(function () {


      // var date = new Date();
      // var currentMonth = data.getMonth();
      // var currentDate = data.getDate();
      // var currentYear = data.getFullyear();

      $("#datepicker").datepicker({

        minDate: 1,   // min date is 1 because order can only be processed after 24 hours
        // maxDate: 7,
        beforeShowDay: function (date) {

          var day = date.getDay();
          // minDate: new Date();

          // var dateToday = new Date();
          // minDate: dateToday;

          return [(day != 0 && day != 2 && day != 6 && day != 1)];

        }
      });
    });
  </script>

  <?php
  include('footer.php');
  ?>
  </div>
  </div>

</body>

</html>