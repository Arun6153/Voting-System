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
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Profile-Card.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="text-center profile-card" style="margin:15px;background-color:#ffffff;">
        <div class="profile-card-img" style="background-image:url(&quot;iceland.jpg&quot;);height:150px;background-size:cover;"></div>
        <div><img class="rounded-circle" src="..\..\..\style\images\user.png" height="150px" style="margin-top:-70px;">
            <h3>Arun Saini</h3>
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
                <center><button style="margin-right: 350px;">EDIT</button></center>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>