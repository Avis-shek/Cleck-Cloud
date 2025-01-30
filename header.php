<?php
include('session.php');
include("connection.php");

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cleck Cloud</title>


  <!-- link to css -->
  <link rel="stylesheet" href="style4.css">



  <!-- for google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200&family=Merriweather&family=Montserrat&family=Sacramento&display=swap" rel="stylesheet">



  <!-- link to bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <header>


  <div class="container-fluid">

    <div class="row">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-logo"> <img src="images/finallogo.png" alt="Cleck Cloud Logo"> </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>

          </ul>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav mx-auto" style="font-size: 17px;">

            <li class="nav-item dropdown me-3">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                All Category &nbsp; &nbsp; &nbsp; 
              </a>
              <ul class="dropdown-menu  aria-labelledby=" navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>

            <li class="nav-item">

              <form class="d-flex">
                <input class="form-control- me-3" style="width: 350px; border: 1px solid #ced4da; border-radius:3px" type="search" placeholder="  Search Products..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search </button>
              </form>
            </li>
          </ul>


          <ul class="navbar-nav ms-auto">


            <li class="nav-item me-3">
              <a href="index3.html" class="navbar-logo" id="smicons"> <img src="images/icons/user.png" alt="user icon"> </a>
            </li>

            <li class="nav-item me-3">
              <a href="index3.html" class="navbar-logo" id="smicons"> <img src="images/icons/heart.png" alt="heart icon"> </a>
            </li>

            <li class="nav-item me-3">
              <a href="index3.html" class="navbar-logo" id="smicons"> <img src="images/icons/shopping-bag.png" alt="shopping-bag icon"> </a>
            </li>

          </ul>

        </div>


      </nav>


      <nav class="navbar-custom navbar-expand-lg navbar-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">


          <div class="navbar-nav mx-auto">
            <a class="nav-item nav-link me-3" href="#" id="second-nav-items">Home </a>
            <a class="nav-item nav-link me-3" href="#" id="second-nav-items">Abouts Us</a>
            <a class="nav-item nav-link me-3" href="#" id="second-nav-items">Shop</a>
            <a class="nav-item nav-link me-3s" href="#" id="second-nav-items">Contact Us</a>
          </div>
        </div>

    </div>
    </nav>

            </div>
          </div>
        </div>

      </div>
  </div>
  </header>
</body>
</html>
<!--  end of header -->