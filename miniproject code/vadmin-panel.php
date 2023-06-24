<!DOCTYPE html>
<?php 
include('func1.php');
$vid=$_SESSION['vid'];
$con=mysqli_connect("localhost","root","","hmsdb");

if(isset($_POST['csub']))
{
	$n=$_POST['n'];
	$n=(int)$n;
	$cc=$_POST['cc'];
	$cc=(int)$cc;
	$q="update vinfo set count=$cc where id=$n;";
	$r=mysqli_query($con,$q);
	if($r)
	{
		echo "<script>alert('Successfully Updated!');</script>";
	}
}

if(isset($_POST['add']))
{
	$vid=$_SESSION['vid'];
	$type=$_POST['type'];
	$dose=$_POST['dose'];
	$age=$_POST['age'];
	$count=$_POST['count'];
	$day=$_POST['day'];
	$q3="insert into vinfo(vid,type,dose,age,count,day) values('$vid','$type','$dose','$age',$count,'$day');";
	$r3=mysqli_query($con,$q3);
	if($r3)
	{
		echo "<script>alert('Successfully Added!');</script>";
	}
	
}

if(isset($_GET['delete1']))
{
	
	$r4=mysqli_query($con,"delete from vbook where id = '".$_GET['id']."'");	
	$r5=mysqli_query($con,"delete from vinfo where id = '".$_GET['id']."'");
	if($r4 && $r5)
	{
		echo "<script>alert('Successfully Deleted!');</script>";
	}
}
?>	
<html lang="en">
  <head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Health Service </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <style >
      .btn-outline-light:hover{
        color: #25bef7;
        background-color: #f8f9fa;
        border-color: #f8f9fa;
      }
    </style>

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
  </style>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
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
<div class="row">

