<?php 
include('query/config.php'); 
        $getProd=$con->query("SELECT * FROM `product` p INNER join prod_marka m on p.`markaID`=m.markaID  inner JOIN categmain c on c.categMID=p.categMID INNER JOIN supplier s on s.id=p.`supplier_id` WHERE `prodQuant`<=50 ");

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="add_subjects">
  <title>Statistic</title>

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

  <!--  <div class="container-center">  -->
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
        <i class="fa fa-table"></i>Product Under Request </div>
      <div class="card-body">
        <div class="table-responsive">
          <table border="0" class="table table-sm " id="example">
            <!-- <table class="table table-bordered" >  -->
            <thead>
              <tr class="table-primary" style="text-align:center;color:white;margin-left:150px;">
                <th>عملية</th>
                <th>الكمية</th>
                <th> Price</th>
                <th>المورد</th>
                <th>القسم</th>
                <th>العلامة</th>

                <th> كود المنتج </th>
                <th>وصف المنتج</th>
                <th>الإسم عربي</th>


              </tr>

              </tr>
            </thead>

            <tbody>
              <?php  $x= 1; while ($prod=mysqli_fetch_assoc($getProd)) { ?>
              <tr style="text-align:center;">
                <!-- href="add_subjects.php?prodCode=<?php //echo $prod['prodCode'];?>&operation=delete" -->


                <td><a href="AddProductQuery.php?prodCode=<?php echo $prod['prodCode'];?>&operation=delete">&nbsp;&nbsp;&nbsp;Delete</a></td>
                <td>
                  <?php  echo "<input type='number' value='".$prod['prodQuant']."' onchange=getQuant(this.value,".$prod['prodID'].") />" ?>
                </td>

                <td>
                  <?php  echo "<input type='number' value='".$prod['prodPrice']."' onchange=getprice(this.value,".$prod['prodID'].") />" ?>
                </td>

                <td>
                  <?php echo $prod['supname']; ?>
                </td>
                <td>
                  <?php echo $prod['categMainName']; ?>
                </td>
                <td>
                  <?php echo $prod['markaName']; ?>
                </td>


                <td>
                  <?php echo $prod['prodCode']; ?>
                </td>

                <td>
                  <?php echo $prod['prodDescrp']; ?>
                </td>


                <td>
                  <?php echo $prod['prodName']; ?>

                </td>





              </tr>
              <?php $x++ ; }?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="row">

      <div class="col-md-12 col-md-offset-2">
        <div class="card">
          <h5 class="card-header">Searching ...</h5>
          <div class="card-body">
            <h5 class="card-title">The total amount of the bills
            </h5>
            <div class="form-group row">
              <label for="example-date-input" class="col-2 col-form-label">From</label>
              <div class="col-10">
                <input class="form-control" type="date" value="2011-08-19" id="dfrom">
              </div>
            </div>
            <div class="form-group row">
              <label for="example-month-input" class="col-2 col-form-label">To</label>
              <div class="col-10">
                <input class="form-control" type="date" value="2011-08" id="tdate">
              </div>
            </div>


            <div class="offset-sm-2 col-sm-10">
              <button type="button" class="btn btn-primary" onclick="search()">Search</button>
            </div>


            <div class="card-text" style=" color: red; text-align: center; font-size: 36px;font-weight: bold;"><span id="ressearch"></span> $</div>
            <a href="#"></a>
          </div>
        </div>
      </div>

    </div>
  </div>


  <script src="../js2/jquery-3.1.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

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
     
          $.post("query/AddProductQuery.php?getprice",{id:id,val:val},function(data){
            //  alert(data);
       });
    }
          function getQuant(valq,idq){
         
          $.post("query/AddProductQuery.php?getQuant",{idq:idq,valq:valq},function(data){
             // alert(data);
       });
    }
         
      function search(){
        dfrom=$("#dfrom").val()
         tdate=$("#tdate").val()

     
         $.post("query/AddProductQuery.php?search",{dfrom:dfrom,tdate:tdate},function(data){
          // alert(data[0]);
           if(data=='')
           {
  $("#ressearch").text('0')
           }else{
  $("#ressearch").text(data[0])
           }
         
           
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