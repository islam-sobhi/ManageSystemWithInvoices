<?php
include('config.php'); 


if(isset($_GET['categMID'])){
    
    $catMain =$_POST['catID'];
    $CatBranch=$con->query("SELECT * FROM `categbranch` WHERE `categMID`='$catMain'");

  while ($BranName=mysqli_fetch_assoc($CatBranch)) { 
      print "<option value=".  $BranName['categID']." >". $BranName['categBranchName']."</option>";
     }    
}
//   if(isset($_GET['color'])){
   
//          $color=  $_POST['color'];
//          $id=  $_POST['id'];
//       $getImage=$con->query("insert into prod_color (colorValue,prod_pictID) values('$color','$id')");
//       //print $color;
//     }
//      if(isset($_GET['newpro'])){ 
//         $getProduct=$con->query("insert into product (prodName) values('')");
//         $prodID=mysqli_insert_id($con);
//         print "<input type='hidden' id='prodID' value='$prodID' >";
//     }

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

    print($categID);

    
   
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

// /*********** start search **************/

if(isset($_GET['search'])){
   
     $df= $_POST['dfrom'];
     $dt= $_POST['tdate'];

 $dataserch=[];
 $searchdata=$con->query("SELECT SUM(`ord_amount`) as sumorders FROM `order` WHERE `ord_date` BETWEEN '$df' AND '$dt'"); 
 while ($ds=mysqli_fetch_assoc($searchdata)) { 
 $dataserch[]=$ds['sumorders'];
 }
      header('Content-Type: application/json');
   echo json_encode($dataserch);  

}

// /*********** End search **************/

 ?>