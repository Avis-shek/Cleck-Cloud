<?php
include('session.php');
include('connection.php');
include('functions.php');
        $user_id = $_SESSION["user_id"];
        $username = $_SESSION["username"];
        $name = $_SESSION["name"];
        $gmail = $_SESSION["gmail"];
        $contact = $_SESSION["contact"];
        $birthdate = $_SESSION["birthdate"];
        $image = $_SESSION["user_image"];
        
   ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cleck Cloud</title>

    <!-- link to css -->
    <link rel="stylesheet" href="style8.css">



    <!-- for google font -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200&family=Merriweather&family=Montserrat&family=Sacramento&display=swap"
        rel="stylesheet">



    <!-- link to bootstrap -->


    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">



    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>



    <!-- start of trader dashboard container  -->

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="images/finallogo.png" alt="Cleck Cloud Logo">
            </div>

            <ul class="list-unstyled components">


                <div class="ppimage">
                    <div class="control-group file-upload" id="file-upload1">
                        <div class="image-box text-center">
                            <img src="images/<?php echo $image;?>" alt="" class="imgupload">
                        </div>
                        
                    </div>
                </div>

                <div class="trader-name">

                    <p class="text-center" id="text2" style="color: black;">Welcome <?php echo $name; ?></p>

                </div>
                <li>
                    <a href="customerdash1.php" class="traderui"> Account </a>
                    <hr>
                </li>

                <li>
                    <a href="../shopcart3.php" class="traderui">View Cart </a>
                    <hr>
                </li>

                <li>
                    <a href="../wishlist.php" class="traderui">My Saved Items </a>
                    <hr>
                </li>
                <li class="active">
                    <a href="customerdash2.php" class="traderui">Order History</a>
                    <hr>
                </li>

                <li>
                    <a href="customerdash5.php" class="traderui">Account Setting </a>
                    <hr>
                </li>

                <li>
                    <a href="customerdash6.php" class="traderui">Reset Password </a>
                    <hr>
                </li>

            </ul>



        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>

                    <div class="navitems">

                        <a href="../index.php" class="navitems" style="text-decoration: none;"> Back to Home</a>
                       
                       
                       </div>


                </div>
            </nav>




            <div class="container">

                <div class="row">

                    <div class="col-md-12">



                        <h2 class="trader-profile"> Orders</h2>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                    
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Price</th>
                                    <th scope="col">Product Quantity</th>
                                    <th scope="col">Shop Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Invoice</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                            <?php
                            $counter =1;
                                $query = "select * from payment where FK2_USER_ID = $user_id ";
                                $result = oci_parse($connection,$query);
                                if(oci_execute($result))
                                {
                                    while(($row = oci_fetch_assoc($result))!=false)
                                    {
                                        $order_id = $row["FK1_ORDER_ID"];
                                        $amount = $row["PAYMENT_AMOUNT"];
                                        $date = $row["PAYMENT_DATE"];
                                        $invoice = $row["FK1_ORDER_ID"];
                             
                                        $status = get_product_status($connection,$order_id);
                                        $quantity = get_product_quantity($connection,$order_id);
                                        $product_id = get_product_id($connection,$order_id);
                                        $product_name = get_product_name($connection,$product_id);
                                        if(empty($product_name))
                                        {
                                            continue;
                                        }
                                        $shop_name = get_shop_name($connection,$product_id);
                                  
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $counter;?></th>
                                    <td><?php echo $product_name;?></td>
                                    <td><?php echo $amount;?></td>
                                    <td><?php echo $quantity;?></td>
                                    <td><?php echo $shop_name;?></td>
                                    <td><?php echo $date;?></td>
                                    <td><?php echo $invoice;?></td>
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