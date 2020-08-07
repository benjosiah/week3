<?php

$err=[];
//http://localhost:1000/?first_name=Josiah&last_name=Ben&email=Rabbimikky%40gmail.com&date=2020-07-29&color=%239e1515&gender=male&department=&password=kkmok
if (isset($_POST['submit'])) {
	$password=$_POST['password'];
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	$specialChars = preg_match('@[^\w]@', $password);

	$color_code=explode("#", $_POST['color']);
	$color=end($color_code);

	if ($_POST['first_name']=='') {
		$err['first_name']="this field should not be empty";
	}
	if ($_POST['last_name']=='') {
		$err['last_name']="this field should not be empty";
	}
	if ($_POST['email']=='') {
		$err['email']="this field should not be empty";
	}elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$err['email']="Not a valid Email";
	}
	if ($_POST['date']=='') {
		$err['date']="this field should not be empty";
	}
	if ($_POST['color']=='') {
		$err['color']="this field should not be empty";
	}
	if ($_POST['department']=='') {
		$err['department']="this field should not be empty";
	}
	if ($_POST['password']=='') {
		$err['password']="this field should not be empty";
	}elseif (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST['password']) < 8) {
		$err['password']="Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
	}

	if (!array_filter($err)) {

		header("location:view.php?first_name=".$_POST['first_name']."&last_name=".$_POST['last_name']."&email=".$_POST['email']."&date=".$_POST['date']."&gender=".$_POST['gender']."&department=".$_POST['department']."&password=".$_POST['password']."&color=".$color);
	}

}

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
			background-color: #eee;
			margin-top: 50px;
		}
		.wrap div{
			margin-left:10px;
			margin-bottom: 7px;
		}
		input[type='text'], select{
			width:50%;
		}
		.err{
			color: red;
		}

	</style>
</head>
<body>
<div class="wrap">
	<form action="" method="post">
		 	<div class="label">
               <label for="">First Name</label>
           </div>
           <div>
               <input type="text" name="first_name" id="first_name">
               <div class="err"> <?php echo $err['first_name']?? ''; ?> </div>
           </div>
            <div class="label">
               <label for="">last Name</label>
           </div>
           <div>
               <input type="text" name="last_name" id="last_name" >
               <div class="err"> <?php echo $err['first_name']?? ''; ?> </div>
           </div>
            <div class="label">
               <label for="">Email</label>
           </div>
           <div>
               <input type="text" name="email" id="email">
               <div class="err"> <?php echo $err['first_name']?? ''; ?> </div>
           </div>
           <div>
                  <label for="">Date of Birth</label>
           </div>
           <div>
               <input type="date" name="date" id="date" >
               <div class="err"> <?php echo $err['date']?? ''; ?> </div>
           </div>
            <div class="label">
               <label for="">Favourite Colour</label>
           </div>
           <div>
               <input type="color" name="color" id="color">
               <div class="err"> <?php echo $err['color']?? ''; ?> </div>
           </div>
            <div class="label">
               <label for="">Gender</label>
           </div>
           <div>	
           		Male: 
               <input type="checkbox" name="gender" id="gender" value="male">
               Female: 
               <input type="checkbox" name="gender" id="gender" value="female">
               <div class="err"> <?php echo $err['gender']?? ''; ?> </div>
           </div>
           <div>
                <label for="">Department</label>
           </div>
           <div>
               <select name="department" id="department">
               		<option value="IT">IT</option>
               		<option value="HR">HR</option>
               </select>
               <div class="err"> <?php echo $err['department']?? ''; ?> </div>
           </div>
            <div class="label">
               <label for="">Password</label>
           </div>
           <div>
               <input type="text" name="password" id="password" >
               <div class="err"> <?php echo $err['password']?? ''; ?> </div>
           </div>
           <div>
               <button type="submit" name="submit" id="submit">
               		submit
               </button>
           </div>
        </form>        
	</div>
</body>
</html>