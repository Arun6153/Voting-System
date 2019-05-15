<?php
    session_start();
    mysql_select_db('epics_votings',mysql_connect('localhost','root',''));
    $uid = $_SESSION['user_id'];

    $n=mysql_query("SELECT u_name FROM login WHERE u_id=$uid");
     $name =mysql_fetch_array($n);
    $e=mysql_query("SELECT u_email FROM login WHERE u_id=$uid");
     $email =mysql_fetch_array($e);
    $p=mysql_query("SELECT u_phone_no FROM login WHERE u_id=$uid");
     $phno =mysql_fetch_array($p);
    $a=mysql_query("SELECT age FROM login WHERE u_id=$uid");
    $age  =mysql_fetch_array($a);
$ok="";

    if(isset($_POST['newdata']))
    {
      $nname = $_POST['name'];
      $nemail = $_POST['email'];
      $nphno = $_POST['phno'];
      $nage = $_POST['age'];
      $new =  mysql_query("UPDATE login SET u_email='$nemail' ,u_name='$nname', u_phone_no ='$nphno' ,age ='$nage'  WHERE u_id= $uid ");
      if($new)
      {
        echo "<meta http-equiv = 'refresh' content='0;url=profile.php'>";
        $ok =  " Succesully Updated ";
      }
      else{
        $ok = "Data isnt Updated";
      }
    }
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="..\style\css\home.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<link rel="stylesheet" href="..\style\css\profile.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
		<a href="home.php">HOME<i class="fa fa-home"></i></a>
		<a href="profile.php">PROFILE</a>
		<a href="history.php">ACTIVITY</a>
		<a href="contact.php">CONTACT</a>
		<a href="about.php">ABOUT</a>
	    </div>
	</div>
	
<div id="main">
	<center>
		 <div class="text-center profile-card" style="margin:15px;background-color:#ffffff;">
            <div class="profile-card-img" style="background-image:url(&quot;iceland.jpg&quot;);height:150px;background-size:cover;">
            	
            </div>
            <div>
            	<img class="rounded-circle" src="..\style\images\user.png" height="150px" style="margin-top:-70px;">
                <h3><?php echo $name['u_name']; ?></h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p class="text-right">Name: </p>
                    <p class="text-right">Email:</p>
                    <p class="text-right">Phone Number:</p>
                    <p class="text-right">Age:</p>
                </div>
                <div class="col-md-6">
                    <p class="text-left"><?php echo $name['u_name']; ?></p>
                    <p class="text-left"><?php echo $email['u_email']; ?> </p>
                    <p class="text-left"><?php echo $phno['u_phone_no']; ?></p>
                    <p class="text-left"><?php echo $age['age']; ?></p>
                    <p class="text-left" style="color:green;"><?php echo $ok; ?></p>

                </div>
            </div>
         </div>
     </center>
<div class="modal fade" id="orangeModalSubscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-warning" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header text-center">
        <h4 class="modal-title white-text w-100 font-weight-bold py-2">Update Info</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body form-control" style="height: auto;">
      	<form action="profile.php" method="POST">
        <div class=" form-group">
        	<label data-error="wrong" data-success="right" for="form3">Your Name</label>
          <input style="border: none; padding:5px;border-bottom:1px solid grey; margin-top: 10px; " name="name" type="text" value="<?php echo $name['u_name'];?>">
        </div>

        <div class="md-form form-group">
          <label data-error="wrong" data-success="right" for="form2">Your Email</label>
           <input style="border: none; padding:5px;border-bottom:1px solid grey; margin-top: 10px; " name="email" type="email" value="<?php echo $email['u_email'];?>">
        </div>

         <div class="md-form form-group">
          <label data-error="wrong" data-success="right" for="form2">Phone No.</label>
           <input style="border: none; padding:5px;border-bottom:1px solid grey; margin-top: 10px; " name="phno" type="number" value="<?php echo $phno['u_phone_no'];?>">
        </div>

         <div class="md-form form-group">
          <label data-error="wrong" data-success="right" for="form2">Your Age</label>
           <input style="border: none; padding:5px;border-bottom:1px solid grey; margin-top: 10px; " name="age" type="number" value="<?php echo $age['age'];?>">
        </div>

        <div class="modal-footer justify-content-center">
        <button class="btn btn-warning" name="newdata">Submit</button>
        </div>
        </form>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>

<div class="text-center">
  <a href="" class="btn btn-primary" data-toggle="modal" data-target="#orangeModalSubscription">Edit</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>