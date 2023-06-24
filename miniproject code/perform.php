<!DOCTYPE html>
<?php
session_start();
if(isset($_POST["sub"]))
{
	$loc=$_POST["list"];
	$_SESSION["loc"]=$loc;
}
?>
<html lang="en">
  <head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Health Service </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
	 <li class="nav-item">
        <a class="nav-link" href="hselect.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Back</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="logout1.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
	  
    </ul>
  </div>
</nav>
  </head>
  <style type="text/css">
    button:hover{cursor:pointer;}
    #inputbtn:hover{cursor:pointer;}
  </style>
  <body style="padding-top:50px;">
   <div class="container-fluid" style="margin-top:50px;">
   
    <div class="row">
  <div class="col-md-4" style="max-width:25%;margin-top: 3%;">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-dash-list" data-toggle="list" href="#list-dash" role="tab" aria-controls="home">List</a>
      <a class="list-group-item list-group-item-action" href="#list-doc" id="list-doc-list"  role="tab"    aria-controls="home" data-toggle="list">4+ rating</a>
	  <a class="list-group-item list-group-item-action" href="#list-doc1" id="list-doc-list"  role="tab"    aria-controls="home" data-toggle="list">3+ rating</a>
	  <a class="list-group-item list-group-item-action" href="#list-doc2" id="list-doc-list"  role="tab"    aria-controls="home" data-toggle="list">2+ rating</a>
    </div><br>
  </div>
  <div class="col-md-8" style="margin-top: 3%;">
    <div class="tab-content" id="nav-tabContent" style="width: 950px;">
		<div class="tab-pane fade show active text-center" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
		<br><br><br><br>
			
			<?php
							$con=mysqli_connect("localhost","root","","hmsdb");
							$loc=$_SESSION['loc'];
							$q="select * from `hospitals` where Location='$loc';";
							$result=mysqli_query($con,$q);
							echo '<form method="post" action="patient-panel.php"><select  id="list1" name="list1" style="width:300px;" required="required">';
							echo '<option value="" disabled selected>Select Hospital</option>';
							while($row=mysqli_fetch_array($result))
							{
							$val=$row["hname"];
							$hpid=$row["hpid"];
							echo "<option value='$hpid'>$val</option>";
							}
							echo '</select><br><br>
							<input type="submit" name="subb" value="Confirm" style="background-color:#809fff;"></form>';
						?>
        </div>
      
                
      






      <div class="tab-pane fade text-center" id="list-doc" role="tabpanel" aria-labelledby="list-home-list">
         <br><br><br><br>     
		<?php
							$con=mysqli_connect("localhost","root","","hmsdb");
							$loc=$_SESSION['loc'];
							$q="select * from hospitals h,avgr r where h.hpid=r.hpid and h.Location='$loc' and r.arate>=4;";
							$result=mysqli_query($con,$q);
							
							echo '<form method="post" action="patient-panel.php"><select  id="list1" name="list1" style="width:300px;" required="required">';
							echo '<option value="" disabled selected>Select Hospital</option>';
							while($row=mysqli_fetch_array($result))
							{
								$val=$row["hname"];
								$hpid=$row["hpid"];
								echo "<option value='$hpid'>$val</option>";
							}
							echo '</select><br><br>
							<input type="submit" name="subb" value="Confirm" style="background-color:#809fff;"></form>';
						?>
              
              
      </div>
	  
	  <div class="tab-pane fade text-center" id="list-doc1" role="tabpanel" aria-labelledby="list-home-list">
         <br><br><br><br>     
		<?php
							$con=mysqli_connect("localhost","root","","hmsdb");
							$loc=$_SESSION['loc'];
							$q="select * from hospitals h,avgr r where h.hpid=r.hpid and h.Location='$loc' and r.arate>=3;";
							$result=mysqli_query($con,$q);
							
							echo '<form method="post" action="patient-panel.php"><select  id="list1" name="list1" style="width:300px;" required="required">';
							echo '<option value="" disabled selected>Select Hospital</option>';
							while($row=mysqli_fetch_array($result))
							{
								$val=$row["hname"];
								$hpid=$row["hpid"];
								echo "<option value='$hpid'>$val</option>";
							}
							echo '</select><br><br>
							<input type="submit" name="subb" value="Confirm" style="background-color:#809fff;"></form>';
						?>
              
              
      </div>
	  
	  <div class="tab-pane fade text-center" id="list-doc2" role="tabpanel" aria-labelledby="list-home-list">
         <br><br><br><br>     
		<?php
							$con=mysqli_connect("localhost","root","","hmsdb");
							$loc=$_SESSION['loc'];
							$q="select * from hospitals h,avgr r where h.hpid=r.hpid and h.Location='$loc' and r.arate>=2;";
							$result=mysqli_query($con,$q);
							
							echo '<form method="post" action="patient-panel.php"><select  id="list1" name="list1" style="width:300px;" required="required">';
							echo '<option value="" disabled selected>Select Hospital</option>';
							while($row=mysqli_fetch_array($result))
							{
								$val=$row["hname"];
								$hpid=$row["hpid"];
								echo "<option value='$hpid'>$val</option>";
							}
							echo '</select><br><br>
							<input type="submit" name="subb" value="Confirm" style="background-color:#809fff;"></form>';
						?>
              
              
      </div>
    
	
	
	
	
	
	
	



    </div>
  </div>
</div>
   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
  </body>
</html>












































					