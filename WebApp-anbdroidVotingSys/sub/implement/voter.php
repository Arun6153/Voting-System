<?php
mysql_select_db('epics_votings',mysql_connect('localhost','root','','epics_votings'));
session_start();
$userid="";
$keyG="";$total=0;
$userid=$_SESSION['user_id'];
$keyG = $_SESSION['keyGen'];
	    
	 	 $qAll = mysql_query("SELECT question_topic FROM question WHERE keytokken='$keyG'");
	 	 $q_t = mysql_fetch_array($qAll);

	 	 $qAl = mysql_query("SELECT question_brief FROM question WHERE keytokken='$keyG'");
	 	 $q_b = mysql_fetch_array($qAl);
$display="";
	 	 if(isset($_POST['submit']))
	 	 {
	 	 	$test=mysql_query("SELECT * FROM answer_key WHERE u_id='$userid' AND keytokken='$keyG'");
	 	 	$tt = mysql_fetch_array($test);
	 	 	if(count($tt)==1)
	 	 	{
	 	 		if ($_POST['choice']=="true" || $_POST['choice']=="flse") {
	 	 			$ch=$_POST['choice'];
	 	 			mysql_query("INSERT into answer_key(u_id,keytokken,ckeck_bool) VALUES('$userid','$keyG','$ch') ");
	 	 			$display = "Your response is successfuly registered";
	 	 		}
	 	 		elseif ($_POST['choice']=="else" && !empty($_POST['brief'])) { 	 	
	 	 			$ch=$_POST['brief'];
	 	 		   mysql_query("INSERT INTO answer_key (u_id,keytokken,breif) VALUES('$userid','$keyG','$ch')");
	 	 			$display = "Your response is successfuly registered";
	 	 		}
	 	 		else{
	 	 			$display= "Please fill the empty fieldset";
	 	 		}
	 	 	}
	 	 	else{
	 	 			$display = "You already have voted";
	 	 		}
	 	 }
	 	 $i=0;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="..\..\style\css\home.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="Asset\voter.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
    	
    	.small-box a{
    		color:darkgreen;
    		font-size: 20px;	
       	}

    </style>
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
			<li><a class="a" href="../home.php" style="text-decoration: none;">HOME</a></li>
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
		<a href="../home.php">HOME<i class="fa fa-user-circle"></i></a>
		<a href="../profile.php">PROFILE<i class="fa fa-id-badge"></i></a>
		<a href="../history.php">ACTIVITY<i class="fa fa-history"></i></a>
		<a href="../contact.php">CONTACT<i class="fa fa-paper-plane"></i></a>
		<a href="../about.php">ABOUT<i class="fa fa-address-card"></i></a>
	    </div>
	</div>
	



	<div id="main">
		<center>
		<form action="voter.php" method="POST">
			<h4>Topic:</h4><br><p><?php echo $q_t[0]; ?></p><br><br>
			<h4>Brief about the dilemma:</h4><br><p><?php echo $q_b[0]; ?></p></textarea><br><br>
			<h4><input type="radio" name="choice" value="true" id="IF" placeholder="In Favour"> : In Favour</h4><br>
			<h4><input type="radio" name="choice" value="flse" id="NIF" placeholder="Not In Favour" style="margin-left: 70px; "> : Not In Favour</h4><br>
			<h4><input type="radio" name="choice" value="else" id="ooo" placeholder="Not In Favour"> : Not in either of side</h4><br>
			<div id="div1"><textarea cols="45" rows="6" name="brief" placeholder="Enter Explanation"></textarea></div><br><br>
			<input type="submit" name="submit">
		</form>
	    </center>
	    <center style="color: red;line-height:0;margin-top: -60px;"><?php echo $display;?></center>

		<div class="counter">
	    	<div class="counter-box">
	    		<h5 class="small-box"><b>IN FAVOUR:</b><br><a style="position: relative;text-decoration: none;" href="">
	    			<?php 
	    			$count = 0;
	    			$q = mysql_query("SELECT * FROM answer_key WHERE ckeck_bool='true' AND keytokken='$keyG'"); 
	    			while($data = mysql_fetch_array($q))
	    			{
	    				$count++;
	    			}$total-=$count;
	    			echo $count;
	    			?>	    				
	    			</a></h5>
	    		<h5 class="small-box" ><b>NOT IN FAVOUR:</b><br><a style="position: relative;text-decoration: none;" href="">
	    			<?php
	    				$count = 0;
	    			$q = mysql_query("SELECT * FROM answer_key WHERE ckeck_bool='flse' AND keytokken='$keyG'"); 
	    			while($data = mysql_fetch_array($q))
	    			{
	    				$count++;
	    			}$total-=$count;
	    			echo $count;	
	    			?></a></h5>
	    		<h5 class="small-box"><b>TOTAL:</b><br><a style="position: relative; text-decoration: none;" href="">
	    			<?php

	    			$count = 0;
	    			$q = mysql_query("SELECT * FROM answer_key WHERE keytokken='$keyG'"); 
	    			while($data = mysql_fetch_array($q))
	    			{
	    				$count++;
	    			}$total+=$count;
	    			echo $count;

	    			 ?>
	    			</a></h5>
	    			<h5 style="margin-bottom: 20px;" class="small-box"><b>OTHER:</b><br><a style="position: relative;text-decoration: none;" href="">
	    			<?php
	    			

	    			echo $total;	
	    			?></a></h5>
	    		<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#demo">Show People</button>
	    	</div>
	    </div>
	    <div style="margin-left:10vw;width: 80%;">    
	    <div id="demo" class="collapse">
	   <?php

	      $list_one = mysql_query("SELECT * FROM answer_key WHERE keytokken = '$keyG'");
	     // $for_fetch =mysql_fetch_array($list_one);
	   ?>
	   <div class="row justify-content-center" style="margin-top:20px;">
	   	    <table class="table">
	   		     <thead>
	   		     	<tr>
	   		     		<th>S.no</th>
	   		     		<th>Name</th>
	   		     		<th>In favour/Not in favour</th>
	   		     		<th>Brief</th>
	   		        </tr>
	   		    </thead>
	   		  <?php	    
	   		      while ($row = mysql_fetch_array($list_one)):
	   		   ?>
	   			<tr>
	   				<td><?php $i++; echo $i;?></td>

	   				<td><?php 
	   				$pp = mysql_query("SELECT * FROM login WHERE u_id=$row[1]");
	   				 while($nn=mysql_fetch_array($pp))
	   				 {
	   				 	echo $nn[2];
	   				 	break;
	   				 }
	   				?></td>
	   				
	   				<td><?php echo $row[3];?></td>
	   				<td><?php echo $row[4];?></td>	
	   			</tr>
	   		   <?php endwhile; ?>
	   			
	   	</table>
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
<script>
$(document).ready(function(){
	$("#div1").hide();
    $("#ooo").click(function(){
    $("#div1").fadeIn("2000");
  });
     $("#IF").click(function(){
    $("#div1").hide("slow");
  });
      $("#NIF").click(function(){
    $("#div1").hide("slow");
  });




});
</script>
</body>
</html>