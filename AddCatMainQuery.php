<?php
if(isset($_SESSION['login'])&&$_SESSION['login']!=""){
		echo $_SESSION['login'];
		}
			if(isset($_COOKIE['login'])&&$_COOKIE['login']!=""){
					echo "COOKIE : ".$_COOKIE['login'];
		}
		include('config.php');
		$dep=$con->query("SELECT categMainName FROM categmain ");
		$warning="";

		if(isset($_POST['submit'])){
				if(trim($_POST['addCat']==""))
					$warning .="enter your Categories <br />";
				
		if($warning==""){
			$query=$con->query("insert into categmain (categMainName) values('{$_POST['addCat']}')");
		if(mysqli_affected_rows($con)==1){
				header("location: AddCatMain.php");
		  }else{
		  	echo $warning .=mysqli_error($con);
		  }
		}
		}
if(isset($_GET['operation']) =="delete")
           {
		if(isset($_GET['categMainName'])&&$_GET['categMainName'] !=""){
			$del=$con->query("delete from categmain where categMainName='{$_GET['categMainName']}'");
			if (mysqli_affected_rows($con)==1) {
                echo "<script>alert('تمت عملية الحذف بنجاح');</script>";
               // header("location: ../wdt_project/add_subjects.php");
               
			}else{
                echo "<script>alert('حدث خطأ فى  عملية الحذف ');</script>";
              
            }
              header("location: AddCatMain.php");
		}
	
}
?>