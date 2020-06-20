<?php

include('query/config.php'); 


if(isset($_GET['operation']) =="delete")
  {
		if(isset($_GET['ord_no'])&&$_GET['ord_no'] !=""){

			$del=$con->query("delete from `order` where ord_no='{$_GET['ord_no']}'");
			if (mysqli_affected_rows($con)==1) {
                
        		$del=$con->query("delete from `ord_prod` where ord_id='{$_GET['ord_no']}'");
                header("location: Allinvoice.php");

			}else{
                echo "<script>alert('حدث خطأ فى  عملية الحذف ');</script>";  
            }
          header("location: Allinvoice.php");
		}
	
}
?>