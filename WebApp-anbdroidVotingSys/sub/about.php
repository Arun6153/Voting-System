<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="..\style\css\home.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<link rel="stylesheet" href="..\style\css\about.css">
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

<dir class="container" style="width:70vw; margin-top: 20vh;">
<center>
			<fieldset style="font-size:16px;border: 1px solid white;box-shadow: 0 0 8px 2px black;padding:20px 5vw;text-align:justify; text-transform: uppercase;
    height: auto; background-color:rgba(0,0,0,0.9);word-spacing: 5px;">
				<legend style="font-size: 25px;color: white;">Pro So!ution</legend> 
			<p style="color:white;">In <span style="color:white;background-color: #4286f4;">ONLINE VOTING SYSTEM</span> a voter can use his/her voting right online without any difficulty. He/She has to be registered first for him/her to vote. Registration is mainly done by the system administrator for security reasons. The system Adminstrator registers the voters on a special site of the system visited by him only by simply filling a registration form to register voter.
After registration, the voter is assigned a secret Voter ID with which he/she can use to log into the system and enjoy services provide by the system such as voting. If invalid/wrong details are submitted, then the citizen is not registered to vote.</p>
		    </fieldset>
	</center>
</dir>








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