<?php
include('connection.php');
include('session.php');
include('functions.php');
$day = $_GET["d"];
$time = $_GET["t"];
$order_date = date("d-m-Y");
$COUNTER=0;

$user_id = $_SESSION["user_id"];
$query = "select * from CART_PRODUCT where fk2_user_id= $user_id and purchase = 0";
$result = oci_parse($connection,$query);
if(oci_execute($result))
{
    while(($row = oci_fetch_assoc($result))!= false)
    {
        $cart_id = $row["CART_PRODUCT_ID"];
        $product_id = $row["FK1_PRODUCT_ID"];
        $quantity = $row["PRODUCT_QUANTITY"];

        $discount =get_discount_rate($connection,$product_id);
        

        $Query = "select * from product  where PRODUCT_ID= $product_id";
        $stid = oci_parse($connection,$Query);
        if(oci_execute($stid))
        { 
          while(($row = oci_fetch_assoc($stid )) != false)
          {
            $price = $row["PRODUCT_PRICE"];
            
            $total = ($price - (($price * $discount )/100))* $quantity;
           
        
       

        $q="select * from COLLECTION_SLOT where collection_day='$day' and collection_time='$time'";
        $r=oci_parse($connection,$q);
        if(oci_execute($r))
        {
            while(($row = oci_fetch_assoc($r)))
            {
                $collectionslot_id = $row["COLLECTIONSLOT_ID"];
                
            }
        
        
        $sql = "insert into PROD_ORDER(order_date,order_status,fk1_cart_product_id,fk2_collectionslot_id)
        values(to_date(:order_date,'DD/MM/YYYY'),:status,:cart_id,:slot_id)";
        $insert =oci_parse($connection,$sql);
        $status ="PROCESSING";
        $order_date = date("d-m-Y");
    
        oci_bind_by_name($insert, ':order_date', $order_date);
        oci_bind_by_name($insert, ':status', $status);
        oci_bind_by_name($insert, ':cart_id', $cart_id);
        oci_bind_by_name($insert, ':slot_id', $collectionslot_id);

       if(oci_execute($insert))
         {
        $orderid ="select * from PROD_ORDER where fk1_cart_product_id=$cart_id";
        $resul = oci_parse($connection,$orderid);
        if(oci_execute($resul))
        {
            while(($row = oci_fetch_assoc($resul)))
            {
                $order_id = $row["ORDER_ID"];
            }

          $orderdetail ="insert into ORDER_DETAILS(product_quantity,fk1_order_id,fk2_product_id)
          values(:quantity,:order_id,:product_id)";
          $insert = oci_parse($connection,$orderdetail);

          oci_bind_by_name($insert, ':quantity',$quantity);
          oci_bind_by_name($insert, ':order_id',$order_id);
          oci_bind_by_name($insert, ':product_id',$product_id);

          if(oci_execute($insert))
          {

          $payment = "insert into PAYMENT (payment_amount,payment_date,payment_method,fk1_order_id,fk2_user_id)
          values(:amount,to_date(:pay_date,'DD/MM/YYYY'),:method,:fk1_order_id,:fk2_user_id)";
          $insert=oci_parse($connection,$payment);
          $method ="PAYPAL";
          
          oci_bind_by_name($insert, ':amount',$total);
          oci_bind_by_name($insert, ':pay_date',$order_date);
          oci_bind_by_name($insert, ':method',$method);
          oci_bind_by_name($insert, ':fk1_order_id',$order_id);
          oci_bind_by_name($insert, ':fk2_user_id',$user_id);

          oci_execute($insert);
         
          
          $update = "update cart_product set purchase=1 where CART_PRODUCT_ID=$cart_id";
          $parse = oci_parse($connection,$update)   ;
          oci_execute($parse);

          ++$COUNTER;
          $_SESSION["COUNTER"] = $COUNTER;
          
          
         }
        }

    }
}
        }
}

}


 
 header('location:invoice.php');
  

}
?>

