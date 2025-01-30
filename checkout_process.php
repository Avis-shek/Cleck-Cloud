//<?php
if(isset($_POST["checkout"]))
{
    $day = $_POST["day"];
    $time=$_POST["time"];
    $total = $_POST["total"];
    $timestamp =  strtotime($day);
    $day = date('D', $timestamp); 
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cleck Cloud</title>
</head>
<body>
<?php
?>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST" id="buyCredits" name="buyCredits">

<input type="hidden" name="business" value="sb-uwd47b16508896@business.example.com"/>

<input type="hidden" name="cmd" value="_xclick" />

<input type="hidden" name="amount" value="<?php echo $total?> " />

<input type="hidden" name="currency_code" value="USD" />

<input type="hidden" name="return" value="http://localhost/finalportfolio/after_payment.php?d=<?php echo$day;?>&t=<?php echo $time;?>&ta=<?php echo $total;?>"/>
</form>

<script>
document.getElementById("buyCredits").submit();
</script>
</body>
<!-- Email ID:
sb-14kgq16513490@personal.example.com
System Generated Password:
9%17b*&A -->
</html>

