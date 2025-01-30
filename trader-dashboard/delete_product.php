<?php
include('session.php');
include('connection.php');
include('functions.php');
if(isset($_GET["id"]))
{
    $product_id = $_GET["id"];
    // if(check_product_inorder($connection,$product_id)== true)
    // {   $cart_id = get_cart_id($connection,$product_id);
    //     $order_id = get_order_id($connection,$cart_id);
    //     $sq = "delete from order_details where FK2_PRODUCT_ID=$product_id and FK1_ORDER_ID=$order_id";
    //     $s= oci_parse($connection,$sq);
    //     oci_execute( $s);
    // }
    // if(check_product_incart($connection,$product_id) == true)
    // {
    //     $cart_id = get_cart_id($connection,$product_id);
    //     if(check_cart_inorder($connection,$cart_id)==true)
    //     {
    //         $order_id = get_order_id($connection,$cart_id);
    //         if(check_order_inpayment($connection,$order_id) == true)
    //         {
    //             $sql2 = "delete from payment where FK1_ORDER_ID =$order_id ";
    //             $r2 = oci_parse($connection,$sql2);
    //             oci_execute($r2);
    //         }

    //     $sql1= "delete from prod_order where FK1_CART_PRODUCT_ID =$cart_id";
    //     $q1 = oci_parse($connection,$sql1);
    //     oci_execute($q1);
    //     }

    //     $sql = "delete from cart_product where FK1_PRODUCT_ID=$product_id";
    //     $q= oci_parse($connection,$sql);
    //     oci_execute( $q);
    // }

    // if(check_product_inwishlist($connection,$product_id) == true)
    // {
    //     $sql3 = "delete from wishlist_product where FK1_PRODUCT_ID =$product_id";
    //     $r3 = oci_parse($connection,$sql3);
    //     oci_execute( $r3);

    // }


    $query = "update product set PRODUCT_STATUS='2' where product_id = $product_id";
    $result = oci_parse($connection,$query);
    if(oci_execute($result))
    {
        if(oci_num_rows($result) != false)
        {
            $_SESSION['deleted_message'] = "Deleted Successfully";
            header("location: traderdash4.php");
        }
    }
    

}
?>