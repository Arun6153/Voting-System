<?php
	$key="";
	session_start();
	if(isset($_POST['submit']))
  	{
  		if(!empty($_POST['title']) && !empty($_POST['description']))
  		{
  	    	mysql_select_db('epics_votings',mysql_connect('localhost','root',''));
  			$uid = $_SESSION['user_id'];
  			$qtopic = $_POST['title'];
  			$qdesc = $_POST['description']; 
  		
  			$key = uniqid();

  			mysql_query("INSERT into question(u_id,question_topic,question_brief,keytokken) VALUES('$uid','$qtopic','$qdesc','$key')");
  			 
  			 echo "<script>
  						alert(\"Copy the Key and share it among voters: \");
  					</script>
  			     ";
  		} 		
  	
  	}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="..\..\style\css\home.css">
	<link rel="stylesheet" href="Asset\host.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
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
			<li><a class="a" href="../home.php">HOME</a></li>
			<li><a class="logo" style="text-decoration:none">Pro So!ution</a></li>
		</ul>
		<div style="padding: 8px;">
		<div class="logout" style="float: right;">
			<a style="text-decoration: none;color: white;" href="../endSession.php">LOGOUT</a>
		</div>
	    </div>
	</nav>
	<div class="parallax"></div>
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
		<center>
		<div class="size">
		<form action="host.php" method="POST" >
			<h4>Topic Title :</h4><input type="text" name="title" placeholder="Topic Title"><br><br>
			<h4>Brief About The Dilemma :</h4><textarea cols="43" name="description" rows="3" placeholder="Brief of your title"></textarea><br><br>
			<button id="myBtn" type="submit" name="submit">SUBMIT</button>
			<p style="color:green;">Your key will display below after submission :<input style="color:black;text-align: center;width:120px;height: 30px;margin-left: 5px;" value="<?php echo $key; ?>"></p>
		</form>
	    </div></center>
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