<!DOCTYPE html>
<?php 
include('func1.php');
$hpid=$_SESSION['hpid'];
$con=mysqli_connect("localhost","root","","hmsdb");
if(isset($_POST['add'])){
	$t1=$_POST['tb1'];
	$t2=$_POST['sel'];
	$q1=mysqli_query($con,"insert into beds(hpid,bno,status) values('$hpid','$t1',$t2);");
	if($q1){
	echo "<script>alert('Successfully added');</script>";}
}
if(isset($_POST['update'])){
	$t1=$_POST['tb1'];
	$t2=$_POST['sel'];
	$q2=mysqli_query($con,"update beds set status=$t2 where hpid='$hpid' and bno='$t1';");
	if($q2){
	echo "<script>alert('Successfully updated');</script>";}
}
if(isset($_GET['acceptA']))
  {
	
    $query=mysqli_query($con,"update appointment set doctorStatusA='1' where aid = '".$_GET['aid']."'");
	$q=mysqli_query($con,"insert into app(aid) values('".$_GET['aid']."');");
    if($query && $q)
    {
      echo "<script>alert('Appointment successfully accepted');</script>";
    }
  }

if(isset($_GET['cancelA']))
  {
    $query=mysqli_query($con,"update appointment set doctorStatusA='0' where aid = '".$_GET['aid']."'");
    if($query)
    {
      echo "<script>alert('Your appointment successfully cancelled');</script>";
    }
  } 
