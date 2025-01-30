<?php 
include('session.php');
include('connection.php');
if(!isset($_SESSION["username"]))
{
    header('location:../login.php');
}
$userID = $_SESSION["user_id"];
$query = "select USER_IMAGE from cleck_user where USER_ID = $userID";
$result = oci_parse($connection,$query);
if(oci_execute($result))
{
    while( ($row = oci_fetch_array($result)) != false)
    {
       $image = $row["USER_IMAGE"];
    }
}
include('functions.php');
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cleck Cloud</title>

    <!-- link to css -->
    <link rel="stylesheet" href="style7.css">

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
                <img src="./images/finallogo.png" alt="Cleck Cloud Logo">
            </div>
            <ul class="list-unstyled components">

             <!-- Image upload  -->
             <form action="upload_image.php" method = "post" enctype='multipart/form-data' >
                <div class="ppimage">
                    <div class="control-group file-upload" id="file-upload1">
                        <div class="image-box text-center">
                            <img src="./images/<?php 
                            if(!empty($image))
                             {
                                echo $image;}?>"  alt="" class="imgupload">
                        </div>
                       
                      
              
                    </div>
                </div>
              </form>

                <div class="trader-name">
                    <p class="text-center" id="text2" style="color: black;">Welcome <?php echo $_SESSION["name"];?></p>
                </div>


                <li class="active">
                    <a href="traderdash1.php" class="traderui"> Account </a>
                    <hr>
                </li>

                <li>
                    <a href="traderdash2.php" class="traderui">View Order </a>
                    <hr>
                </li>
                <li>
                    <a href="traderdash3.php" class="traderui">Add Product</a>
                    <hr>
                </li>

                <li>
                    <a href="traderdash4.php" class="traderui">Manage Product</a>
                    <hr>
                </li>

                <li>
                    <a href="traderdash7.php" class="traderui">Add Shop</a>
                    <hr>
                </li>


                <li>
                    <a href="traderdash8.php" class="traderui"> Manage Shop</a>
                    <hr>
                </li>


                <li>
                    <a href="traderdash5.php" class="traderui">Account Setting </a>
                    <hr>
                </li>

                <li>
                    <a href="traderdash6.php" class="traderui">Reset Password </a>
                    <hr>
                </li>


            </ul>

        </nav>

        <!-- Top Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>

                    <div class="logout">
                        <span> <a href="../logout.php" style="color:black;">
                                Logout <img src="./images/logout.png" alt=""> </a> </span>
                        </a> </span>
                    </div>

                </div>
            </nav>
</body>
</html>