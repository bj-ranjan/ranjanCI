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
        <button class="btn btn-success" onclick="add_user()"><i class="glyphicon glyphicon-plus"></i> Add User</button>
        
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

  
  
  <div class="col"><button class="btn btn-primary view_detail" relid="<?php echo $row->user_id;  ?>">Action</button></div>

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

function add_user(){

	save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
	
}


</script>


<div id="modal_form" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"><i class="fa fa-folder"></i> Add User</h3>
      </div>


      <div class="modal-body">
      	 
      	<form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
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
   	

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary"> <i class="fa fa-times"></i> Add</button>
      </div>
  </div>
      
    </div>
  </div>
</div>


<div id="show_modal" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"><i class="fa fa-folder"></i> User Details</h3>
      </div>
      <div class="modal-body">
      	 
        <table class="table table-bordered table-striped">
          <thead class="btn-primary">
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
             
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><p id="first_name"></p></td> 
              <td><p id="last_name"></p></td>

            
              
            </tr>
          </tbody>
       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        
      </div>
     

    </div>
  </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {

      $('.view_detail').click(function(){
          
          var id = $(this).attr('relid'); //get the attribute value

                 
          $.ajax({

          	//alert(id);
          	  
              url : "<?php echo base_url(); ?>Home/fetch_single_user",
              data:{id : id},
              method:'GET',
              dataType:'json',
              success:function(response) {
           	

              	
              	var fname = response[0].first_name;
              	var lname = response[0].last_name;
        		   
        		//$('#first_name').text(fname);
        		$('#first_name').html(fname); 
        		$('#last_name').html(lname);

        		//$('#fname').text(fname_x); 

          
                
              $('#show_modal').modal({backdrop: 'static', keyboard: true, show: true});
            }
          });

      });


    });
</script>


<h4> <a href=http://10.177.92.2:8080/ranjanCI/Home>Home</a></h4>
</body>
</html>