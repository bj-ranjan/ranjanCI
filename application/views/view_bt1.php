<!DOCTYPE html>
<html>
<head>
  <title>This is about using Bootstraps</title>
  <link rel="stylesheet" href="<?php echo base_url().'bootstrap-4.3.1-dist/css/bootstrap.css' ?>">
  <link rel="stylesheet" href="<?php echo base_url().'bootstrap-4.3.1-dist/css/style.css' ?>">
  
</head>
<body>
<div class="container-fluid">
  <h1>NIC NALBARI</h1>

 
  <div class="container-fluid">     
    <div class="row">
      <div class="col-md-6">

        
    <div class="card mt-5">
        <div class="card-header">
        Register Here
        </div>

      <form action="<?php echo base_url().'Home/index'?>" name="registerForm" id="registerForm" method="post">
      <div class="card-body register">
      
      <p class="card-text">Fill your details here:</p>
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

     
  </div>
</div>
</div>



      <div class="col-md-6">
        
        <div class="card mt-5">
          <div class="card-header">
          2nd Part Registration
          </div>

     
      <div class="card-body register">
      
      <p class="card-text">Fill your details here:</p>
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

      

     
  </div>
  </div>


  


</div>

</div>
<div class="row">

<div class="col-md-12"> 
    <div class="form-group">
        <button class="btn btn-block btn-primary">Register</button>
    </div>
</div>

</div>





</form>

<div class="row">

<div class="col bg-warning" class="col-md-12"> 
    hi
</div>

</div>

  <br>
  <p>This example demonstrates a 33% split on small, medium, large and xlarge devices. On extra small devices, it will stack (100% width).</p>      
  <div class="container-fluid">     
    <div class="row">
      <div class="col-sm bg-success">col-sm</div>
      <div class="col-sm bg-warning">col-sm</div>
      <div class="col-sm bg-success">col-sm</div>
    </div>
  </div>
</body>
</html>

