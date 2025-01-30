<?php
include('session.php');
include('connection.php');
 
if(isset($_GET["id"]))
{
    $shop_id = $_GET["id"];
    $query = "delete from product where FK1_SHOP_ID = $shop_id";
    $result = oci_parse($connection,$query);
    oci_execute($result);
    
    $query = "delete from shop where SHOP_ID = $shop_id";
    $result = oci_parse($connection,$query);
    if(oci_execute($result))
    {
        if(oci_num_rows($result) != false)
        {
            header('location: traderdash8.php');
        }
    }
}
?>