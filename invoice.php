<?php 

include('config.php'); 
        $ordno=$con->query(" SELECT `ord_id` FROM `order` ORDER BY `order`.`ord_id` DESC LIMIT 1 ");
?>

<html>  
    <head>  
        <title>create invoice</title>  
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

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container" >
   <br />
     <?php include 'myNav.php';?>
   <h3 align="center"> <a href="index.php"></a></h3><br /><br />


			</address>
		
 
   <form method="post" id="user_form">
   	<table class="meta">

             	<tr>
					<th><span contenteditable>Customer Name </span></th>
					<td><span contenteditable><input type="text" value="custmer" name="customer" id="customer"/>

                    </span></td>
				</tr>

				<tr>
					<th><span contenteditable>Invoice #</span></th>
					<td><span contenteditable>
                <?php  $x= 1; while ($ordno2=mysqli_fetch_assoc($ordno)) { ?>
                    <input type="text" value="<?php echo $ordno2['ord_id']+1;  ;?>"  name="invoice_no" id="invoice_no"/>
                 <?php } ?>   
                    </span></td>
				</tr>  
				<tr>
					<th><span contenteditable>Date</span></th>
					<td><span contenteditable><input  value="<?php print(date('Y/m/d')); ?>" name="date" id="date"/></span></td>
				</tr>
				<tr>
					<th><label>Amount Due</label></th>
					<td></span><span><input type="text" id="totalBill" name="totalBill">$</td>
				</tr>
			</table>
  <br />
   <br />
   <div align="right" style="margin-bottom:5px;">
    <button type="button" name="add" id="add" class="btn btn-success btn-xs">Add</button>
   </div>
   <br />
    <div class="table-responsive">
     <table class="table table-striped table-bordered" id="user_data">
      <tr>
       <th>product Name</th>
       
       <th>price</th>
       <th>quantity</th>
       <th> Total</th>
       <th>Details</th>
       <th>Remove</th>
      </tr>
     </table>
    </div>
    <div align="center">
     <input type="submit" name="insert" id="insert" class="btn btn-primary" value="Insert" />
    </div>
   </form>

   <br />
  </div>
  <div id="user_dialog" title="Add Data">
   <div class="form-group">
    <label>Enter Code Name</label>
    <input type="text" name="product_name" id="product_name" class="form-control" />
    <span id="error_product_name" class="text-danger"></span>
   </div>
   <div class="form-group">
    <label>Price Product </label>
    <input type="text" name="price" id="price" class="form-control" />
    <span id="error_price" class="text-danger"></span>
   </div>

   <div class="form-group">
    <label>Quantity</label>
    <input type="text" name="quantity" id="quantity" class="form-control" />
    <span id="error_price" class="text-danger"></span>
   </div>
<input type="hidden" name="hidden_product_id[]" id="product_id" class="product_id"/>
<input type="hidden" name="hidden_mainQuant[]" id="mquant" class="product_id"/>
   <div class="form-group" align="center">
    <input type="hidden" name="row_id" id="hidden_row_id" />
    <button type="button" name="save" id="save" class="btn btn-info">Save</button>
   </div>
  </div>
  <div id="action_alert" title="Action">

  </div>
    </body>  
</html> 

