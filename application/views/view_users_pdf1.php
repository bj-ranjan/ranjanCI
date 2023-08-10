
<html>
<head>
  <link rel="stylesheet" href="<?php echo base_url().'bootstrap-4.3.1-dist/css/bootstrap.css' ?>">
  <link rel="stylesheet" href="<?php echo base_url().'bootstrap-4.3.1-dist/css/style.css' ?>">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <title>PDF Generation</title>  
 
</head>
<body>
   <?php   
  include("mpdf/mpdf.php");
  

  ob_start();
    ?>  
 
 
  
      <div class="row">
       
          
          <table class="table table-bordered" border="1" cellpadding="10" style="width:100%; border: 1px solid #787878;">   
          <tr>
              <th>Sl No.</th>
              <th>User ID</th>
              <th>First Name</th>
              <th>Last Name</th>
            </tr>         
            
            
           
    <?php
  $i=1;
  foreach($users as $row)
  {
 ?>
            <dv>-----------------------------------------------</dv>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $row->user_id;?></td>
              <td><?php echo $row->first_name;?></td>
              <td><?php echo $row->last_name;?></td>
            </tr>              
      

<?php
  $i++;

  }


  ?>
 
  </table>

    
</div>    

  <?php 
        $body = ob_get_clean();
        $body = iconv("UTF-8","UTF-8//IGNORE",$body);
        
        //$mpdf=new \mPDF('c','A4-L'); 
        $mpdf=new \mPDF('c'); 


        $mpdf->SetHTMLHeader('
          <div style="text-align: center; font-weight: bold;">
                NIC NALBARi
          </div>');

        $mpdf->SetHTMLFooter('
        <table width="100%">
        <tr>
        <td width="33%">Date: {DATE j-m-Y}</td>
        <td width="33%" align="center">Page No: {PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">User Details Report</td>
    </tr>
</table>');


        $mpdf->SetDisplayMode('fullwidth');
        //write html to PDF
        $mpdf->WriteHTML($body);
 
        //output pdf
        //$mpdf->Output('tp.pdf','D');

        //open in browser
        $mpdf->Output(userData.'.pdf','D');

        //save to server
        //$mpdf->Output("mydata.pdf",'F');      
  ?>          
 
</body>
</html>