if(isset($_GET['acceptB']))
  {
	  $g=0;
    $query=mysqli_query($con,"update appointment set doctorStatusB='1' where aid = '".$_GET['aid']."'");
	$q=mysqli_query($con,"select * from `beds` where status=0 and hpid='$hpid' LIMIT 1;");
	$b=-1;
	if(mysqli_num_rows($q)==1){
	while($row=mysqli_fetch_array($q,MYSQLI_ASSOC)){
		$b=$row['bid'];
	
	$q1=mysqli_query($con,"insert into bedallot(pid,bid) values('".$_GET['aid']."',$b);");
	$q2=mysqli_query($con,"update beds set status=1 where bid='$b';");
	$g=1;
	}}
	else{
		echo "<script>alert('Beds are full');</script>";
		$g=0;
	}
    if($query && $q && $g==1)
    {
      echo "<script>alert('Bed request successfully accepted');</script>";
    }
	else{
		echo"<script> alert('Failed');</script>";
	}
  }
 if(isset($_GET['cancelB']))
  {
    $query=mysqli_query($con,"update appointment set doctorStatusB='0' where aid = '".$_GET['aid']."'");
    if($query)
    {
      echo "<script>alert('Bed request successfully cancelled');</script>";
    }
  }  
 if(isset($_GET['delete']))
  {
	  $q=mysqli_query($con,"select * from bedallot where pid= '".$_GET['aid']."'");
	  if(mysqli_num_rows($q)==1)
	  {
		  $r=mysqli_fetch_array($q,MYSQLI_ASSOC);
		  $b=$r['bid'];
		  $q1 = mysqli_query($con,"delete from bedallot where pid = '".$_GET['aid']."'");
		  
		  
		  $q3=mysqli_query($con,"update beds set status=0 where bid= $b;");
	  }
	$q2 = mysqli_query($con,"delete from app where aid = '".$_GET['aid']."'");
    $query=mysqli_query($con,"delete from appointment where aid = '".$_GET['aid']."'");
    if($query)
    {
      echo "<script>alert('Successfully deleted');</script>";
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
   <div class="container-fluid" style="margin-top:50px;">
    <h3 style = "margin-left: 40%; padding-bottom: 20px;font-family:'IBM Plex Sans', sans-serif;"> Welcome &nbsp<?php echo $_SESSION['dname'] ?>  </h3>
    <div class="row">
  <div class="col-md-4" style="max-width:18%;margin-top: 3%;">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" href="#list-dash" role="tab" aria-controls="home" data-toggle="list">Dashboard</a>
      <a class="list-group-item list-group-item-action" href="#list-app" id="list-app-list" role="tab" data-toggle="list" aria-controls="home">Appointments</a>
      <a class="list-group-item list-group-item-action" href="#list-pres" id="list-pres-list" role="tab" data-toggle="list" aria-controls="home">Beds update</a>
	  <a class="list-group-item list-group-item-action" href="#list-bed" id="list-bed-list" role="tab" data-toggle="list" aria-controls="home">Beds List</a>
      
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
                      <h4 class="StepTitle" style="margin-top: 5%;">Beds update</h4>
                        
                      <p class="links cl-effect-1">
                        <a href="#list-pres" onclick="clickDiv('#list-pres-list')">
                          Beds Update
                        </a>
                      </p>
                    </div>
                  </div>
                </div>    
				<div class="col-sm-4" style="left: 15%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list-ul fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Beds List</h4>
                        
                      <p class="links cl-effect-1">
                        <a href="#list-bed" onclick="clickDiv('#list-bed-list')">
                          Beds List
                        </a>
                      </p>
                    </div>
                  </div>
                </div>    

             </div>
           </div>
         </div>
		 
		 
		 
		 
		  <div class="tab-pane fade" id="list-bed" role="tabpanel" aria-labelledby="list-home-list">
			<table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Bed No.</th>
					<th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
				<?php
					$con=mysqli_connect("localhost","root","","hmsdb");
                    global $con;
                    $query = "select * from beds where hpid='$hpid';";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
                      ?>
					  <tr>
                      <td><?php echo $row['bno'];?></td>
                        <td><?php 
							if($row['status']==1)
							{
								echo "Filled";
							}
							else{
								echo "Empty";
							}?></td>
                       </tr>
					<?php
						}
					?>
				</tbody>
			</table>
		  
		  </div>
		 
    

    <div class="tab-pane fade" id="list-app" role="tabpanel" aria-labelledby="list-home-list">
        
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Patient ID</th>
					<th scope="col">Time.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
					<th scope="col">Age</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
					<th scope="col">Message</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Appointment Status</th>
					<th scope="col">Bed Status</th>
					<th scope="col">Appointment Accept</th>
                    <th scope="col">Appointment Reject</th>
                    <th scope="col">Bed Accept</th>
                    <th scope="col">Bed Reject</th>
					<th scope="col">Delete.</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $con=mysqli_connect("localhost","root","","hmsdb");
                    global $con;
                    $query = "select * from appointment where hpid='$hpid';";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
                      ?>
                      <tr>
                      <td><?php echo $row['aid'];?></td>
                        <td><?php echo $row['time'];?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['gender'];?></td>
						<td><?php echo $row['age'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['contact'];?></td>
						<td><?php echo $row['message'];?></td>
                        <td><?php echo $row['appdate'];?></td>
                        <td><?php echo $row['apptime'];?></td>
                        <td>
                    <?php if(($row['userStatusA']==1) && ($row['doctorStatusA']==1))  
                    {
                      echo "Accepted";
                    }
                    else if(($row['userStatusA']==0))  
                    {
                      echo "Cancelled by Patient";
                    }

                    else if(($row['doctorStatusA']==0))  
                    {
                      echo "Cancelled by You";
                    }
					else if($row['doctorStatusA']==-1)
					{
						echo "Pending";
					}
                        ?></td>
					<td>
					<?php
					if($row['bedR']==0){
					echo "Not Requested";}
						
					else if(($row['userStatusA']==1) && ($row['doctorStatusB']==1))  
                    {
                      echo "Accepted";
                    }
                    else if(($row['userStatusA']==0))  
                    {
                      echo "Cancelled by Patient";
                    }

                    else if(($row['doctorStatusA']==0 || $row['doctorStatusB']==0))  
                    {
                      echo "Cancelled by You";
                    }
					else if($row['doctorStatusA']==-1)
					{
						echo "Pending";
					}
                        ?></td>

                     <td>
                        <?php if(($row['userStatusA']==1) && ($row['doctorStatusA']!=1))  
                        { ?>

													
	                        <a href="doctor-panel.php?aid=<?php echo $row['aid']?>&acceptA=update" 
                              onClick="return confirm('Are you sure you want to accept this appointment ?')"
                              title="Accept Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Accept</button></a>
	                        <?php } else {

                                echo "Accepted";
                                } ?>
                        
                        </td>
						<td>
                        <?php if(($row['userStatusA']==1) && ($row['doctorStatusA']!=0))  
                        { ?>

													
	                        <a href="doctor-panel.php?aid=<?php echo $row['aid']?>&cancelA=update" 
                              onClick="return confirm('Are you sure you want to cancel this appointment?')"
                              title="Cancel Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Cancel</button></a>
	                        <?php } else {

                                echo "Cancelled";
                                } ?>
                        
                        </td>
						<td>
                        <?php if(($row['userStatusA']==1) && ($row['doctorStatusB']==1))  
                        { 
							echo "Accepted";
						}
							else if(($row['userStatusA']==1) && (($row['doctorStatusA']==0) || ($row['doctorStatusB']==0)))
							{
								echo "Rejected";
							}
							else
							{
								?>

													
	                        <a href="doctor-panel.php?aid=<?php echo $row['aid']?>&acceptB=update" 
                              onClick="return confirm('Are you sure you want to accept this bed request?')"
                              title="Cancel Bed" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Accept</button></a>
	                        <?php
                                } ?>
                        
                        </td>
						<td>
                        <?php if(($row['userStatusA']==1) && ($row['doctorStatusB']!=0))  
                        { ?>

													
	                        <a href="doctor-panel.php?aid=<?php echo $row['aid']?>&cancelB=update" 
                              onClick="return confirm('Are you sure you want to cancel this bed request?')"
                              title="Cancel Bed" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Cancel</button></a>
	                        <?php } else {

                                echo "Cancelled";
                                } ?>
                        
                        </td>

                        <td>
                        <a href="doctor-panel.php?aid=<?php echo $row['aid']?>&delete=update" 
                              onClick="return confirm('Are you sure you want to delete this appointment')"
                              title="Delete" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Delete</button></a>
	             
                        </td>


                      </tr></a>
                    <?php } ?>
                </tbody>
              </table>
        <br>
      </div>

      
<div class="tab-pane fade text-center" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">
	<form method="post" action="doctor-panel.php">
	<input type="textbox" name="tb1" id="tb1" placeholder="Bed number"/>
	&nbsp &nbsp
	<select name="sel" id="sel">
		<option value="">Choose Status</option>
		<option value=1> Full</option>
		<option value=0> Empty</option>
	</select>
	<br><br>
	<input type="submit" name="add" id="add" value="Add"/>&nbsp
	<input type= "submit" name="update" id="update" value="Update"/>
	</form>
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