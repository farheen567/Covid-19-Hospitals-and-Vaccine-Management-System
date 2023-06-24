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
  $loc=$_POST['list'];
  if(isset($_GET['book']))
{
	$_SESSION['id']=$_GET['id'];
	echo $_SESSION['id'];
	header("Location:book-form.php");
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
	<div class="container-fluid" style="margin-top:50px;">
		
		<div class="row">
			<div class="col-md-4" style="max-width:25%; margin-top: 0%">
				<div class="list-group" id="list-tab" role="tablist">
					
					<a class="list-group-item list-group-item-action" href="vapphistory.php" id="list-pat-list" role="tab"  aria-controls="home">Appointment History</a>  
				</div><br>
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-12 offset-md-0 text-center " style="margin-top: 1%;">
				<div class="container-fluid">
					<div class="card">
						<div class="card-body">
							<br><br>
							
								<table class="table table-hover">
									<thead>
										<tr>
											<?php
											$date1= date("Y-m-d");
											$date2 = date("Y-m-d",strtotime ( '+1 day' , strtotime ( $date1) )) ;
											$date3 = date("Y-m-d",strtotime ( '+2 day' , strtotime ( $date1) )) ;
											$date4 = date("Y-m-d",strtotime ( '+3 day' , strtotime ( $date1) )) ;
											$date5 = date("Y-m-d",strtotime ( '+4 day' , strtotime ( $date1) )) ;
											$date6 = date("Y-m-d",strtotime ( '+5 day' , strtotime ( $date1) )) ;
											$date7 = date("Y-m-d",strtotime ( '+6 day' , strtotime ( $date1) )) ;
											?>
											<th scope="col"></th>
											<th scope="col"><?php echo $date1;?></th>
											<th scope="col"><?php echo $date2;?></th>
											<th scope="col"><?php echo $date3;?></th>
											<th scope="col"><?php echo $date4;?></th>
											<th scope="col"><?php echo $date5;?></th>
											<th scope="col"><?php echo $date6;?></th>
											<th scope="col"><?php echo $date7;?></th>
										</tr>
									</thead>
									<tbody>
									<?php
										$con=mysqli_connect("localhost","root","","hmsdb");
										$query = "select * from vinfo i,vcenters c where i.vid=c.vid and c.location='$loc';";
										$result = mysqli_query($con,$query);
										while ($row = mysqli_fetch_array($result)){
											$age=$row['age'];
											$a='';
											for($i=2;$i<strlen($age);$i++){
											$a=$a.$age[$i];
											}
											$a=(int)$a;
										?>
										<tr>
										<td style="column-width:250px;text-align:left"><?php echo $row['vname'].'<br><font color="#808080">'.$row['address'].'</font><br>'.$row['type'].'<br><font color="#6A5ACD">'.'Age: '.$a.' & Above</font>  Dose: '.$row['dose'];?></td>
										<td><?php if($date1==$row['day'] && $row['count']==0)
													{
														echo "<font color='red'>BOOKED</font>";
													}
													else if($date1==$row['day'])
											{?>
												<a href="slot.php?id=<?php echo $row['id']?>&book=update" 
													onClick="return confirm('Are you sure you want to book this appointment ?')"
													title="Book Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger"><?php echo $row['count'];?></button></a>
											<?php	
											}
											else
												echo "N/A";
											?>
										</td>
										<td><?php if($date2==$row['day'])
											{?>
												<a href="slot.php?id=<?php echo $row['id']?>&book=update" 
													onClick="return confirm('Are you sure you want to book this appointment ?')"
													title="Book Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger"><?php echo $row['count'];?></button></a>
											<?php
											}
											else
												echo "N/A";
											?>
										</td>
										<td><?php if($date3==$row['day'])
											{?>
												<a href="slot.php?id=<?php echo $row['id']?>&book=update" 
													onClick="return confirm('Are you sure you want to book this appointment ?')"
													title="Book Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger"><?php echo $row['count'];?></button></a>
											<?php
											}
											else
												echo "N/A";
											?>
										</td>
										<td><?php if($date4==$row['day'])
											{?>
												<a href="slot.php?id=<?php echo $row['id']?>&book=update" 
													onClick="return confirm('Are you sure you want to book this appointment ?')"
													title="Book Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger"><?php echo $row['count'];?></button></a>
											<?php
											}
											else
												echo "N/A";
											?>
										</td>
										<td><?php if($date5==$row['day'])
											{?>
												<a href="slot.php?id=<?php echo $row['id']?>&book=update" 
													onClick="return confirm('Are you sure you want to book this appointment ?')"
													title="Book Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger"><?php echo $row['count'];?></button></a>
											<?php
											}
											else
												echo "N/A";
											?>
										</td>
										<td><?php if($date6==$row['day'])
											{?>
												<a href="slot.php?id=<?php echo $row['id']?>&book=update" 
													onClick="return confirm('Are you sure you want to book this appointment ?')"
													title="Book Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-success"><?php echo $row['count'];?></button></a>
											<?php
											}
											else
												echo "N/A";
											?>
										</td>
										<td><?php if($date7==$row['day'])
											{?>
												echo $row['count'];
											<?php
											}
											else
												echo "N/A";
											?>
										</td>
										</tr>
									<?php
										}
										?>
                    
									</tbody>
								</table>
								<br>
							
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
