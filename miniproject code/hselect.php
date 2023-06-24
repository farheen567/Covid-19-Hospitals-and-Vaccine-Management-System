<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Health Service </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  </style>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
	 <li class="nav-item">
        <a class="nav-link" href="body.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Back</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
	  
    </ul>
  </div>
</nav>
  <style type="text/css">
    button:hover{cursor:pointer;}
    #inputbtn:hover{cursor:pointer;}
  </style>
</head>
	<?php
$con=mysqli_connect("localhost","root","","hmsdb");
$q="select distinct Location from `hospitals`;";
$result=mysqli_query($con,$q);
echo '<div class="col-md-8" style="margin-top: 18%;">
<div class="col-sm-4" style="left: 60%">';
echo '<form method="post" action="perform.php"><select  name="list" style="width:300px;" required="required">';
echo '<option value="" disabled selected>Select Locations</option></div></div>';
while($row=mysqli_fetch_array($result))
{
	$val=$row["Location"];
	echo "<option value='$val'>$val</option>";
}
echo '</select><br><br>
<input type="submit" value="Search" name="sub" style="background-color:#809fff;"></form>';
?>
