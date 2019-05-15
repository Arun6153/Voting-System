<?php
mysql_select_db('epics_votings',mysql_connect('localhost','root','','epics_votings'));
$check="";
  if(isset($_POST['btn']))
  { 
  	   $name =$_POST['name'];
       $email =$_POST['email'];
       $pass =$_POST['pass'];
       $phno =$_POST['phno'];
       $age  =$_POST['age'];
       //$passC=$_POST['passC'];
     if(!empty($name) && !empty($email) && !empty($phno) && !empty($age) && !empty($pass))
     {
     	if($pass == $_POST['passC']){
  		   
  		    $q = "INSERT INTO login(u_email,u_name,u_phone_no,age,password) VALUES('$email','$name','$phno','$age','$pass')";

  		    if(mysql_query($q))
  		    { 
  		    	mail($email, 'Team Perfect Solution','Congratulations You have been successfuly registered!','From: sainibrothers6153@gmail.com');
  		  			header("Location: ../index.php");
  			}
  		}
  		else{
  			$check="Password did'nt matches!\n";
  		}
  	 }
  	 else{
  			$check="Field is empty!\n";
  		}
  }
?>

<!DOCTYPE>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="..\style\css\register.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	
</head>
<style type="text/css">
	h5{
	margin-left: 20%;
}
h5 a{
	text-decoration: none;color: black;
	transition: 0.3s;
}
 h5 a:hover{
color::#130f40;
border-bottom: 1px solid #130f40;
transition: 0.3s;
}
</style>
<body>

<div class="row">
	<div class="left-col">
		<img src="..\style\images\user.png">
	</div>
	<div class="right-col">
		<center>
			<h2 style="margin-top:50px;">Become Member</h2>
			<form method="POST" action="register.php">
			     <input type="text"     name="name"  placeholder="Name">
			     <input type="email"    name="email" placeholder="Email">
			     <input type="text"     name="phno"  placeholder="Phone No. (+91)">
			     <input type="number"   name="age"   placeholder="Age">
			     <input type="password" name="pass"  placeholder="Password" min=6 max="16">
			     <input type="password" name="passC" placeholder="Confirm Password">
			     <p style="color: red;"><?php echo $check."\r\n";?></p>
			     <button type="submit" style="margin-top: 25px;"  name="btn">Register</button></form>
		    </form>
		    <h5><a href="..\index.php"> Old User?Click Here.</a></h5>
		</center>
	</div>
</div>

</body>
</html>