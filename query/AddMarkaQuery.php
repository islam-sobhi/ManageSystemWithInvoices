<?php
		include('config.php');
if(isset($_GET['page'])){
 $ID=$_GET['page'];
    $CatBranch=$con->query("SELECT *FROM categbranch where categID='$ID'");
 while ($BranName=mysqli_fetch_assoc($CatBranch)) { 
    print "<option value='<?php ".  $BranName['categID']."' >". $BranName['categBranchName']."</option>";
        }    
}

else{

		$CatMain=$con->query("SELECT * FROM categmain ");
		$CatBranch=$con->query("SELECT * FROM categbranch ");
        $catbran=$con->query("SELECT * FROM `prod_marka`");
		$warning="";

		if(isset($_POST['submitAdd'])){
				if(trim($_POST['markaName']==""))
					$warning .="enter your Marka <br />";
				
		if($warning==""){
			$query=$con->query("insert into prod_marka (markaName) values('{$_POST['markaName']}')");
		if(mysqli_affected_rows($con)==1){
				header("location: AddMarka.php");
		  }else{
		  	echo $warning .=mysqli_error($con);
		  }
		}
		}
if(isset($_GET['operation']) =="delete")
  {
		if(isset($_GET['markaName'])&&$_GET['markaName'] !=""){
			$del=$con->query("delete from prod_marka where markaName='{$_GET['markaName']}'");
			if (mysqli_affected_rows($con)==1) {
                header("location: AddMarka.php");
          
			}else{
              
            }
             header("location: AddMarka.php");
		}
	
}
}


?>