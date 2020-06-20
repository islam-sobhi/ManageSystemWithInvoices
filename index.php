<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Manage Prducts</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <script src="../invoiceSystem/js2/ajax.js"></script>
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <style>
    #contentDiv {
      position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
   background-position: right bottom, left top;
  background-repeat: no-repeat, repeat;
}
  
  </style>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <?php include 'myNav.php';?>

    <div class="content-wrapper">
      
      <div id="v" class="container">
        <video autoplay muted loop id="contentDiv">
            <source src="images/bg.mp4" type="video/mp4" loop>
            <source src="images/bg.ogg" type="video/ogg">
        </video>
      </div>
      </div>
      
    <!-- /.content-wrapper-->
   
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
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
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
      <script type="text/javascript">
          $(document).ready(function (){
        $("#addmarka").click(function(){
             $.post("AddMarka.php",function(data){
                         $("#contentDiv").html(data)
                     })
            });
              
              
            $("#catmain").click(function(){
             $.post("AddCatMain.php",function(data){
                         $("#contentDiv").html(data)
                     })
            });
            
              
              $("#catbranch").click(function(){
             $.post("AddCatBranch.php",function(data){
                         $("#contentDiv").html(data)
                     })
            });
              
           /*    $("#addprod").click(function(){
             $.post("AddProduct.php",function(data){
                         $("#contentDiv").html(data)
                     })
            });
             */
                $("#allprod").click(function(){
             $.post("AllProduct.php",function(data){
                         $("#contentDiv").html(data)
                     })
            });
              
              
               });
      
      </script>
  </div>
</body>

</html>
