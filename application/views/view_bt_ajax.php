<!DOCTYPE html>
<html>
<head>
	<title>This is about using Bootstraps</title>
	<link rel="stylesheet" href="<?php echo base_url().'bootstrap-4.3.1-dist/css/bootstrap.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url().'bootstrap-4.3.1-dist/css/style.css' ?>">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
</head>
<body>
<div class="container">
 <?php
  $msg=$this->session->flashdata('msg');
  if ($msg!=""){
    echo "<div class='alert alert_success'>'$msg'</div>";
  }
 ?>
	<div class="col-md-6">

		<div class="card mt-5">
  			<div class="card-header">
    		Registration Form Ajax:
  			</div>

  		<form action="<?php echo base_url().'Home/index'?>" name="registerForm" id="registerForm" method="post">
  		<div class="card-body register">
    	
    	<p class="card-text">Fill Details Here:</p>
    	<div class="form-group">
    		<label for="name">First Name</label>
    		<input type="text" name="first_name" id="first_name" value="<?php echo set_value('first_name') ?>" class="form-control <?php echo (form_error('first_name')!="") ? 'is-invalid' : '' ;?>" placeholder="First Name">
    		<p class="invalid-feedback"> <?php echo strip_tags(form_error('first_name'));?> </p>
        <label id="msg"></label>
    	 </div>

    	<div class="form-group">
    		<label for="name">Last Name</label>
			<input type="text" name="last_name" value="<?php echo set_value('last_name') ?>" class="form-control <?php echo (form_error('last_name')!="") ? 'is-invalid' : '' ;?>" placeholder="Last Name">
			<p class="invalid-feedback"> <?php echo strip_tags(form_error('last_name'));?> </p>
    	</div>

    	<div class="form-group">
    		<button class="btn btn-block btn-primary">Register</button>
    	</div>

    	</form>
      
      <div class="alert alert-primary" align="middle" role="alert">
      <a href="http://10.177.92.2:8080/ranjanCI/Home/dispdata" class="alert-link">List Users</a>
      </div>
      <div class="alert alert-primary" align="middle" role="alert">
      <a href="http://10.177.92.2:8080/ranjanCI/Home/repdata" class="alert-link">Reports</a>
      </div>
      <div class="alert alert-primary" align="middle" role="alert">
      <a href="http://10.177.92.2:8080/ranjanCI/Home/pdfrepdata" class="alert-link">PDF Reports</a>
      </div>
 
      <div class="alert alert-primary" align="middle" role="alert">
      <a href="http://10.177.92.2:8080/ranjanCI/Ajaxsearch" class="alert-link">Search Users</a>
      </div>

       <div class="alert alert-primary" align="middle" role="alert">
      <a href="https://docs.google.com/forms/d/e/1FAIpQLSdgXvIkSj3FVSzQ0IfpYoXRmnNIVaILYcZygRhHIXviT2JhmQ/viewform?" class="alert-link">Emp Data Collection</a>
      </div>


  </div>
</div>


 Total Records:<?php echo $this->Auth_model->get_count(); ?> 

	</div>
  <br></br>



</div>

<script type="text/javascript">
// Ajax post
$(document).ready(function() 
{

$("#first_name").blur(function() 
{

var first_name = $('#first_name').val();
//alert(echo base_url('/index.php/AjaxController/checkUser'));


  if(first_name!="")
  {
    jQuery.ajax({
    type: "POST",
    url: "<?php echo base_url('/Home/checkUser'); ?>",

    dataType: 'html',
    data: {first_name: first_name},
    success: function(res) 
    {
      if(res==1)
      {
      $("#msg").css({"color":"red"});
      $("#msg").html("This user name already exists");
      }
      else
      {
      $("#msg").css({"color":"green"});
      $("#msg").html("This user name was not inserted previously"); 
      }
      
    },
    error:function()
    {
    alert('some error');  
    }
    });
  }
  else
  {
  alert("pls enter your first_name");
  }

});
});
</script>


<!-- attaching onclock listener-->

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="showDetails(this);">
  List of Records:
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">List of Records</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <p>First Name: <span id="first_name"></span></p>
        <p>Last Name: <span id="last_name"></span></p>
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  
function showDetails(button){

  var userid=button.id;
}

</script>


</body>
</html>

