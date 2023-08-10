<!DOCTYPE html>
<html>
<head>
	<title>This is about using Bootstraps</title>
	<link rel="stylesheet" href="<?php echo base_url().'bootstrap-4.3.1-dist/css/bootstrap.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url().'bootstrap-4.3.1-dist/css/style.css' ?>">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	
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
    		Registration Form:
  			</div>

  		<form action="<?php echo base_url().'Home/index'?>" name="registerForm" id="registerForm" method="post">
  		<div class="card-body register">
    	
    	<p class="card-text">Fill Details Here:</p>
    	<div class="form-group">
    		<label for="name">First Name</label>
    		<input type="text" name="first_name" value="<?php echo set_value('first_name') ?>" class="form-control <?php echo (form_error('first_name')!="") ? 'is-invalid' : '' ;?>" placeholder="First Name">
    		<p class="invalid-feedback"> <?php echo strip_tags(form_error('first_name'));?> </p>
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

  </div>
</div>


 Total Records:<?php echo $this->Auth_model->get_count(); ?> 

	</div>
  <br></br>



</div>


</body>
</html>

