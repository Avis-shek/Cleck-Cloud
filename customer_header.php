<?php
include("session.php");
include("connection.php");

if(!empty($_SESSION["user_role"]))
{
  if($_SESSION["user_role"] == "T")
  {
    header('location: login.php');
    die;
  }
    }
?>
<!doctype html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cleck Cloud</title>

  <!-- link to css -->
  <link rel="stylesheet" href="./stylesheet/stylenew.css">
  <link rel="stylesheet" href="./stylesheet/style6.css">
  <link rel="stylesheet" href="./stylesheet/style.css">
  <link rel="stylesheet" href="./stylesheet/stylews.css">
  <link rel="stylesheet" href="./stylesheet/stylesass2.css">
  <link rel="stylesheet" href="./stylesheet/style4.css">
  <link rel="stylesheet" href="./stylesheet/rating.css">
  <link rel="stylesheet" href="./stylesheet/style8.css">
  
  


   <!-- link to css libraries  -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
  <!-- for google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200&family=Merriweather&family=Montserrat&family=Sacramento&display=swap"
    rel="stylesheet">
<!-- link to bootstrap -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
  <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>

  </head>

<body>

  <div class="container-fluid">
    <div class="row">

      <!-- Start of Nav Bar -->

      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-logo" href="index.php"> <img src="images/finallogo.png" style="margin-left:30px" ; alt="Cleck Cloud Logo"> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </ul>
        </button>

 
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto" style="font-size: 17px;">
            <li class="nav-item dropdown me-3">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                All Category &nbsp; &nbsp; &nbsp;
              </a>
              <ul class="dropdown-menu  aria-labelledby=" navbarDropdown>
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
                <li><a class="dropdown-item" href="shop.php?category[]=<?php echo $category_id;?>"><?php echo $category_name;  ?></a></li>
                <?php
                     }
                    }
                ?>
                
              </ul>
            </li>

            <li class="nav-item">
              <form method ="get" action ="search.php" class="d-flex">
                <input class="form-control- me-3" style="width: 350px; border: 1px solid #ced4da; border-radius:3px"
                  type="search"  
                  value=" 
                  <?php
                  if(isset($_GET["search"]))
                  {
                   echo trim($_GET["search"] ," ");
                    } ?>"
                
                   placeholder ="Search Products..." name ="search" ria-label="Search">
                <button class="btn btn-outline-success" type="submit" name="filter">Search </button>
              </form>
            </li>


          </ul>

          <ul class="navbar-nav ms-auto">

            <li class="nav-item me-3">
              <?php
              if(!empty($_SESSION["name"]))
              {
                echo "<a href='./customer-dashboard/customerdash1.php' style='text-decoration: none;color: green; '>".$_SESSION["name"]."</a>";
              }
              ?>
              <div class="logindrop">
                <img src="images/icons/user.png" alt="user icon">
                <div class="loginc">
                  <div class="logincontent">
                    <?php
                    if(!empty($_SESSION["user_role"]))
                    { ?>
                        <a href="logout.php" class="loginlinks">LogOut</a>
                        <hr>
                        <a href="./customer-dashboard/customerdash1.php" class="loginlinks">Dashboard</a>
                    <?php }
                    else{ ?>
                         <a href="login.php" class="loginlinks"> Login
                    </a>
                    <hr>
                    <a href="newregister.php" class="loginlinks"> Register
                    </a>
                    <?php } ?>
                    
                    
                  </div>
                </div>
              </div>
            </li>

            <li class="nav-item me-3">
              <a href="wishlist.php" class="navbar-logo" id="smicons"> <img src="images/icons/heart.png"
                  alt="heart icon"> </a>
            </li>

            <li class="nav-item me-3">
              <a href="shopcart3.php" class="navbar-logo" id="smicons"> <img src="images/icons/shopping-bag.png"
                  alt="shopping-bag icon"> </a>
            </li>
        </ul>

       </div>

      </nav>

     <nav class="navbar-custom navbar-expand-lg navbar-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="navbar-nav mx-auto">
            <a class="nav-item nav-link me-3" href="index.php" id="second-nav-items">Home </a>
            <a class="nav-item nav-link me-3" href="aboutus.php" id="second-nav-items">Abouts Us</a>
            <a class="nav-item nav-link me-3" href="shop.php" id="second-nav-items">Shop</a>
            <a class="nav-item nav-link me-3s" href="contactus.php" id="second-nav-items">Contact Us</a>
          </div>
        </div>

        
      </nav>
    </div>
  </div>
  
  <br>
  <br>
    


<!--  end of header -->