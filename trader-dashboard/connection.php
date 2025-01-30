
<?php
    $connection = oci_connect('avishek_c7261095', 'AVI3shek4', '//localhost/xe'); 
    if (!$connection) {
    $m = oci_error();
    echo "Can not connect to the database" .$m['message'], "\n";
    exit; } 
    //  oci_close($conn); 
     ?>
