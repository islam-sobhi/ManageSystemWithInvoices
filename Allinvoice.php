<?php 
include('config.php'); 
        $getProd=$con->query("SELECT * FROM `order` ");
//SELECT * FROM `order` o INNER JOIN ord_prod ord on ord.ord_id=o.ord_no INNER JOIN product p on p.prodID=ord.prod_id
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="add_subjects">
    <title>All Prdoduct</title>

    <link rel="stylesheet" href="../invoiceSystem/js2/bootstrap.css">
    
    
              <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
    <script src="../invoiceSystem/js2/jquery-3.1.1.min.js"></script>
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <script src="../invoiceSystem/js2/ajax.js"></script>
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
   <link rel="stylesheet" href="../invoiceSystem/js2/allproduct.css">
</head>

<body>
     <?php include 'myNav.php';?>
    
        <!-------------------<div class="container-center">---------------------------------------------->
         <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">product</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> All Product </div>
        <div class="card-body">
         <div class="table-responsive">
      <table border="0" class="table table-sm " id="example" >
            <!-- <table class="table table-bordered" >  -->
            <thead>
                <tr class="table-primary" style="text-align:center;color:white;margin-left:150px;">
   <th >customer Name</th>
 <th >Invoice Number</th>
 <th > Date Invoice</th>
 <th >Total Invoice</th> 

                  <th >operation</th>
                  
                                    
                   
                    
                

                </tr>
              
                </tr>
            </thead>
          
             <tbody>
                <?php  $x= 1; while ($prod=mysqli_fetch_assoc($getProd)) { ?>
                        <tr>
                            <!-- href="add_subjects.php?prodCode=<?php //echo $prod['prodCode'];?>&operation=delete" -->
           

    
                            <td >
                                <?php echo $prod['cust_name']; ?>
                            </td>


 <td >
                                <?php echo $prod['ord_no']; ?>
                            </td>

  <td >
                                <?php echo $prod['ord_date']; ?>
                            </td>
 <td >
                                <?php echo $prod['ord_amount']; ?>
                            </td>
                            <td >
                            <button type="button" name="view_details" class="btn btn-warning btn-xs " id="" onchange=getprice(this.value,".$prod['ord_no'].")>View</button>

                         
                         
                            
                            <a href="insert.php?ord_no=<?php echo $prod['ord_no'];?>&operation=delete">
                            <button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" >Remove</button>
                            </a>
                            </td>
                              
                        
                            
                           
                          
                         
                          
                        </tr>
                        <?php $x++ ; }?>
              </tbody>
        </table>
        
          </div>
        </div>
      </div>
    </div>
        
        
    <script src="../js2/jquery-3.1.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/dataTables/jquery.dataTables.js"></script>
<script src="/js/dataTables/dataTables.bootstrap.min.js"></script>
 
<script type="text/javascript">
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>



        
  

     <script type="text/javascript">
    function getprice(val,id){
     
          $.post("AddProductQuery.php?getprice",{id:id,val:val},function(data){
            //  alert(data);
       });
    }
          function getQuant(valq,idq){
         
          $.post("AddProductQuery.php?getQuant",{idq:idq,valq:valq},function(data){
             // alert(data);
       });
    }
         
         
   
    </script>
      <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Page level plugin JavaScript-->
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="vendor/datatables/jquery.dataTables.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin.min.js"></script>
        <!-- Custom scripts for this page-->
  

          <script src="js/dataTables/buttons.print.min.js"></script>
            <script src="js/dataTables/dataTables.buttons.min.js"></script>
              <script src="js/dataTables/vfs_fonts.js"></script>
                <script src="js/dataTables/pdfmake.min.js"></script>
                 <script src="js/dataTables/dataTables.buttons.min.js"></script>
                  <script src="js/dataTables/buttons.flash.min.js"></script>
                  <script src="js/dataTables/buttons.print.min.js"></script>
                  <script src="js/dataTables/buttons.html5.min.js"></script>
                
                
        <script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf','print'
        ]
    } );
} );

      </script>

</body>

</html>