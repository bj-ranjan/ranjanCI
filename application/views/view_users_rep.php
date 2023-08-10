<!DOCTYPE html>
<html>
<head>
<title>Display Records</title>
<link rel="stylesheet" href="<?php echo base_url().'bootstrap-4.3.1-dist/css/bootstrap.css' ?>">
<link rel="stylesheet" href="<?php echo base_url().'bootstrap-4.3.1-dist/css/style.css' ?>">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


</head>

<body>


<div class="container-fluid">
	<h3>User Reports</h3>
        <br />
        <button class="btn btn-success" onclick="report_list()"><i class="glyphicon glyphicon-plus"></i> Reports</button>
        
        <br />
        <br />
<div class="row">

	<div class="col-md" style="background-color:lavender;">Sr No</div>
  	<div class="col-md" style="background-color:lavender;">User ID</div>
    <div class="col-md" style="background-color:lavender;">First Name</div>
    <div class="col-md" style="background-color:lavender;">Last Name</div>
    
  </div>


  <?php
  $i=1;
  foreach($users as $row)
  {
 ?>
 
  <div class="row">
  <div class="col-md" style="background-color:lavenderblush;"><?php echo $i; ?></div>
  <div class="col-md"><?php echo $row->user_id; ?></div>
  <div class="col-md"><?php echo $row->first_name; ?></div>
  <div class="col-md"><?php echo $row->last_name; ?></div>
  

  

  </div>
   <p>
  
  <?php
  $i++;

  }

  
  //echo $links;

  
  ?>
 </p>
 

</div>

<script type="text/javascript">

var save_method; //for save method string

function reload_table()
{
    location.reload();
}

function showreport(){
  
 

}




function report_list(){

  
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form_new').modal('show'); // show bootstrap modal
   
    //$('#modal_form_new').modal('modal_form_new');
    $('.modal-title').text('Display Records'); // Set Title to Bootstrap modal title
    //(document.getElementById("btnEdit").disabled) = true;
    //(document.getElementById("btnSave").disabled) = false;
    document.getElementById("btnEdit").style.visibility = "hidden";
    document.getElementById("btnSave").style.visibility = "visible";


}


</script>


<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form_new" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">User Form Edit</h3>
            </div>
            <div class="modal-body">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">

                       
                    <center><b>Click Report button to generate the Report....</b></center>


                        
                    </div>
                </form>
            </div>
            <div class="modal-footer">

                <button type="button" id="btnSave" onclick="showreport()" class="btn btn-primary"> <i class="fa fa-times"></i> Report</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->





<h4> <a href=http://10.177.92.2:8080/ranjanCI/Home>Home</a></h4>
</body>
</html>