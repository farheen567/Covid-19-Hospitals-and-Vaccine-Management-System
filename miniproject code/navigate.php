<!DOCTYPE html>
<script>

</script>
<?php 
include('func.php');  

$con=mysqli_connect("localhost","root","","hmsdb");


  $pid = $_SESSION['pid'];
  $username = $_SESSION['username'];
  $email = $_SESSION['email'];
  $fname = $_SESSION['fname'];
  $gender = $_SESSION['gender'];
  $lname = $_SESSION['lname'];
  $contact = $_SESSION['contact'];
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
		<a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Health Service </a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<style >
			.bg-primary {
				background: -webkit-linear-gradient(left, #3931af, #00c6ff);
			}
			.list-group-item.active {
				z-index: 2;
				color: #fff;
				background-color: #342ac1;
				border-color: #007bff;
			}
			.text-primary {
				color: #342ac1!important;
			}

			.btn-primary{
				background-color: #3c50c1;
				border-color: #3c50c1;
			}
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
 </head>
 <style type="text/css">
    button:hover{cursor:pointer;}
    #inputbtn:hover{cursor:pointer;}
</style>
<body style="padding-top:20px;">
	<div class="container-fluid" style="margin-top:50px;">
		
		<div class="row">
			<div class="col-md-4" style="max-width:25%; margin-top: 0%">
				<div class="list-group" id="list-tab" role="tablist">
					
					<a class="list-group-item list-group-item-action" href="vapphistory.php"  role="tab"  aria-controls="home">Appointment History</a>  
				</div><br>
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-12 offset-md-0 text-center " style="margin-top: 3%;">
				
					
						<div class="container-fluid">
							<div class="card">
								<div class="card-body">
								<br><br>
									<center><h4>Select your nearest Vaccination Center</h4></center><br>
			  
									<?php
									$con=mysqli_connect("localhost","root","","hmsdb");
									$q="select distinct location from `vcenters`;";
									$result=mysqli_query($con,$q);
									echo '<form  class="form-group" method="post" action="slot.php"><select name="list" style="width:300px;" required="required">';
									echo '<option value="" disabled selected>Select Locations</option>';
									while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
									{
										$val=$row["location"];
										echo "<option value='$val'>$val</option>";
									}
									echo '</select><br><br>
									<input type="submit" value="Search" style="background-color:#809fff;"></form>';
									?>
									<br><br>
								</div>
							</div>
						</div><br>
						
				
			</div>
		</div>
   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js">
    </script>



</body>
</html>
