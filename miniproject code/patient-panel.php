<!DOCTYPE html>
<script>
function validateEmail()
{
	var exp=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var email=document.getElementById("email").value;
	if(!(exp.test(email)))
	{
		alert("Enter valid email");
		return False;
	}
	return True;
}

function validateAge()
{
		var age=document.getElementById("age").value;
		if(isNaN(age)){
			alert('enter a valid age');
			return False;
		}
		return True;
}

function alphaOnly(event) {
  var key = event.keyCode;
  return ((key >= 65 && key <= 90) || key == 8 || key == 32);
};
</script>
<?php
include('func.php');  
include('newfunc.php');



if(isset($_POST["subb"]))
{
	$hpid=$_POST["list1"];
	$_SESSION["hpid"]=$hpid;
}
$con=mysqli_connect("localhost","root","","hmsdb");
$hpid=$_SESSION["hpid"];



  $pid = $_SESSION['pid'];
  $username = $_SESSION['username'];
  $email = $_SESSION['email'];
  $fname = $_SESSION['fname'];
  $gender = $_SESSION['gender'];
  $lname = $_SESSION['lname'];
  $contact = $_SESSION['contact'];
  
if(isset($_POST["add"]))
{
	 $rating = $_POST["rating"];

    $sql= "INSERT INTO rating(pid,hpid,rate) VALUES ($pid,'$hpid',$rating)";
	$qq ="update avgr set arate =(select avg(rate) from rating where hpid='$hpid') where hpid='$hpid';";
	$r1=mysqli_query($con,$sql);
	$r2=mysqli_query($con,$qq);
    if ($r1 && $r2)
    {
        echo "<script>alert('New Rate addedddd successfully');</script>";
    }
    else
    {
        echo "<script>alert('Error');</script>";
    }
}
  



