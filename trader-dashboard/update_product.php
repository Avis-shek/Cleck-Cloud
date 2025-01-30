<?php
include('session.php');
include('connection.php');
if(isset($_POST['update_product']))
{
    if(!empty($_POST["product_name"])
    && !empty($_POST["price"])
    && !empty($_POST["quantity"])
    && !empty($_POST["option"])
    && !empty($_POST["description"])
    && !empty($_POST["minimum"])
    && !empty($_POST["maximum"])
    && !empty($_POST["id"])
    )
    { 
      
      $product_id = $_POST["id"];
      $product = strtoupper($_POST["product_name"]);
      $price = $_POST["price"];
      $quantity = $_POST["quantity"];
      $option = $_POST["option"];
      $description = strtoupper($_POST["description"]);
      $minimum = $_POST["minimum"];
      $maximum = $_POST["maximum"];
      $image = $_POST["image"];
      if(!empty($_FILES['file']['name']))
      {
        $image = $_FILES['file']['name'];
        $target_dir = "images/";
        $target_file = $target_dir . basename($image);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $extensions_arr = array("jpg","jpeg","png","gif","svg");
        $userID = $_SESSION["user_id"];
        
        if( in_array($imageFileType,$extensions_arr)){
        
          if(move_uploaded_file($image,$target_dir.$image)){

      }
    }
    else{
      $_SESSION['image_extension']="This image extension does not support";
      header("location: trader_product.php");
    }
      }
      
      $query = "select * from product where UPPER(PRODUCY_NAME)='$product' and product_id != $product_id" ;
      $result = oci_parse($connection,$query);
      if(oci_execute($result))
      {
        $total_result=0;
        while(($row = oci_fetch_array($result)) != false)
          {
             ++$total_result;
          }
          if($total_result == 0)
          {
            $query = "update product 
            set producy_name='$product',product_price =$price, product_stock=$quantity, fk2_product_category_id =$option,
            product_description='$description',minimum_order=$minimum, maximum_order=$maximum, product_image='$image'
            where product_id = $product_id";
            $result = oci_parse($connection,$query);
            if(oci_execute($result))
            {
              if(oci_num_rows($result) != false)
              {
                  $_SESSION['update_message'] = "Item updated Successfully";
                  header("location: trader_product.php");
              }
            }
          }
          else{
            $_SESSION["product_error_message"] = "Duplicate product name.";
            header("location: trader_product.php");
          }
      }
   
    else{
      $_SESSION['image_extension']="This image extension does not support";
        header('location: trader_product.php');
    }
   
}
    else{
        $_SESSION['empty_message'] = "Feild with * must be filled.";
        header("location: trader_product.php");
    }
}
?>