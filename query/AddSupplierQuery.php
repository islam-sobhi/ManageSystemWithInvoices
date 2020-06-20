<?php
if(isset($_SESSION['login'])&&$_SESSION['login']!=""){
		echo $_SESSION['login'];
		}
			if(isset($_COOKIE['login'])&&$_COOKIE['login']!=""){
					echo "COOKIE : ".$_COOKIE['login'];
		}
		include('config.php');
		$supplier=$con->query("SELECT * FROM supplier ");
        $catbran=$con->query("SELECT * FROM `categbranch`  c inner join categmain ca on ca.`categMID`=c.`categMID`");
		$warning="";

		if(isset($_POST['submitAdd'])){
				if(trim($_POST['supname']==""))
					$warning .="enter your supplier name <br />";
				if(trim($_POST['suphon']==""))
					$warning .="enter your supplier phone <br />";
                if(trim($_POST['supadd']==""))
					$warning .="enter your supplier address <br />";
                if(trim($_POST['supcomp']==""))
					$warning .="enter your supplier company <br />";
		if($warning==""){
			$query=$con->query("INSERT INTO `supplier`(`supname`, `supno`, `address`, `sup_company`) 
             values('{$_POST['supname']}','{$_POST['suphon']}' ,'{$_POST['supadd']}','{$_POST['supcomp']}')");
		if(mysqli_affected_rows($con)==1){
				header("location: supplier.php");
		  }else{
		  	echo $warning .=mysqli_error($con);
		  }
		}
		}
if(isset($_GET['operation']) =="delete")
           {
		if(isset($_GET['supname'])&&$_GET['supname'] !=""){
			$del=$con->query("delete from supplier where supname='{$_GET['supname']}'");
			if (mysqli_affected_rows($con)==1) {
                echo "<script>alert('تمت عملية الحذف بنجاح');</script>";
               // header("location: ../wdt_project/add_subjects.php");
                              header("location: supplier.php");
               
			}else{
                echo "<script>alert('حدث خطأ فى  عملية الحذف ');</script>";
              
            }
              header("location: supplier.php");
		}
	
}
?>