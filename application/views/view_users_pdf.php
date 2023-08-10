
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" version="XHTML+RDFa 1.0" dir="ltr" class="js">
<head profile="http://www.w3.org/1999/xhtml/vocab"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
  <title>PDF Generation</title>  
 
</head>
<body>
   <?php   
  include("mpdf/mpdf.php");
  

  //include("connect.php"); 
  //$nquery = mysqli_query($con,"select * from bookedseat where book_id = $pnr ");
  //$row = mysqli_fetch_array($nquery); 
 // $seat = explode(",",$row['seat_no']);
 // $N = count($seat);


  // create an object
  ob_start();
    ?>  
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css"> 
  <link rel="stylesheet" href="dist/css/user.css">  
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css"> 
  <section class="user"> 
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> NIC User Information, Govt. of India&nbsp;|&nbsp;
            
          </h2>
        </div>  
    <hr/>
      </div> 
    
      
    <br/>
      <div class="row">
        <div class="col-xs-12 table-responsive">
          
          <table class="table table-bordered" style="width:100%; border: 1px solid #787878;"><tbody>          
            <tr>
              <td>Sl No</td>
              <td>User ID</td>
              <td>First Name</td>
              <td>Last Name</td>
            </tr>  

    <?php
  $i=1;
  foreach($users as $row)
  {
 ?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $row->user_id;?></td>
              <td><?php echo $row->first_name;?></td>
              <td><?php echo $row->last_name;?></td>
            </tr>              
            </tbody>
          </table>

        </div>       
      </div>    
   
</section>

<p>
<?php
  $i++;

  }


  ?>
 </p>

  <?php 
        $body = ob_get_clean();
        $body = iconv("UTF-8","UTF-8//IGNORE",$body);
        
        $mpdf=new \mPDF('c','A4-L'); 
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