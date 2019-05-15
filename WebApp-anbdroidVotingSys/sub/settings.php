<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="..\style\css\home.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<link rel="stylesheet" href="..\style\css\settings.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
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
			<li><a href="home.php">HOME</a></li>
			<li><a href="profile.php">PROFILE</a></li>
			<li><a href="history.php">ACTIVITY</a></li>
			<li><a  class="a" href="settings.php">SETTING</a></li>
			<li><a href="contact.php">CONTACT</a></li>
			<li><a href="about.php">ABOUT</a></li>		
		</ul>
		<div style="float:right;color:white;"><li><a style="text-decoration: none;" href="endSession.php"> LOGOUT </a></li></div>
	</nav>
	<div id="side-menu" class="side-nav">
		<a class="btn-close" onclick="closeSideMenu()" href="">&times;</a>
		<div class="two">
		<a href="home.php">HOME<i class="fa fa-user-circle"></i></a>
		<a href="profile.php">PROFILE<i class="fa fa-id-badge"></i></a>
		<a href="history.php">ACTIVITY<i class="fa fa-history"></i></a>
		<a href="settings.php">SETTINGS<i class="fa fa-cog"></i></a>
		<a href="contact.php">CONTACT<i class="fa fa-paper-plane"></i></a>
		<a href="about.php">ABOUT<i class="fa fa-address-card"></i></a>
	    </div>
	</div>
	
	<div id="main">
		<form action="settings.php" method="POST">
			<input type="file" name="profile-pic">
		</form>
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