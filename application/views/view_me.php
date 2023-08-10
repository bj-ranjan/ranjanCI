<!DOCTYPE html>
<html>
<head>
	<title>this is my page</title>
</head>
<body>
	<h1>This is my Form</h1>

	
<?php 
echo form_open("Home/save_user_data");
echo form_label('username');
echo form_input('fname');
echo "<br/>";
echo form_label('password');
echo form_password('password');
echo "<br/>";
echo form_submit('submit','Save');
echo form_close();
//form_input('firstname'); 
//form_close();
?>

</body>
</html>