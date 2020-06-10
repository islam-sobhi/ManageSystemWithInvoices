<?php 
include('config.php'); 
        $getImag=$con->query("select *from product_picture");
		$CatMain=$con->query("SELECT * FROM categmain ");
		$CatBranch=$con->query("SELECT * FROM categbranch ");
        $marka=$con->query("SELECT * FROM `prod_marka`");
        $supp=$con->query("SELECT * FROM `supplier`");
        $warning="";
?>

<!DOCTYPE html>
<html>

<head>
    <title>add New Product</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../invoiceSystem/styleFirst.css">
    <script src="../invoiceSystem/js2/jquery-3.1.1.min.js"></script>
    <script src="../invoiceSystem/js2/valid.js"></script>
    <script type="text/javascript">
  
  function prodinsert(){
        //  alert("loaded page");
             $.post("AddProductQuery.php?newpro",function(data){
               //  alert(data)
                   $(".addpro").html(data)
                   $(".addpro").append(data)
                  }); 
        };
      
       
    </script>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <script src="../invoiceSystem/js2/ajax.js"></script>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body>
    <!-- onload="prodinsert(); -->
    <?php include 'myNav.php';?>
    <div id="cont">
        <form name="add_new" method="POST" action="" enctype="multipart/form-data" id="ful">
            <p class="lead">Product Name :</p>
            <div class="form-group">
                <input name="prodName" type="text" id="prodName" class="form-control input-lg" placeholder="Product Name Here">
            </div>




            <div class="form-group">
                <p class="lead">Product Description :</p>

                <textarea name="prodscrip" id="prodscrip" class="form-control input-lg" placeholder="your English Decription..."></textarea>
            </div>

            <label class="lbl">Supplier Name :</label>
            <select id="supID" name="supID" class="selectprob">
                    <option>select Supplier Name</option>
				<?php while ($supname=mysqli_fetch_assoc($supp)) { ?>
                    
				     <option value="<?php  echo  $supname['id']?>"><?php  echo $supname['supname'] ?></option>
				 <?php  } ?>
			</select> <br />

            <label class="lbl">Category Product :</label>
            <select id="categMID" name="categMID" class="selectprob">
                    <option>select categories main</option>
				<?php while ($MainName=mysqli_fetch_assoc($CatMain)) { ?>
                    
				     <option value="<?php  echo  $MainName['categMID']?>"><?php  echo $MainName['categMainName'] ?></option>
				 <?php  } ?>
			</select> <br />


            <label class="lbl">Branch Category :</label>
            <select id="categBranch" name="categBranch" class="selectprob">
				     <option>select Branch</option>
			</select>
            <br />
            <div class="form-group">
                <label class="lbl"> Model :</label>
                <select class="selectprob" id="Marka" name="Marka">
            <option>select Model</option>
				<?php  while ($makas=mysqli_fetch_assoc($marka)) { ?>
				     <option value="<?php  echo  $makas['markaID']?>"><?php echo $makas['markaName'] ?></option>
				 <?php  } ?>
			</select>
            </div>
            <br />

            <label class="lbl">Product Quantity :</label>
            <input type="text" name="quant" id="quant" class="selectprob">

            <div class="clear"></div>
            <br />
            <label class="lbl">Product Price sell :</label>
            <input type="text" name="price" id="price" class="selectprob">
            <label class="lbl">Product Price buy :</label>
            <input type="text" name="pricesell" id="pricesell" class="selectprob">
            <div class="clear"></div>
            <br/><label class="lbl">Product code :</label>
            <input type="text" name="code" id="code" class="selectprob">


            <input type="submit" id="submitAdd" name="w" value="Add Product" class="btn btn-info"><br />

        </form>
        <br />
    </div>

    <div id="show">
    </div>
    <script src="js2/index.js"></script>
    <script type="text/javascript">
                    
           $(document).ready(function (e){
                $("#ful").on('submit',function(e){
                    e.preventDefault();
                  
                   prodID= $("#prodID").val()
                    $.ajax({
                        type:"POST",
                        url:"AddProductQuery.php?image&prodID="+prodID ,
                        data:new FormData(this),
                        contentType:false,
                            cache:false,
                            processData:false,
                            beforSend:function(){
                            },
                                success:function(data){
                                  $("#getImage").append(data)
                                  $("#img").hide();
                                }
                    })
                   
                });
   
           });
            
            $("#categMID").change(function(){
                    var catID=$("#categMID").val();
                     $.post("AddProductQuery.php?categMID",{catID:catID},function(data){
                         $("#categBranch").html(data)
                     })
                });
            $("#submitAdd").click(function(){

                
                 var  pname=$("#prodName").val();

                 var  pdescr=$("#prodscrip").val();

                 var  catID=$("#categMID").val();

                 var  catbran=$("#categBranch").val();

                 var  marID=$("#Marka").val();

                 var  pric=$("#price").val();

                 var  quant=$("#quant").val();

                  var  code=$("#code").val();
              
                  var  sup=$("#supID").val();
                
                $sel=$('#categMID').val()
                if($sel=="select categories main"){
                     alert("please Select Categories product");
                     window.location.reload(true);
                }
                $mark=$('#Marka').val()
                if($mark=="select Model"){
                     alert("please Select Model product");
                     window.location.reload(true);
                }
                if(pname==""){
                    alert("please Enter product Name ")
                     window.location.reload(true);
                }
                 
                   if(quant==""){
                      alert("please Enter product Quantity ")
                       window.location.reload(true);
                  }
                   
                    if(pric==""){
                       alert("please Enter product price ")
                       
                        window.location.reload(true);
                   }
                           alert(pname + pdescr + pric + quant + catID + marID + code)    
$.post("AddProductQuery.php?submitAdd",{pname:pname,pdescr:pdescr,pric:pric,quant:quant,catID:catID,marID:marID,code:code,sup:sup},function(data){
           //  alert(data)
                window.location.reload(true);
    
                     });
                   
         
                });
             $("#img").change(function(e){

                     $("#ful").submit();
                     });
        /******** Size ***********/
         $("#sizes").change(function(e){
             prodID= $("#prodID").val()
             var s=$("#sizes").val();
             if($("#sizes").is(":checked")){
                 $("#sizeNo").prop('disabled',true);
                  $.post("AddProductQuery.php?sizes",{s:s,prodID:prodID},function(data){
                        
                     });
             }else{
                 $("#sizeNo").prop('disabled',false);
                 $.post("AddProductQuery.php?sizeds",{s:s,prodID:prodID},function(data){
                        
                     });
             }
            
            
         });
          $("#sizex").change(function(e){
             prodID= $("#prodID").val()
             var x=$("#sizex").val();
              
               if($("#sizex").is(":checked")){
                 $("#sizeNo").prop('disabled',true);
                   $.post("AddProductQuery.php?sizex",{x:x,prodID:prodID},function(data){
                        
             });
             }else{
                 $("#sizeNo").prop('disabled',false);
            $.post("AddProductQuery.php?sizexds",{x:x,prodID:prodID},function(data){
                        
             });
             }
              
            
         });
          $("#sizel").change(function(e){
             prodID= $("#prodID").val()
             var l=$("#sizel").val();
              
               if($("#sizel").is(":checked")){
                 $("#sizeNo").prop('disabled',true);
                    $.post("AddProductQuery.php?sizel",{l:l,prodID:prodID},function(data){
                        
                     });
             }else{
                 $("#sizeNo").prop('disabled',false);
                 $.post("AddProductQuery.php?sizelds",{l:l,prodID:prodID},function(data){
                        
                     });
             }
              
            
         });
          $("#sizem").change(function(e){
             prodID= $("#prodID").val()
             var m=$("#sizem").val();
              
                if($("#sizem").is(":checked")){
                 $("#sizeNo").prop('disabled',true);
                    $.post("AddProductQuery.php?sizem",{m:m,prodID:prodID},function(data){
                        
                     });
             }else{
                 $("#sizeNo").prop('disabled',false);
                  $.post("AddProductQuery.php?sizemds",{m:m,prodID:prodID},function(data){
                        
                     });
                 
             }
              
             
         });
          $("#sizexl").change(function(e){
             prodID= $("#prodID").val()
             var xl=$("#sizexl").val();
              
               if($("#sizexl").is(":checked")){
                 $("#sizeNo").prop('disabled',true);
                    $.post("AddProductQuery.php?sizexlds",{xl:xl,prodID:prodID},function(data){
                        
                     });
             }else{
                 $("#sizeNo").prop('disabled',false);
             }
              
            
         });
          $("#sizexx").change(function(e){
             prodID= $("#prodID").val()
             var xx=$("#sizexx").val();
              
               if($("#sizexx").is(":checked")){
                 $("#sizeNo").prop('disabled',true);
                    $.post("AddProductQuery.php?sizexxds",{xx:xx,prodID:prodID},function(data){
                        
                     });
             }else{
                 $("#sizeNo").prop('disabled',false);
                  $.post("AddProductQuery.php?sizexxds",{xx:xx,prodID:prodID},function(data){
                        
                     });
             }
              
            
         });

            function getColor(id)
             {
                  var col=$("#"+id).val();
                  $.post("AddProductQuery.php?color",{color:col,id:id},function(data){
                       $("#img").show();
                  });
              }
			</script>

    <div class="addpro">

    </div>
    <?php  if($warning!="") {?>
    <div class="warning">
        <?php  echo $warning ;?>
    </div>
    <?php  } ?>

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