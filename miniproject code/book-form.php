<!DOCTYPE html>

<?php 
session_start();
$id=$_SESSION['id'];
$con=mysqli_connect("localhost","root","","hmsdb");


if(isset($_POST['register']))
{
	
	$query = mysqli_query($con,"select * from vinfo where id=id;");
	$row=mysqli_fetch_array($query);
	$a=$row['age'];
	$ag="";
	for($i=2;$i<strlen($a);$i++){
		$ag=$ag.$a[$i];
	}
	$ag=(int)$ag;
	$d=$_POST['birth'];
	$d=(int)$d;
	$year=date("Y");
	$year=(int)$year;
	echo $ag." ".$d-$year;
	
	if($year-$d>=$ag)
	{
		$pid=$_SESSION['pid'];
		$id=$_SESSION['id'];
		$tslot=$_POST['tslot'];
		$aadhaar=$_POST['aadhaar'];
		$name=$_POST['name'];
		$gender=$_POST['gender'];
		$q="insert into vbook(pid,id,tslot,aadhaar,name,gender,dobyear) values($pid,$id,'$tslot','$aadhaar','$name','$gender',$d);";
		$result=mysqli_query($con,$q);
		$q2="update vinfo set count=count-1 where id=$id;";
		$r2=mysqli_query($con,$q2);
		if($result && $r2)
		{
			echo "<script>alert('Your vaccine time. slot successfully booked.');</script>";
			
		}
	}
	else
	{
		echo "<script>alert('Registration is open for individuals with age 18 years or older');</script>";
	}
		
}
?>
<script>
	function alphaOnly(event) {
		var key = event.keyCode;
		return ((key >= 65 && key <= 90) || key == 8 || key == 32);
	};
	function acheck()
	{
	var regexp=/^[2-9]{1}[0-9]{3}\s[0-9]{4}\s[0-9]{4}$/;
	var ano = document.getElementById("aadhaar").value;
	if(!(regexp.test(ano))){
		alert("Enter valid AAdhaar Number");
		return False;
	}
	return True;
	}
</script>

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

		
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="navigate.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Back</a>
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
	<div class="container-fluid" style="margin-top:100px;">
		
			<div class="container-fluid">
				<div class="card">
					<div class="card-body">
					<br>
						<center><h4>Fill Details</h4></center><br>
						<form class="form-group" method="post" action="book-form.php">
							<div class="row">
								<div class="col-md-4"><label>Time Slot</label></div>
								<div class="col-md-8"> <select name="tslot" class="form-control"  required>
											<option value="9AM-11AM">09:00AM-11:00AM</option>
											<option value="11AM-1PM">11:00AM-01:00PM</option>
											<option value="1PM-3PM">01:00PM-03:00PM</option>
											<option value="3PM-6PM">03:00PM-06:00PM</option>
											</select>
								</div><br><br><br>
								<div class="col-md-4"><label>Aadhaar Number</label></div>
								<div class="col-md-8"> <input type="textbox" class="form-control" placeholder="Aadhaar Number*" id="aadhaar" name="aadhaar" onfocusout='acheck();' required/></div><br><br><br>
				   
								<div class="col-md-4"><label>Name</label></div>
								<div class="col-md-8"><input type="textbox" class="form-control" name="name" id="name" onkeydown="return alphaOnly(event);" required></div><br><br><br>

								<div class="col-md-4"><label>Gender</label></div>
								<div class="col-md-8"><div class="maxl">
														<label class="radio inline"> 
														<input type="radio" name="gender" value="Male" checked>
														<span> Male </span> 
														</label>
														<label class="radio inline"> 
														<input type="radio" name="gender" value="Female">
														<span>Female </span> 
														<label class="radio inline"> 
														<input type="radio" name="gender" value="Others">
														<span>Others</span>
														</label>
														</div>
								</div><br><br><br>
								
								<div class="col-md-4"><label>Year of Birth(as in Aadhaar Card in YYYY format)</label></div>
								<div class="col-md-8"><input type="textbox" class="form-control" name="birth"  onkeyup='return check();' required></div><br><br><br>
								<div class="col-md-4"></div>
								<div class="col-md-4 offset-md-0 text-center">
										<input type="submit" name="register" value="Register" class="btn btn-primary" id="inputbtn">
								</div>
								<div class="col-md-4"></div><br><br>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js">
    </script>



</body>
</html>