<div class="col-md-12" >
	<div class ="float-right">
		<?php
			$con=mysqli_connect("localhost","root","","hmsdb");
			$q=mysqli_query($con,"select * from `vcenters` where vid='$vid';");
			$r=mysqli_fetch_array($q);
		?>
			<div style="width:50%;height:70px;text-align:justify;text-align-last:right;"><?php echo $r['vname'].'<br>'?>
			<?php echo $r['address'].'<br>'?>
			</div>
	
	</div></div></div>
	<div class="container-fluid" style="margin-top:50px;">
		<h3 style = "margin-left: 40%; padding-bottom: 20px;font-family:'IBM Plex Sans', sans-serif;"> Welcome &nbsp<?php echo $_SESSION['dname'] ?>  </h3>
		<div class="row">
			<div class="col-md-4" style="max-width:18%;margin-top: 3%;">
				<div class="list-group" id="list-tab" role="tablist">
					<a class="list-group-item list-group-item-action active" href="#list-dash" role="tab" aria-controls="home" data-toggle="list">Dashboard</a>
					<a class="list-group-item list-group-item-action" href="#list-app" id="list-app-list" role="tab" data-toggle="list" aria-controls="home">Appointments</a>
					<a class="list-group-item list-group-item-action" href="#list-pres" id="list-pres-list" role="tab" data-toggle="list" aria-controls="home">Vaccine List</a>
					<a class="list-group-item list-group-item-action" href="#list-vac" id="list-add-list" role="tab" data-toggle="list" aria-controls="home">Add Vaccine</a>
				</div><br>
			</div>
			<div class="col-md-8" style="margin-top: 3%;">
				<div class="tab-content" id="nav-tabContent" style="width: 950px;">
					<div class="tab-pane fade show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
						<div class="container-fluid container-fullw bg-white" >
							<div class="row">
								<div class="col-sm-4" style="left: 10%">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list fa-stack-1x fa-inverse"></i> </span>
											<h4 class="StepTitle" style="margin-top: 5%;"> View Appointments</h4>
											<script>
												function clickDiv(id) {
												document.querySelector(id).click();
												}
											</script>                      
											<p class="links cl-effect-1">
											<a href="#list-app" onclick="clickDiv('#list-app-list')">
												Appointment List
											</a>
											</p>
										</div>
									</div>
								</div>

								<div class="col-sm-4" style="left: 15%">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list-ul fa-stack-1x fa-inverse"></i> </span>
											<h4 class="StepTitle" style="margin-top: 5%;">vaccine List</h4>
                        
											<p class="links cl-effect-1">
											<a href="#list-pres" onclick="clickDiv('#list-pres-list')">
												Vaccine List
											</a>
											</p>
										</div>
									</div>
								</div>
								
								<div class="col-sm-4" style="left: 15%">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list-ul fa-stack-1x fa-inverse"></i> </span>
											<h4 class="StepTitle" style="margin-top: 5%;">Add Vaccine</h4>
                        
											<p class="links cl-effect-1">
											<a href="#list-vac" onclick="clickDiv('#list-add-list')">
												Add Vaccine
											</a>
											</p>
										</div>
									</div>
								</div>
								

							</div>
						</div>
					</div>
    

					<div class="tab-pane fade" id="list-app" role="tabpanel" aria-labelledby="list-home-list">
        
						<table class="table table-hover">
							<thead>
								<tr>
									<th scope="col">id</th>
									<th scope="col">Name</th>
									<th scope="col">Aadhaar</th>
									<th scope="col">Gender</th>
									<th scope="col">DOB year</th>
									<th scope="col">Age</th>
									<th scope="col">Type</th>
									<th scope="col">Dose</th>
									<th scope="col">Appointment Date</th>
									<th scope="col">Appointment Time</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$q="select * from vbook b,vinfo i,vcenters c where b.id=i.id and i.vid=c.vid and c.vid='$vid';";
								$result=mysqli_query($con,$q);
								while($row=mysqli_fetch_array($result))
								{
									$year=date("Y");
									$year=(int)$year;
									$age=$year-$row['dobyear'];
							?>
							<tr>
								<td><?php echo $row['vbid']?></td>
								<td><?php echo $row['name']?></td>
								<td><?php echo $row['aadhaar']?></td>
								<td><?php echo $row['gender']?></td>
								<td><?php echo $row['dobyear']?></td>
								<td><?php echo $age?></td>
								<td><?php echo $row['type']?></td>
								<td><?php echo $row['dose']?></td>
								<td><?php echo $row['day']?></td>
								<td><?php echo $row['tslot']?></td>
							</tr>
							<?php
							}
							?>
							</tbody>
						</table>
						<br>
					</div>

      
					<div class="tab-pane fade" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">
						<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">Type</th>
								<th scope="col">Dose</th>
								<th scope="col">Age</th>
								<th scope="col">Count</th>
								<th scope="col">Date</th>
								<th scope="col">    </th>
								<th scope="col">    </th>
							</tr>
						</thead>
						<tbody>
							<?php
								$q1="select * from vinfo i where i.vid='$vid';";
								$result1=mysqli_query($con,$q1);
								while($row=mysqli_fetch_array($result1))
								{
							?>
							<tr>
								<td><?php echo $row['type']?></td>
								<td><?php echo $row['dose']?></td>
								<td><?php echo $row['age']?></td>
								<td><?php echo $row['count']?></td>
								<td><?php echo $row['day']?></td>
								<td><form method="post" action="vadmin-panel.php">
									<input type="textbox" name="cc"/>
									<input type="hidden" name="n" value="<?php echo $row['id'];?>"/>
									<input type="submit" name="csub"/>
									</form>
								</td>
								<td>
									<a href="vadmin-panel.php?id=<?php echo $row['id']?>&delete1=update" 
									onClick="return confirm('Are you sure you want to delete this entry ?')"
										title="Delete" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Delete</button></a>
								</td>
							</tr>
							<?php
							}
							?>
						</tbody>
						</table>
					</div>
					
					<div class="tab-pane fade" id="list-vac" role="tabpanel" aria-labelledby="list-home-list">
						<div class="container-fluid">
							<div class="card">
								<div class="card-body">
									 <center><h4>Vaccine Details</h4></center><br>
									<form class="form-group" method="post" action="vadmin-panel.php">
									<div class="row">
										<div class="col-md-4"><label>Type</label></div>
										<div class="col-md-8">
											<select name="type" class="form-control" id="type" required="required">
											<option value="" disabled selected>Select Type</option>
											<option value="COVISHIELD">COVISHIELD</option>
											<option value="COVAXIN">COVAXIN</option>
											</select>
										</div><br><br>
				   
										<div class="col-md-4"><label>Dose</label></div>
										<div class="col-md-8">
											<select name="dose" class="form-control" id="dose" required="required"/>
											<option value="" disabled selected>Select Dose</option>
											<option value="#1">#1</option>
											<option value="#2">#2</option>
											<option value="Precaution">Precaution</option>
											</select>
										</div><br><br>

										<div class="col-md-4"><label>Age</label></div>
										<div class="col-md-8">
											<select name="age" class="form-control" id="age" required="required"/>
											<option value="" disabled selected>Select Age</option>
											<option value=">=18">18 and above</option>
											<option value=">=13">13 and above</option>
											</select>
										</div><br><br>

										<div class="col-md-4"><label>Count</label></div>
										<div class="col-md-8">
										<input type="number" name="count" required="required"/>
										</div><br><br>
										
										<div class="col-md-4"><label>Date</label></div>
										<div class="col-md-8">
										<input type="date" name="day" required="required"/>
										</div><br><br>
										
										<div class="col-md-4"></div>
										<div class="col-md-8">
										<input type="submit" name="add" value="Add"/>
										</div>
										
									</div>
									</form>
								</div>
							</div>
						</div>
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