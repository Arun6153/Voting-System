<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="..\style\css\home.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="..\style\css\history.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
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
		<a href="home.php">HOME         </a>
		<a href="profile.php">PROFILE   </a>
		<a href="history.php">ACTIVITY  </a>
		<a href="contact.php">CONTACT   </a>
		<a href="about.php">ABOUT       </a>
	    </div>
	</div>
	
	<div id="main">
		<div class="main">

			<div class="box question-added">
				<h3>Question Posted :</h3>
                <?php
                session_start();
                mysql_select_db('epics_votings',mysql_connect('localhost','root',''));
                $uid = $_SESSION['user_id'];$i=0;$j=0;
                $check = mysql_query("SELECT * FROM question WHERE u_id='$uid'");
                while ($row=mysql_fetch_array($check)):
                ?>         
            	<div class="panel panel-default" onclick="">
            		<div class="panel-body" style="font-size: 18px;">
            		   <?php $i++;
            		   echo $i.".  ";
            		   echo $row['question_topic'];
            		   ?>
            		    <button class="btn btn-danger">DELETE</button>
            		    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal" name="EKEY">EDIT</button>
            	    </div>
                </div>
                <?php endwhile; ?>
			</div>
	
			<div class="box vote-participation">
				<h3>Dilemma Answered :</h3>
                <?php
                $check2 = mysql_query("SELECT * FROM answer_key WHERE u_id='$uid'");
                while ($row2=mysql_fetch_array($check2)):
            	$q = mysql_query("SELECT * FROM question WHERE keytokken = '$row2[2]' ");
                ?>
            	<div class="panel panel-default" onclick="">
            		<div class="panel-body" style="font-size: 18px;">
            		    <?php $j++;
            		    echo $j.".  ";
            		    while($row1=mysql_fetch_array($q)):
            		    echo $row1[2];
            		    ?>
            		    <span style="float: right;">
            		    <?php
            		    if(!empty($row2[3]))
            		        {
            		        	echo $row2[3];
            		        }
            		     elseif (!empty($row2[4]))
            		        {
            		             echo $row2[4];	    	
            		        }
            		    endwhile;
            		    ?></span>
            	    </div>
            	</div>   
                <?php endwhile; ?>
			</div>
		
		</div>

<!---Modals Start From Here-->	
<div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog">

    <!-- Modal content-->
         <div class="modal-content" id="try">
         <div class="modal-header">
         <h4 class="modal-title">Update</h4>
         </div>
         <div class="modal-body">

         <form action="history.php" method="POST" style=""><h4>Topic :</h4>
             <input    style="border:1px solid grey; width:60vh; margin-bottom: 5px;" type="text" value="
             <?php 

               $first = mysql_query("SELECT * FROM question WHERE u_id='$uid'");
               while ($row=mysql_fetch_array($first))
               {
               	 echo $row[2];
               	 
               }

             ?>"
             name= "q_t">
             <h4>Brief :</h4>
             <textarea style="border:1px solid grey; padding:5px;height: 30vh; width:60vh;resize: none;" name="q_b"></textarea>
             <button class="btn btn-info" style="margin-top:25vh;margin-left: -5vh;" name="Upadte_submit">SUBMIT</button>
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