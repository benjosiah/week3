<?php
$data=$_GET;




?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			background-color: #333;
			padding: 0px;
			margin: 0px;
			color: #000;
		}
		.wrap{
			width: 40%;
			margin: auto;
			background-color: #ddd;
			margin-top: 50px;
		}
		.wrap div{
			width: 90%;
			margin: auto;
			margin-bottom: 7px;
			padding: 20px;
			background-color: #2828
		}
		h3, h4{
			margin: 0px;
		}
		
		

	</style>
</head>
<body>
	<div class="wrap">
		<div>
			<h4>First Name</h4>
			<h3><?php echo $data['first_name'];   ?></h3>
		</div>
		<div>
			<h4>Last Name</h4>
			<h3><?php echo $data['last_name'];   ?></h3>
		</div>
		<div>
			<h4>Email</h4>
			<h3><?php echo $data['email'];   ?></h3>
		</div>
		<div>
			<h4>Gender</h4>
			<h3><?php echo $data['gender'];   ?></h3>
		</div>
		<div>
			<h4>Department</h4>
			<h3><?php echo $data['department'];   ?></h3>
		</div>
		<div style="background-color: <?php echo "#".$data['color']; ?>">
			<h4>Colour</h4>
		</div>
	      
	</div>
</body>
</html>