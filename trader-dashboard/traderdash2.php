<?php
include('trader_header.php')
?>
<!doctype html>
<html lang="en">
</body>



            <!-- Start of View Order Table  -->

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="trader-profile">View Order</h2>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Price</th>
                                    <th scope="col">Product Quantity</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Recieving Day</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $shop_id = array();
                            $shop_id=shopid_key($connection);

                            $counter =1;
                            $user_id = $_SESSION["user_id"];
                                $query = "select * from payment";
                                $result = oci_parse($connection,$query);
                                if(oci_execute($result))
                                {
                                    while(($row = oci_fetch_assoc($result))!=false)
                                    {
                                        $order_id = $row["FK1_ORDER_ID"];
                                        $amount = $row["PAYMENT_AMOUNT"];
                                        $date = $row["PAYMENT_DATE"];
                                        $invoice = $row["FK1_ORDER_ID"];
                                        $customer = $row["FK2_USER_ID"];

                                        

                                        $product_id = get_product_id($connection,$order_id);
                                        if(!empty($product_id))
                                        {
                                           $shop = get_shop_id($connection,$product_id);
                                           if(!empty($shop))
                                            {
                                                if(!in_array($shop,$shop_id))
                                                {
                                                  continue;
                            
                                                }
                                            }
                                        }
                                        $day = get_day($connection,$order_id);
                                        $status = get_product_status($connection,$order_id);
                                        $quantity = get_product_quantity($connection,$order_id);
                                        if(empty($quantity))
                                        {
                                            continue;
                                        }
                                        $product_name = get_product_name($connection,$product_id);
                                        $customer_name = get_customer_name($connection,$user_id);
                                        $time = get_time($connection,$order_id);
                                        $price = get_product_price($connection,$product_id);
                                  
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $counter;?></th>
                                    <td><?php echo $customer_name;?></td>
                                    <td><?php echo $product_name;?></td>
                                    <td><?php echo $price;?></td>
                                    <td><?php echo $quantity;?></td>
                                    <td><?php echo $time;?></td>
                                    <td><?php echo $day;?></td>
                                    <td><?php echo $status;?></td>
                              
                                </tr>
                                <?php
                                ++$counter;
                                 }
                                }
                                ?>


                               
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

               <!-- End of View Order Table  -->

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