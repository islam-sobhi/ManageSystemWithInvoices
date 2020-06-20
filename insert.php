<?php


include('query/config.php'); 



   $cust=$_POST['customer'];
   $ordno=$_POST['invoice_no'];
   $date=$_POST['date'];
   $totalb=$_POST['totalBill'];

 for($count = 0; $count<count($_POST['hidden_quantity']); $count++)
{
    $quant[$count] =  $_POST['hidden_quantity'][$count];
}
for($count = 0; $count<count($_POST['hidden_product_id']); $count++)
{
     $prodid[$count] =  $_POST['hidden_product_id'][$count];
}
for($count = 0; $count<count($_POST['totalprice']); $count++)
{
 $price[$count] =  $_POST['totalprice'][$count];
}

for($count = 0; $count<count($_POST['hidden_mainQuant']); $count++)
{
     $newquant[$count] =  $_POST['hidden_mainQuant'][$count];
}


for($count = 0; $count<count($_POST['total']); $count++)
{
     $total += $_POST['total'][$count];
}
$ordno=$_POST['invoice_no'];

$CatBranch=$con->query("INSERT INTO `order`(`ord_no`, `ord_date`, `ord_amount`, `cust_name`) VALUES 
  ('$ordno',' $date','$totalb','$cust')");

for($count = 0; $count<count($_POST['hidden_product_id']); $count++)
{
  
       $CatBr=$con->query("INSERT INTO `ord_prod`( `ord_id`, `prod_id`, `prod_count`, `tprice`)
          VALUES ('$ordno', '$prodid[$count]' ,'$quant[$count]','$price[$count]')");

}

for($count = 0; $count<count($_POST['hidden_mainQuant']); $count++)
{
    $newq[$count]= $newquant[$count] -  $quant[$count]  ;
           $CatBr=$con->query("UPDATE `product` SET`prodQuant`='$newq[$count]' WHERE `prodID`='$prodid[$count]'");

}

          header("location: Allinvoice.php");

?>