if(isset($_POST['app-submit']))
{
  $pid = $_SESSION['pid'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $contact = $_POST['mobile'];
  $appdate=$_POST['appdate'];
  $apptime=$_POST['apptime'];
  $msg=$_POST['msg'];
  if(isset($_POST['bed']))
	  $bed=1;
  else
	  $bed=0;
  $cur_date = date("Y-m-d");
  date_default_timezone_set('Asia/Kolkata');
  $cur_time = date("H:i:s");
  $apptime1 = strtotime($apptime);
  $appdate1 = strtotime($appdate);
	
  if(date("Y-m-d",$appdate1)>=$cur_date){
    if((date("Y-m-d",$appdate1)==$cur_date and date("H:i:s",$apptime1)>$cur_time) or date("Y-m-d",$appdate1)>$cur_date) {
          $query=mysqli_query($con,"insert into appointment(hpid,pid,name,gender,age,email,contact,message,appdate,apptime,bedR,userStatusA,doctorStatusA,doctorStatusB) values('$hpid',$pid,'$name','$gender',$age,'$email','$contact','$msg','$appdate','$apptime',$bed,1,-1,-1);");

          if($query)
          {
            echo "<script>alert('Your appointment successfully booked');</script>";
          }
          else{
            echo "<script>alert('Unable to process your request. Please try again!');</script>";
          }  
    }
    else{
      echo "<script>alert('Select a time or date in the future!');</script>";
    }
  }
  else{
      echo "<script>alert('Select a time or date in the future!');</script>";
  }
  
}

if(isset($_GET['cancel1']))
  {
    $query=mysqli_query($con,"update appointment set userStatusA='0' where aid = '".$_GET['aid']."'");
    if($query)
    {
      echo "<script>alert('Your appointment successfully cancelled');</script>";
    }
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
		
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
  
    
    



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
        <a class="nav-link" href="perform.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Back</a>
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
<body style="padding-top:50px;">
<div class="row">

<div class="col-md-12" >
	<div class ="float-right">
		<?php
			$con=mysqli_connect("localhost","root","","hmsdb");
			$q=mysqli_query($con,"select * from `hospitals` where hpid='$hpid';");
			$r=mysqli_fetch_array($q);
		?>
			<div style="width:60%;height:70px;text-align:justify;text-align-last:right;"><?php echo $r['hname'].'<br>'?>
			<?php echo $r['Address'].'<br>'?>
			<?php echo $r['email'].'<br>'?>
			<?php echo $r['phn']?></div>
	
	</div></div></div>
	<div class="container-fluid" style="margin-top:50px;">
		<br>
		
		<div class="row">
			<div class="col-md-4" style="max-width:25%; margin-top: 3%">
				<div class="list-group" id="list-tab" role="tablist">
					<a class="list-group-item list-group-item-action active" id="list-dash-list" data-toggle="list" href="#list-dash" role="tab" aria-controls="home">Dashboard</a>
					<a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Book Appointment</a>
					<a class="list-group-item list-group-item-action" href="#app-hist" id="list-pat-list" role="tab" data-toggle="list" aria-controls="home">Appointment History</a>
					<a class="list-group-item list-group-item-action" href="#rate" id="list-rate" role="tab" data-toggle="list" aria-controls="home">Rating</a>  
				</div><br>
			</div>
			<div class="col-md-8" style="margin-top: 3%;">
				<div class="tab-content" id="nav-tabContent" style="width: 950px;">
					<div class="tab-pane fade  show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
						<div class="container-fluid container-fullw bg-white" >
							<div class="row">
								<div class="col-sm-4" style="left: 5%">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
											<h4 class="StepTitle" style="margin-top: 5%;"> Book My Appointment</h4>
											<script>
											function clickDiv(id) {
												document.querySelector(id).click();
											}
											</script>                      
											<p class="links cl-effect-1">
											<a href="#list-home" onclick="clickDiv('#list-home-list')">
											Book Appointment
											</a>
											</p>
										</div>
									</div>
								</div>

								<div class="col-sm-4" style="left: 10%">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body" >
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
												<h4 class="StepTitle" style="margin-top: 5%;">My Appointments</h2>
                    
													<p class="cl-effect-1">
													<a href="#app-hist" onclick="clickDiv('#list-pat-list')">
													View Appointment History
													</a>
													</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
					<div class="tab-pane fade" id="rate" role="tabpanel" aria-labelledby="list-home-list">
						

						
						<div style="width: 600px; margin: 30px auto">
        <div id="rateYo"></div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
	<form action="patient-panel.php" method="post">

    <div>
        <h3>Rate Hospital</h3>
    </div>


         <div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div>

    <span class='result'>0</span>
    <input type="hidden" name="rating">


    <div><input type="submit" name="add"> </div>

</form>
    <script>
         
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
   
    </script>
					</div>


					<div class="tab-pane fade" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
						<div class="container-fluid">
							<div class="card">
								<div class="card-body">
									<center><h4>Create an appointment</h4></center><br>
									<form class="form-group" method="post" action="patient-panel.php">
										<div class="row">
											<div class="col-md-4"><label>Full Name</label></div>
											<div class="col-md-8"><input type="textbox" class="form-control" name="name" onkeydown="return alphaOnly(event);" required></div><br><br>
				   
											<div class="col-md-4"><label>Email</label></div>
											<div class="col-md-8"><input type="textbox" class="form-control" name="email" id="email" onfocusout='validateEmail();' required></div><br><br>

											<div class="col-md-4"><label>Appointment Date</label></div>
											<div class="col-md-8"><input type="date" class="form-control datepicker" name="appdate"></div><br><br>

											<div class="col-md-4"><label>Appointment Time</label></div>
											<div class="col-md-8">
											<select name="apptime" class="form-control" id="apptime" required="required">
											<option value="" disabled selected>Select Time</option>
											<option value="08:00:00">8:00 AM</option>
											<option value="10:00:00">10:00 AM</option>
											<option value="12:00:00">12:00 PM</option>
											<option value="14:00:00">2:00 PM</option>
											<option value="16:00:00">4:00 PM</option>
											</select>
											</div><br><br><br>
											<div class="col-md-4"></div> 
											<div class="col-md-8"><input type="checkbox" id="ck" name="bed" value="1" disabled="disabled"/>&nbsp; Request bed (Available beds <?php
												$con=mysqli_connect("localhost","root","","hmsdb");
												$q="select * from `beds` where hpid='$hpid';";
												if($r=mysqli_query($con,$q))
												{
													$r1=mysqli_num_rows($r);
												}
												$q1="select * from `beds` where `status`=0 and hpid='$hpid';";
												if($result=mysqli_query($con,$q1))
												{
													$r2=mysqli_num_rows($result);
												}
												echo $r2.'/'.$r1.')';
												if($r2!=0)
												{
													echo "<script>
													function check()
													{
														document.getElementById('ck').disabled=false;
													}
													check();
													</script>";
												}
												?>
										
											</div><br><br>
					

											<div class="col-md-4"><label>Mobile No</label></div>
											<div class="col-md-8"><input type="tel" minlength="10" maxlength="10" class="form-control" name="mobile" id="mobile" required></div><br><br>

											<div class="col-md-4"><label>Age</label></div>
											<div class="col-md-8"><input type="textbox" class="form-control" name="age" id="age" onfocusout='validateAge();' required></div><br><br>
				   
											<div class="col-md-4"><label>Message</label></div>
											<div class="col-md-8"><textarea id="msg" name="msg" rows="4" cols="70"></textarea></div><br><br>
				   
											<div class="col-md-4"></div>
											<div class="col-md-2">
											<label class="radio inline"> 
											<input type="radio" name="gender" value="Male" checked>
											<span> Male </span> 
											</label>
											</div>
											<div class="col-md-2">
											<label class="radio inline"> 
											<input type="radio" name="gender" value="Female">
											<span>Female </span> 
											</label>
											</div>
											<div class="col-md-4"></div>
				   
											<div class="col-md-4"></div>
											<div class="col-md-4">
											<input type="submit" name="app-submit" value="Submit" class="btn btn-primary" id="inputbtn">
											</div>
											<div class="col-md-8"></div>  
				  
										</div>
									</form>
								</div>
							</div>
						</div><br>
					</div>
      
					<div class="tab-pane fade" id="app-hist" role="tabpanel" aria-labelledby="list-pat-list">
        
						<table class="table table-hover">
							<thead>
								<tr>
									<th scope="col">Name</th>
									<th scope="col">Phone Number</th>
									<th scope="col">Message</th>
									<th scope="col">Appointment Time</th>
									<th scope="col">Appointment Number</th>
									<th scope="col">Bed Number</th>
									<th scope="col">Current Bed Status</th>
									<th scope="col">Appointment Status</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$con=mysqli_connect("localhost","root","","hmsdb");
								global $con;

								$query = "select * from appointment where pid='$pid' and hpid='$hpid';";
								$result = mysqli_query($con,$query);
								while ($row = mysqli_fetch_array($result)){
              
								?>
								<tr>
									<td><?php echo $row['name'];?></td>
									<td><?php echo $row['contact'];?></td>
									<td><?php echo $row['message'];?></td>
									<td><?php echo $row['appdate'].' '.$row['apptime'];?></td>
									<td><?php 
									$aid=$row['aid'];

									$con=mysqli_connect("localhost","root","",'hmsdb');
									$q1="select * from `app` where `aid`='$aid';";
									$r1=mysqli_query($con,$q1);
									if(mysqli_num_rows($r1)==1){
										$row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
									echo $row1['apid'];}
									else echo '---';?></td>
									<td><?php if($row['bedR']==0)
									{echo "Not Requested";}
									else{ 
									$q2= "select * from bedallot a, beds b where a.bid=b.bid and pid='$aid';";
									$r2=mysqli_query($con,$q2);
									if(mysqli_num_rows($r2)==1){
										$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
									echo $row2['bno'];}
									else echo '---';
									}?></td>
								
									<td>
									<?php
									if($row['bedR']==0){
										echo "Not requested";
									}
						
									else if(($row['doctorStatusB']==1 && $row['userStatusA']==1))  
									{
										echo "Accepted";
									}
									else if($row['userStatusA']==0)  
									{
										echo "Cancelled by You";
									}

									else if($row['doctorStatusB']==0)  
									{
										echo "Cancelled by Doctor";
									}
									else if($row['doctorStatusB']==-1)
									{
										echo "Pending";
									}
					
									?></td>
                        
									<td>
									<?php if(($row['userStatusA']==1) && ($row['doctorStatusA']==1))  
									{
										echo "Accepted";
									}
									else if(($row['userStatusA']==0))  
									{
										echo "Cancelled by You";
									}

									else if(($row['doctorStatusA']==0))  
									{
										echo "Cancelled by Doctor";
									}
									else if($row['doctorStatusA']==-1)
										echo "Pending";
									?></td>
						

									<td>
									<?php if(($row['userStatusA']==1) && ($row['doctorStatusA']!=0))  
									{ ?>

													
									<a href="patient-panel.php?aid=<?php echo $row['aid']?>&cancel1=update" 
									onClick="return confirm('Are you sure you want to cancel this appointment ?')"
									title="Cancel Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Cancel</button></a>
									<?php } else {

									echo "Cancelled";
									} ?>
                        
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<br>
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
