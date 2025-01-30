<?php
include('session.php');
include('connection.php');

if(!empty($_GET["id"]))
{
    if(!empty($_SESSION["username"]))
    {

        $purchase = 0;
        $id = $_GET["id"];
        if(!empty($id))
        {
            $Query = "select MINIMUM_ORDER from product where PRODUCT_ID = $id";
            $result = oci_parse($connection,$Query);
            if(oci_execute($result))
            {
                while(($row = oci_fetch_assoc($result)) != false)
                {
                    $quantity = $row["MINIMUM_ORDER"];
                }
            }
        }
        $page = $_GET["page"];
        $user_id = $_SESSION["user_id"];
        $querys = "select * from CART_PRODUCT where fk1_product_id=$id and fk2_user_id = $user_id and purchase='0'";
        $counter = 0;
        $stid = oci_parse($connection,$querys);
        if(oci_execute($stid))
        {
            $counter = 0;
            while(($row = oci_fetch_assoc($stid )) != false)
            {
                $unit = $row["PRODUCT_QUANTITY"];
                ++$counter;
            }
        }
        if($counter == 0)
        {
            $query = "insert into CART_PRODUCT (fk1_product_id,fk2_user_id,product_quantity,purchase) 
            values (:product_id,:user_id,:quantity,:p)";
            $result = oci_parse($connection, $query);
    
            oci_bind_by_name($result, ':product_id', $id);
            oci_bind_by_name($result, ':user_id', $user_id);
            oci_bind_by_name($result, ':quantity', $quantity);
            oci_bind_by_name($result, ':p', $purchase);
            if(oci_execute($result))
            {
                header('location: '.$page);
            }
        }
        else{
            $unit = $unit + 1;
            $query = "update CART_PRODUCT set product_quantity = $unit where fk1_product_id=$id and fk2_user_id=$user_id and purchase = 0";
            $result = oci_parse($connection,$query);
            if(oci_execute($result))
            {
                header('location: '.$page);
            }
        }


    }
    else{
        header('location: login.php');
    }

}
?>