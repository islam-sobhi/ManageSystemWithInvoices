<?php include("AddSupplierQuery.php"); ?>
<!DOCTYPE html>
<html>

<head>
  <title>add Categories Branch</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styleFirst.css">
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <script src="../invoiceSystem/js2/jquery-3.1.1.min.js"></script>
    <script src="../invoiceSystem/js2/valid.js"></script>
  <script src="../invoiceSystem/js2/ajax.js"></script>
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body>
  <?php include 'myNav.php';?>
  <div id="container"style="padding-top: 84px;">
    <form name="add_new" method="post" action="">
      <label class="lbl">Supplier Name</label>
  <input type="text" name="supname" id="supname"  class="selectprob"> <br>
     
      
      <label class="lbl">Supplier Phone</label>
      <input type="text" name="suphon" id="suphon" class="selectprob"> <br>

 <label class="lbl">Supplier Address</label>
      <input type="text" name="supadd" id="supadd" class="selectprob"> <br>

 <label class="lbl">Supplier Company</label>
      <input type="text" name="supcomp" id="supcomp" class="selectprob">

      <input type="submit" name="submitAdd" value="Save" class="btn btn-info subclass"><br />
      <?php  if($warning!="") {?>
      <div class="warning">
        <?php echo $warning ;?>
      </div>
      <?php  } ?>
    </form>

    <div class="clear"></div> <br />
    
    <p class="lead">Categories Brach Exists :</p>
    <table bgcolor="#123652" style="color:white;">
      <tbody>

        <tr>
          <td width="200px">
            Supplier Name
          </td>
          <td width="200px">
            Supplier Phone
          </td>
          <td width="150px">OPeration</td>
        </tr>
      </tbody>

    </table>

    <table>
      <tbody>
        <?php  $x= 1; while ($depp=mysqli_fetch_assoc($supplier)) { ?>
        <tr>

          <td width="200px">
            <?php echo $depp['supname']; ?>
          </td>
          <td width="200px">
            <?php echo $depp['supno']; ?>
          </td>
          <td width="150px"><a href="AddSupplierQuery.php?supname=<?php echo $depp['supname'];?>&operation=delete">Delete</a><br/></td>

          <td>
            <?php // echo $x ?>
          </td>

        </tr>
        <?php $x++ ; }?>

      </tbody>
    </table>
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

</body>

</html>