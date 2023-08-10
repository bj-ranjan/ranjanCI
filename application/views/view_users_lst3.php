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

<div class="jumbotron text-center">
  <h2>User's List::</h2>
  <p>(Resize Permissible)</p> 
</div>

<div class="container-fluid">
	<h3>User Data</h3>
        <br />
        <button class="btn btn-success" onclick="add_user()"><i class="glyphicon glyphicon-plus"></i> Add User--</button>
        
        <br />
        <br />
<div class="row">

	<div class="col-md" style="background-color:lavender;">Sr No</div>
  	<div class="col-md" style="background-color:lavender;">User ID</div>
    <div class="col-md" style="background-color:lavender;">First Name</div>
    <div class="col-md" style="background-color:lavender;">Last Name</div>
    <div class="col-md" style="background-color:lavender;">Delete</div>
    <div class="col-md" style="background-color:lavender;">Update</div>
    <div class="col-md" style="background-color:lavender;">Details</div>

 </div>


  <?php
  $i=1;
  foreach($users as $row)
  {
 ?>
 
  <div class="row">
  <div class="col-md" style="background-color:lavenderblush;"><?php echo $i; ?></div>
  <div class="col"><?php echo $row->user_id; ?></div>
  <div class="col"><?php echo $row->first_name; ?></div>
  <div class="col"><?php echo $row->last_name; ?></div>
  <div class="col"><?php echo "<a href='deletedata?id=".$row->user_id."'>Delete</a>"; ?></div>
  <div class="col"><?php echo "<a href='updatedata?id=".$row->user_id."'>Update</a>"; ?></div>

  
  
  <div class="col"><button class="btn btn-primary edit_detail" relid="<?php echo $row->user_id;  ?>">Edit Me</button></div>

  </div>
   <p>
  
  <?php
  $i++;

  }

  
  echo $links;

  
  ?>
 </p>
 

</div>

<!-- Modal -->
<script type="text/javascript">

var save_method; //for save method string

function reload_table()
{
    location.reload();
}

function save(){
	
	//$('#btnSave').text('saving...');
	var url;


	//url = "<?php echo site_url('Home/ajax_add')?>";
	url = "<?php echo base_url(); ?>Home/ajax_add";
	//alert (url);

	 // ajax adding data to database
	 $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        }
    });

}


function edit(){
  
  //$('#btnSave').text('saving...');
  var url;


  //url = "<?php echo site_url('Home/ajax_add')?>";
  url = "<?php echo base_url(); ?>Home/ajax_edit";
  //alert (url);

   // ajax adding data to database
   $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error Editing.. / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        }
    });

}

function add_user(){

	save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form_new').modal('show'); // show bootstrap modal
   
    //$('#modal_form_new').modal('modal_form_new');
    $('.modal-title').text('Add User:->'); // Set Title to Bootstrap modal title
	  //(document.getElementById("btnEdit").disabled) = true;
    //(document.getElementById("btnSave").disabled) = false;
    document.getElementById("btnEdit").style.visibility = "hidden";
    document.getElementById("btnSave").style.visibility = "visible";


}

function edit_user(){

  save_method = 'edit';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form_new').modal('show'); // show bootstrap modal
   
    //$('#modal_form_new').modal('modal_form_new');
    $('.modal-title').text('Edit User'); // Set Title to Bootstrap modal title
   // (document.getElementById("btnSave").disabled) = true;
    // (document.getElementById("btnEdit").disabled) = false;
    
    document.getElementById("btnSave").style.visibility = "hidden";
    document.getElementById("btnEdit").style.visibility = "visible";
  
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

                       
                       <div class="form-group">
                            <label class="control-label col-md-3">User ID</label>
                            <div class="col-md-9">
                                <input name="uID" placeholder="User ID" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">First Name</label>
                            <div class="col-md-9">
                                <input name="firstName" placeholder="First Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Last Name</label>
                            <div class="col-md-9">
                                <input name="lastName" placeholder="Last Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>


                        
                    </div>
                </form>
            </div>
            <div class="modal-footer">

                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary"> <i class="fa fa-times"></i> Add</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" id="btnEdit" onclick="edit()" class="btn btn-primary">Edit1</button>
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->


<script type="text/javascript">
    $(document).ready(function() {

      $('.edit_detail').click(function(){
          
          edit_user();
          var id = $(this).attr('relid'); //get the attribute value

        
          $.ajax({

                        
              url : "<?php echo base_url(); ?>Home/fetch_single_user",
              data:{id : id},
              method:'GET',
              dataType:'json',
              success:function(response) {
            
            $('[name="uID"]').val(response[0].user_id);          
            $('[name="firstName"]').val(response[0].first_name);
            $('[name="lastName"]').val(response[0].last_name);

                      
            $('#modal_form_new').modal({backdrop: 'static', keyboard: true, show: true});
            }
          });

       });

    });
</script>


<h4> <a href=http://10.177.92.2:8080/ranjanCI/Home>Home</a></h4>
</body>
</html>