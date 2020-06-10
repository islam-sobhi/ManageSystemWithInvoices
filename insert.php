<?php


include('config.php'); 



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

//  header("Location: invoice.php");
          header("location: Allinvoice.php");

//echo json_encode($ordno); 

if(isset($_GET['operation']) =="delete")
  {
		if(isset($_GET['ord_no'])&&$_GET['ord_no'] !=""){
			$del=$con->query("delete from `order` where ord_id='{$_GET['ord_no']}'");
			if (mysqli_affected_rows($con)==1) {
        			$del=$con->query("delete from `ord_prod` where ord_id='{$_GET['ord_no']}'");
           header("location: Allinvoice.php");
               
			}else{
                echo "<script>alert('حدث خطأ فى  عملية الحذف ');</script>";  
            }
          header("location: Allinvoice.php");
		}
	
}

// echo json_encode($prodid[0]); 
//  echo json_encode($q); 
   
    
?>