<?php
include("query/AddMarkaQuery.php");
?>

  <!DOCTYPE html>
  <html>

  <head>
    <title>Add Marka Name</title>
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
    <div id="container">
      <div id="marka">
        <form name="add_new" method="post" action="">

          <label class="lbl">Marka :</label>
          <input type="text" name="markaName" id="markaName" class="selectprob">

          <input type="submit" id="submitAdd" name="submitAdd" value="Add Marka" class="btn btn-info subclass"><br />
          <?php  if($warning!="") {?>
          <div class="warning">
            <?php echo $warning ;?>
          </div>
          <?php  } ?>
        </form>
      </div>


      <div class="clear"></div> <br /><br/>
      <p class="lead">Marka Exists :</p>
      <table bgcolor="#123652" style="color:white;">
        <tbody>

          <tr>
            <td width="200px">
              Marka Name
            </td>

            <td width="150px">OPeration</td>
          </tr>
        </tbody>

      </table>
      <table>
        <tbody>

          <?php  $x= 1; while ($depp=mysqli_fetch_assoc($catbran)) { ?>
          <tr>
            <td width="200px">
              <?php echo $depp['markaName']; ?>
            </td>

            <td width="150px">&nbsp;&nbsp;&nbsp;<a href="AddMarka.php?markaName=<?php echo $depp['markaName'];?>&operation=delete">Delete</a><br/></td>

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