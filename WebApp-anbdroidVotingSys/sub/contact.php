<?php
session_start();
    mysql_select_db('epics_votings',mysql_connect('localhost','root',''));
    $uid = $_SESSION['user_id'];
    $ok ="";
if (isset($_POST['btn'])) {
	if(!empty($_POST['contactext']))
	{   $ct = $_POST['contactext'];
		if(mysql_query("INSERT INTO feedback(u_id ,message) VALUES($uid,$ct)")){ 
		$ok="Your message has been recorded !";}
		else
		{
			$ok = "<h5 style=\"color:red;\">Please fill the empty field</h5>";
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="..\style\css\home.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<link rel="stylesheet" href="..\style\css\contact.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
	<nav class="navbar">
		<span class="open-slide">
			<a href="#" onclick="openSlideMenu()">
				<svg width="30" height="30">
					<path d="M0,5 30,5" stroke="#fff" stroke-width="5"/>
					<path d="M0,14 30,14" stroke="#fff" stroke-width="5"/>
					<path d="M0,23 30,23" stroke="#fff" stroke-width="5"/>
			</a>
		</span>
		<ul class="navbar-nav">
			<li><a style="text-decoration:none"class="a" href="home.php">HOME</a></li>
			<li><a style="text-decoration:none">Pro So!ution</a></li>
		</ul>
		<div style="padding: 8px;">
		<div class="logout" style="float: right;">
			<a style="text-decoration: none;color: white;" href="endSession.php">LOGOUT</a>
		</div>
	    </div>
	</nav>
	<div id="side-menu" class="side-nav">
		<a class="btn-close" onclick="closeSideMenu()" href="">&times;</a>
		<div class="two">
		<a href="home.php">HOME<i class="fa fa-user-circle"></i></a>
		<a href="profile.php">PROFILE<i class="fa fa-id-badge"></i></a>
		<a href="history.php">ACTIVITY<i class="fa fa-history"></i></a>
		<a href="contact.php">CONTACT<i class="fa fa-paper-plane"></i></a>
		<a href="about.php">ABOUT<i class="fa fa-address-card"></i></a>
	    </div>
	</div>
	
	<div id="main">
		<div class="main-contact">
			<div class="contact-in" id="co"> </div>
            <div class="contact">
            <div style="position:relative;color:black; top: 40px;width:40vh;">
                   <h2 style="font-family: 'Montserrat', sans-serif; position: relative;">Get In Touch</h2>
                   <h5 style="position:relative;top:-15px; opacity: 0.5; line-height: 50px;" ><i>" Always Strive For Better Work "</i></h5>
            </div>

            <div class="main-form">
                <form action="contact.php" method="post" class="box-form">
                   <div class="form-group"> <input class="form-control" type="text"  name="username"  placeholder="Name" ></div>
                   <div class="form-group"> <input class="form-control" type="email" name="useremail" placeholder="Email"></div>
                   <div class="form-group"> <textarea class="form-control" name="contactext" placeholder="Enter Your Message Here!" rows="8" cols="44" wrap="hard"></textarea></div>
                    <button class="btn btn-primary" name="btn" type="submit">Submit</button> 
                    <input class="btn btn-warning" type="reset" value="Reset">
                    <p style="color:green;"><?php echo $ok;?></p>
                </form>
             </div>

             <div class="main-email ">
                 <h3 style="font-size:22px;">Email :</h3>
                 <h4 style="opacity: 0.8;">asaini.cse17@chitkarauniversity.edu.in</h4>
                 <h4 style="opacity: 0.8;">sarun6153@gmail.com</h4>
             </div>
             </div>
		</div>
	</div>








<script>
	function openSlideMenu(){
		document.getElementById('side-menu').style.width = '250px';
		document.getElementById('main').style.marginLeft = '250px'; 
	}
	function closeSideMenu()
	{
		document.getElementById('side-menu').style.width = '0';
		document.getElementById('main').style.marginLeft = '0'; 
	}
</script>

</body>
</html>