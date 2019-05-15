<?php
if(isset($_POST['first_btn']))
{
	header("Location: implement/host.php");
} 
mysql_select_db('epics_votings',mysql_connect('localhost','root',''));
$notAkey="";
if (isset($_POST['checkKey'])) {
	$k = $_POST['eKey'];
	$exec=mysql_query("SELECT * FROM question");
	 while($data = mysql_fetch_array($exec)) 
  	  {
  	  	$newK= $data['keytokken'];
  	  	if($newK==$k)
  		{
  			session_start();
  			$_SESSION['keyGen'] = $k;
   			header("Location: implement/voter.php");
  			break;
  		}
  	 }
  	 	$notAkey = " Key is Incorrect";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="..\style\css\home.css">
	<link rel="stylesheet" href="..\style\css\homecontent.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<style type="text/css">
	.move{
		position: relative;
		margin-left: 40vh;
		box-shadow: none;
		width: 20px;
		height: 20px;
	}
	.move h3{
		margin-top: 3px;
	}
</style>
<body >
	<nav class="navbar">
		<span class="open-slide">
			<a href="#" onclick="openSlideMenu()">
				<svg width="30" height="30">
					<path d="M0,5 30,5" stroke="#ffffff" stroke-width="5"/>
					<path d="M0,14 30,14" stroke="#ffffff" stroke-width="5"/>
					<path d="M0,23 30,23" stroke="#ffffff" stroke-width="5"/>
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
		<img src="..\style\images\logo.png" height="90" width="150">
		<form action="home.php" method="POST">
		<div class="main-body">
			<div class="main-btn one1">
				<button name="first_btn">DILEMMA</button>
			</div>

			<div class="main-btn two2">
    			<button type="button" data-toggle="modal" data-target="#myModal" name="EKEY" >VOTE</button>
    			<p style="color:red;position: relative;top:50%; left:58%;font-size: 20px;"><?php echo $notAkey;?></p>
			</div>
		</div>
	</form>

	<div id="myModal" class="modal fade" role="dialog">
         <div class="modal-dialog">

    <!-- Modal content-->
         <div class="modal-content" id="try">
         <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">QUESTION KEY</h4>
         </div>
         <div class="modal-body">

         <form action="home.php" method="POST">
         <input style="border: none; padding:5px;border-bottom:1px solid grey; " type="text" placeholder="Enter Key Here!" name="eKey">
         <button style="padding:5px;border-radius: 5px; border: none;border-bottom:1px solid grey;color: white;background-color: black;" name="checkKey">Check</button>
         </form>

         </div>
         <div class="modal-footer">
         <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
         </div>
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>