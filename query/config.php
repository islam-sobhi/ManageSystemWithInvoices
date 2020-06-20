 <?php
        $con=mysqli_connect("localhost","root","rootadmin","managesite");//secretpassword

             if(mysqli_errno($con)){
              die("faild to connect your database".mysqli_connect_errno()."{".mysqli_connect_errno()."}");
             }else{
                   // print("welcome Successfully");
             }
             #if data returned arabic
             	$con->set_charset('utf-8');
             	
?>          