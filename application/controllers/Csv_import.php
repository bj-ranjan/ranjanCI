<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csv_import extends CI_Controller {
 
 public function __construct()
 {
  parent::__construct();
  $this->load->model('csv_import_model');
  $this->load->library('csvimport');
 }

 function index()
 {
  $this->load->view('csv_import');
 }

 function load_data()
 {
  $this->load->model('csv_import_model');
  $result = $this->csv_import_model->select();
  $output = '
   <h3 align="center">Imported User Details</h3>
        <div class="table-responsive">
         <table class="table table-bordered table-striped">
          <tr>
           <th>Sl No</th>
           <th>User ID</th>
           <th>First Name</th>
           <th>Last Name</th>
           
          </tr>
  ';
  $count = 0;
  if($result->num_rows() > 0)
  {
   foreach($result->result() as $row)
   {
    $count = $count + 1;
    $output .= '
    <tr>
     <td>'.$count.'</td>
     <td>'.$row->user_id.'</td>
     <td>'.$row->first_name.'</td>
     <td>'.$row->last_name.'</td>
    
    </tr>
    ';
   }
  }
  else
  {
   $output .= '
   <tr>
       <td colspan="5" align="center">Data not Available</td>
      </tr>
   ';
  }
  $output .= '</table></div>';
  echo $output;
 }

 function import()
 {
  $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
  foreach($file_data as $row)
  {
   $data[] = array(
    'user_id' => $row["user_id"],
    'first_name' => $row["first_name"],
          'last_name'  => $row["last_name"],
          
   );
  }
  $this->csv_import_model->insert($data);
 }
 
  
}
