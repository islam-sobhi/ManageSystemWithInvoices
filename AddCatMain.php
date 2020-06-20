<?php include("query/AddCatMainQuery.php"); ?>

<!DOCTYPE html>
<html>

<head>
  <title>Add Main Categories</title>
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
    <form name="add_new" method="post" action="">

      <label class="lbl">Categories Name </label>
      <input type="text" name="addCat" id="addCat" class="selectprob">

      <input type="submit" id="submit" name="submit" value="Add Categories" class="btn btn-info"><br />

      <?php if($warning!="") {?>
      <div class="warning">
        <?php echo $warning ;?>
      </div>
      <?php } ?>
    </form>
    <br />
    <div class="clear"></div>
    <div class="clear"></div> <br /><br/>
    <p class="lead">Categories Brach Exists :</p>
    <table bgcolor="#123652" style="color:white;">
      <tbody>

        <tr>
          <td width="200px">
            Categ Main
          </td>

          <td width="150px">OPeration</td>
        </tr>
      </tbody>

    </table>


    <div class="clear"></div>
    <table>
      <tbody>
        <div class="clear"></div>
        <?php  $x= 1; while ($depp=mysqli_fetch_assoc($dep)) { ?>
        <tr>
          <td width="200px">
            <?php echo $depp['categMainName']; ?>
          </td>
          <td width="150px"><a href="AddCatMain.php?categMainName=<?php echo $depp['categMainName'];?>&operation=delete">Delete</a><br /></td>

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