<?php
include('config.php'); 


if(isset($_GET['codeval'])){
    
    $code =$_POST['code'];
    $CatBranch=$con->query("SELECT * FROM `product` where prodCode ='$code'");
    $result = [];

  while ($BranName=mysqli_fetch_assoc($CatBranch)) { 
    
       //     $result [] = $BranName;

       $result[] = $BranName['prodName'];
       $result[] .= $BranName['prodCode'];
       $result[] .= $BranName['prodPrice'];
       $result[] = $BranName['prodID'];
       $result[] = $BranName['prodQuant'];

     }  

     header('Content-Type: application/json');
    echo json_encode($result);  
}


if(isset($_GET['submitAdd'])){ 
   // echo "<script>alert('yg gjhgjg j')</script>";
    //$n=$con->query("SELECT max(prodID) from product");
     //$id=mysqli_fetch_assoc($n);
  //  $id=$_POST['prodID'];
print($prodname);
    $prodname=$_POST['pname'];
    $prodDet=$_POST['pdescr'];
    $prodprice=$_POST['pric'];
    $prodpriceBuy=$_POST['pricBuy'];
    $prodquant=$_POST['quant'];
    $categID=$_POST['catID'];
    $markn=$_POST['marID'];
    $code=$_POST['code'];
    $supID=$_POST['sup'];
   // print $markn;
   //INSERT INTO `product`(`prodID`, `prodName`, `prod_ArabName`, `prodDescrp`, `prod_DescriArab`, `prodPrice`, `prodCode`, `prodQuant`, `markaID`, `supplier_id`) 
 //$updateProduct=$con->query("UPDATE `product` SET prodName='$prodname',prod_ArabName='$prodnameAr',prodDescrp='$prodDet',prod_DescriArab='$prodDetAr'  ,prodPrice='$prodprice',prodCode='$code',prodQuant='$prodquant', markaID='$markn' where prodID='$id' ");
 $updateProduct=$con->query(" INSERT INTO `product`(`prodName`,`prodDescrp`,`prodPrice`,`prod_price_buy`, `prodCode`, `prodQuant`, `markaID` , `categMID` ,  `supplier_id` )
  VALUES ('$prodname','$prodDet' ,'$prodprice','$prodpriceBuy','$code' ,'$prodquant','$markn','$categID' , '$supID' )");
  
    /**** End Updated ****/

  //  print($categID);

    
   
}

if(isset($_GET['operation']) =="delete")
  {
		if(isset($_GET['prodCode'])&&$_GET['prodCode'] !=""){
			$del=$con->query("delete from product where prodCode='{$_GET['prodCode']}'");
			if (mysqli_affected_rows($con)==1) {
                echo "<script>alert('تمت عملية الحذف بنجاح');</script>";
               // header("location: ../wdt_project/add_subjects.php");
             header("location: AllProduct.php");
               
			}else{
                echo "<script>alert('حدث خطأ فى  عملية الحذف ');</script>";
              
            }
           header("location: AllProduct.php");
		}
	
}

//     ////** Insert CheckBox Values ***/

//  if(isset($_GET['sizes'])){
   
//      $sizes=  $_POST['s'];
//      $id=  $_POST['prodID'];
//       $SizeProd=$con->query("INSERT INTO `prod_size`(`sizeValue`, `prodID`)  values('$sizes','$id')");
//     }
//  if(isset($_GET['sizex'])){
   
//      $sizesx=  $_POST['x'];
//      $id=  $_POST['prodID'];
//  $SizeProd=$con->query("INSERT INTO `prod_size`(`sizeValue`, `prodID`)  values('$sizesx','$id')");
//     }
//  if(isset($_GET['sizel'])){
   
//      $sizel=  $_POST['l'];
//      $id=  $_POST['prodID'];
//  $SizeProd=$con->query("INSERT INTO `prod_size`(`sizeValue`, `prodID`)  values('$sizel','$id')");
//     }
//  if(isset($_GET['sizem'])){
   
//      $sizem=  $_POST['m'];
//      $id=  $_POST['prodID'];
//  $SizeProd=$con->query("INSERT INTO `prod_size`(`sizeValue`, `prodID`)  values('$sizem','$id')");
     
//     }
//  if(isset($_GET['sizexl'])){
   
//      $sizexl=  $_POST['xl'];
//      $id=  $_POST['prodID'];
//  $SizeProd=$con->query("INSERT INTO `prod_size`(`sizeValue`, `prodID`)  values('$sizexl','$id')");
//     }
//  if(isset($_GET['sizexx'])){
   
//      $sizexx=  $_POST['xx'];
//      $id=  $_POST['prodID'];
//  $SizeProd=$con->query("INSERT INTO `prod_size`(`sizeValue`, `prodID`)  values('$sizexx','$id')"); 
     
//     }

//  ////** End Insert CheckBox Values ***/
// /**********************************/
//  if(isset($_GET['sizeds'])){
//    $sizes=  $_POST['s'];
//      $id=  $_POST['prodID'];
//       $SizeProd=$con->query("DELETE FROM `prod_size` WHERE `sizeValue` = '$sizes' AND `prodID` = '$id'");
     
//     }
// if(isset($_GET['sizexds'])){
   
//      $sizesx=  $_POST['x'];
//      $id=  $_POST['prodID'];
//  $SizeProd=$con->query("DELETE FROM `prod_size` WHERE `sizeValue` = '$sizesx' AND `prodID` = '$id'");
//     }

//  if(isset($_GET['sizelds'])){
   
//      $sizel=  $_POST['l'];
//      $id=  $_POST['prodID'];
//  $SizeProd=$con->query("DELETE FROM `prod_size` WHERE `sizeValue` = '$sizel' AND `prodID` = '$id'");
//     }

//  if(isset($_GET['sizemds'])){
   
//      $sizem=  $_POST['m'];
//      $id=  $_POST['prodID'];
// $SizeProd=$con->query("DELETE FROM `prod_size` WHERE `sizeValue` = '$sizem' AND `prodID` = '$id'");
     
//     }

//  if(isset($_GET['sizexlds'])){
   
//      $sizexl=  $_POST['xl'];
//      $id=  $_POST['prodID'];
//  $SizeProd=$con->query("DELETE FROM `prod_size` WHERE `sizeValue` = '$sizexl' AND `prodID` = '$id'");
//     }

//  if(isset($_GET['sizexxds'])){
   
//      $sizexx=  $_POST['xx'];
//      $id=  $_POST['prodID'];
// $SizeProd=$con->query("DELETE FROM `prod_size` WHERE `sizeValue` = '$sizexx' AND `prodID` = '$id'");
     
//     }








// /************************/

// /******** Updaet Price **********/

if(isset($_GET['getprice'])){
   
     $price= $_POST['val'];
     $idp= $_POST['id'];

 $prodprice=$con->query("UPDATE product SET prodPrice='$price' where prodID='$idp'"); 
}

// /******** End Updaet Price **********/
// /********** Start Quant  ***********************/
if(isset($_GET['getQuant'])){
   
     $quant= $_POST['valq'];
     $idpq= $_POST['idq'];

 $prodprice=$con->query("UPDATE product SET prodQuant='$quant' where prodID='$idpq'"); 
}
// /*********** End Quant **************/

if(isset($_GET['print'])){
    
    $code =$_POST['ordno'];
     $infores=[];
    $info=$con->query("SELECT * FROM `order` WHERE `ord_no`='$code'");
      while ($res=mysqli_fetch_assoc($info)) { 
          $infores[]=  $res['ord_date'];
             $infores[] .=$res['cust_name'];
             $infores[] .=$res['ord_no'];
      }
      print "  <table border='0' cellpadding='3' id='printTable'>
	<tbody>
    <tr><td colspan='2'>Invoice Date</td><td colspan='4' style='text-align:right;'> ". $infores[0]."</td></tr>
      <tr><td colspan='2'>Invoice Custmer</td><td colspan='4' style='text-align:right;'> ". $infores[1]."</td></tr>
     <tr><td colspan='2'>Invoice No .</td><td colspan='4' style='text-align:right;'> ". $infores[2]."</td></tr><br>";
    $CatBranch=$con->query("SELECT * FROM `order` o INNER JOIN ord_prod oo on oo.ord_id=o.`ord_no` 
    INNER join product p on p.prodID=oo.prod_id WHERE `ord_no`='$code'");
    // $result = [];
print "<tr>
		<th>Product Name</th>
		<th>Price</th>		
		<th>Quantity</th>
        <th>total</th>
	</tr>";
    $totalbill=[];
  while ($BranName=mysqli_fetch_assoc($CatBranch)) { 
    
       //     $result [] = $BranName;

       print "
	<tr>
		<td>".$BranName["prodName"]."</td>
		<td>".$BranName['prodPrice']."</td>		
		<td>".$BranName['prod_count']."</td>
        <td>".$BranName['tprice']."</td>
	</tr>
       ";
  $totalbill[]=$BranName["ord_amount"];
    }
print "<br><tr><td colspan='2'>Total Invoice</td><td colspan='4' style='text-align:right;'> ". $totalbill[0]."</td></tr>
</tbody></table>";
print"<br><strong style='text-align:center'>Thank you</strong>";
}
 ?>