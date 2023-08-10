<!DOCTYPE html>
<html>
<head>
<title>Registration form</title>
</head>

<body>
 <?php
  $i=1;
  foreach($data as $row)
  {
  ?>
	<form method="post">
		<table width="600" border="1" cellspacing="5" cellpadding="5">
  <tr>
    <td width="230">Enter Your First Name </td>
    <td width="329"><input type="text" name="first_name" value="<?php echo $row->first_name; ?>"/></td>
  </tr>
 
 <tr>
    <td width="230">Enter Your Last Name </td>
    <td width="329"><input type="text" name="last_name" value="<?php echo $row->last_name; ?>"/></td>
  </tr>

  
  <tr>
    <td colspan="2" align="center">
	<input type="submit" name="update" value="Update Records"/></td>
  </tr>
</table>
	</form>
	<?php } ?>
</body>
</html>