<script>  
$(document).ready(function(){ 
 
 var count = 0;
var tot=0;
 $('#user_dialog').dialog({
  autoOpen:false,
  width:400
 });

 $('#add').click(function(){
  $('#user_dialog').dialog('option', 'title', 'Add Data');
  $('#product_name').val('');
  $('#price').val('');
  $('#error_product_name').text('');
  $('#error_price').text('');
  $('#product_name').css('border-color', '');
  $('#price').css('border-color', '');
  $('#save').text('Save');
  $('#user_dialog').dialog('open');
 });

 $('#save').click(function(){
  var error_product_name = '';
  var error_price = '';
  var product_name = '';
  var price = '';
  if($('#product_name').val() == '')
  {
   error_product_name = 'First Name is required';
   $('#error_product_name').text(error_product_name);
   $('#product_name').css('border-color', '#cc0000');
   product_name = '';
  }
  else
  {
   error_product_name = '';
   $('#error_product_name').text(error_product_name);
   $('#product_name').css('border-color', '');
   product_name = $('#product_name').val();
   quantity = $('#quantity').val();
 mquant = $('#mquant').val();
 product_id=$('#product_id').val();

  } 
  if($('#price').val() == '')
  {
   error_price = 'Last Name is required';
   $('#error_price').text(error_price);
   $('#price').css('border-color', '#cc0000');
   price = '';
  }
  else
  {
   error_price = '';
   $('#error_price').text(error_price);
   $('#price').css('border-color', '');
   price = $('#price').val();
  }
  if(error_product_name != '' || error_price != '')
  {
   return false;
  }
  else
  {
   if($('#save').text() == 'Save')
   {
      
    count = count + 1;
    var total=quantity*price
    output = '<tr id="row_'+count+'">';
    
        output += '<input type="hidden" name="hidden_product_id[]" id="product_id'+count+'" class="product_id" value="'+product_id+'"/>';
           output += '<input type="hidden" name="hidden_mainQuant[]" id="mquant'+count+'" class="mquant" value="'+mquant+'"/>';

    output += '<td>'+product_name+' <input type="hidden" name="hidden_product_name[]" id="product_name'+count+'" class="product_name" value="'+product_name+'" /></td>';
   
      output += '<td>'+price+' <input type="hidden" name="hidden_price[]" id="price'+count+'" value="'+price+'" /></td>';
      output += '<td>'+quantity+' <input type="hidden" name="hidden_quantity[]" id="quantity'+count+'" value="'+quantity+'" /></td>';
 
     output += '<td>'+total+' <input type="hidden"  class="totalprice" name="totalprice[]" id="total'+count+'" value="'+total+'" /></td>';

 gettotal(total);



    output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">View</button></td>';
    output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
    output += '</tr>';
    $('#user_data').append(output);
   }
   else
   {
        var total= quantity * price

    var row_id = $('#hidden_row_id').val();
     output += '<input type="hidden" name="hidden_product_id[]" id="product_id'+count+'" class="product_id"/>';
          output += '<input type="hidden" name="hidden_mainQuant[]" id="mquant'+count+'" class="mquant"/>';
    output = '<td>'+product_name+' <input type="hidden" name="hidden_product_name[]" id="product_name'+row_id+'" class="product_name" value="'+product_name+'" /></td>';

     output += '<td>'+price+' <input type="hidden" name="hidden_price[]" id="price'+count+'" value="'+price+'" /></td>';
      output += '<td>'+quantity+' <input type="hidden" class="price" name="hidden_price[]" id="quantity'+count+'" value="'+quantity+'" /></td>';

output += '<td>'+total+' <input type="hidden" class="totalprice" name="total[]" id="total'+count+'" value="'+total+'" /></td>';
// total +=total
// $('#totalBill').val(total);
 gettotal(total);

    output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+row_id+'">View</button></td>';
    output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'">Remove</button></td>';
    $('#row_'+row_id+'').html(output);
   }

   $('#user_dialog').dialog('close');
  }
 });

 $(document).on('click', '.view_details', function(){
  var row_id = $(this).attr("id");
  var product_name = $('#product_name'+row_id+'').val();
  var price = $('#price'+row_id+'').val();
  $('#product_name').val(product_name);
  $('#price').val(price);
  $('#save').text('Edit');
  $('#hidden_row_id').val(row_id);
  $('#user_dialog').dialog('option', 'title', 'Edit Data');
  $('#user_dialog').dialog('open');

 });

 $(document).on('click', '.remove_details', function(){
  var row_id = $(this).attr("id");
  if(confirm("Are you sure you want to remove this row data?"))
  {
      old=document.getElementById("totalBill").value;
      var table = document.getElementById("user_data")
       test =parseInt(table.rows[row_id].cells[3].innerHTML);
   $('#row_'+row_id+'').remove();
   document.getElementById("totalBill").value=old-test;
   alert(old)
  }
  else
  {
   return false;
  }
 });

 $('#action_alert').dialog({
  autoOpen:false
 });

 $('#user_form').on('submit', function(event){
  event.preventDefault();
  var count_data = 0;
  $('.product_name').each(function(){
   count_data = count_data + 1;
  });



  if(count_data > 0)
  {     
   var form_data = $(this).serialize();

     $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {

     $('#user_data').find("tr:gt(0)").remove();
     $('#action_alert').html('<p>Data Inserted Successfully</p>');
     $('#action_alert').dialog('open');
    }
  

                     }) ;
 


  }
  else
  {
   $('#action_alert').html('<p>Please Add atleast one data</p>');
   $('#action_alert').dialog('open');
  }
 });
 
});  

</script>

 <!-- Bootstrap core JavaScript-->

        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/sb-admin.min.js"></script>
        
        

      <script>
            function gettotal(total){
var table = document.getElementById("user_data"), sumVal=total;
            
            for(var i = 1; i < table.rows.length; i++)
            {
                sumVal = sumVal + parseInt(table.rows[i].cells[3].innerHTML);
            }
            
            document.getElementById("totalBill").value= sumVal;
            console.log(sumVal);

            }
            
            
        </script>
        


   <script type="text/javascript">
                    
           $(document).ready(function (e){ 

                $("#totalprice").change(function(){
                    var code=$("#product_name").val();
                    var catID=$("#date").val();

});

            $("#product_name").change(function(){
                    var code=$("#product_name").val();
                    var catID=$("#date").val();

                       $.post("createInvoiceQuery.php?codeval",{code:code},function(data){

						 $("#product_name").val(data[0])
						  $("#code").val(data[1])
						   $("#price").val(data[2])
                            $("#product_id").val(data[3])
                               $("#mquant").val(data[4])
                         
                     })                    
                });
});


</script>


</body>
</html>
