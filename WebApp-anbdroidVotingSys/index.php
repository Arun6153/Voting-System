<?php
session_start();
$_SESSION['user_id'] = "";
mysql_select_db('epics_votings',mysql_connect('localhost','root','','epics_votings'));
   $not="";
  if(isset($_POST['btn']))
  {
  	$exec=mysql_query("SELECT * FROM login");
  	while($data = mysql_fetch_array($exec)) 
  	{
  		if($data['u_email']==$_POST['email'] && $data['password']==$_POST['pass'])
  		{
  			$_SESSION['user_id'] = $data['u_id'];

  			header("Location: sub/home.php");
  		}
  	}
  	 $not = "Invalid email or password!";

  }
?>

<!DOCTYPE>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style\css\login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	
</head>
<body>

<div class="row">
	<p class="para"></p>
	<div class="left-col">
		<img src="style\images\user.png">
	</div>
	<div class="right-col">
		<h2>Member Login</h2>
		<form method="POST" action="index.php">
			<input type="email" class="fa fa-envelope" name="email" placeholder="Email"><br><br>
			<input type="password" class="fa fa-lock" name="pass" placeholder="Password"><br><br><br>
			<p style="color: red;margin-top: -3vh;margin-left: 4vh;"><?php echo $not; ?></p>
			<button type="submit" name="btn">Login</button>
		</form>
		<h5><a href="sub/register.php"> New User! Register Here.</a></h5>
	</div>
</div>

</body>
</html>
