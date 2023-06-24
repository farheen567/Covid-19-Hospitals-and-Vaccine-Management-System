<!DOCTYPE html>
<?php 
$con=mysqli_connect("localhost","root","","hmsdb");

if(isset($_POST['docsub']))
{
	$hpid=$_POST['hpid'];
	$hname=$_POST['hname'];
	$phn=$_POST['phn'];
	$email=$_POST['email'];
	$location=$_POST['location'];
	$address=$_POST['address'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$q1="insert into hospitals values('$hpid','$hname','$phn','$email','$location','$address');";
	$r1=mysqli_query($con,$q1);
	$q2="insert into admins(`hpid`,`username`,`password`,`email`) values('$hpid','$username','$password','$email');";
	$r2=mysqli_query($con,$q2);
	$rat=0;
	$q3="insert into avgr(hpid,arate) values('$hpid',$rat);";
	$r3=mysqli_query($con,$q3);
  if($r1 && $r2 && $r3)
    {
      echo "<script>alert('Admin added successfully!');</script>";
  }
}


if(isset($_POST['dosub']))
{
	$vid=$_POST['hpid'];
	$vname=$_POST['hname'];
	$email=$_POST['email'];
	$location=$_POST['location'];
	$address=$_POST['address'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$q1="insert into vcenters values('$vid','$vname','$location','$address');";
	$r1=mysqli_query($con,$q1);
	$q2="insert into vadmin(`vid`,`username`,`password`,`email`) values('$vid','$username','$password','$email');";
	$r2=mysqli_query($con,$q2);
  if($r1 && $r2)
    {
      echo "<script>alert('Admin added successfully!');</script>";
  }
}


if(isset($_GET['cancel1']))
  {
	  
    $query=mysqli_query($con,"insert into block(hpid) values('".$_GET['hpid']."')");
   
	if($query)
	{
		echo "<script>alert('Admin will be deleted after 48 hrs!');</script>";
  }
  else{
	  echo "<script>alert('Cannot Block!');</script>";
  }
  }
 
if(isset($_GET['cancel2']))
  {
	  
    $query=mysqli_query($con,"insert into block1(vid) values('".$_GET['vid']."')");
   
	if($query)
	{
		echo "<script>alert('Admin will be deleted after 48 hrs!');</script>";
  }
  else{
	  echo "<script>alert('Cannot Block!');</script>";
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
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Health Service </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <script >
    var check = function() {
  if (document.getElementById('dpassword').value ==
    document.getElementById('cdpassword').value) {
    document.getElementById('message').style.color = '#5dd05d';
    document.getElementById('message').innerHTML = 'Matched';
  } else {
    document.getElementById('message').style.color = '#f55252';
    document.getElementById('message').innerHTML = 'Not Matching';
  }
}

    function alphaOnly(event) {
  var key = event.keyCode;
  return ((key >= 65 && key <= 90) || key == 8 || key == 32);
};

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
  </script>

  <style >
    .bg-primary {
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}

.col-md-4{
  max-width:20% !important;
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

#cpass {
  display: -webkit-box;
}

#list-app{
  font-size:15px;
}

.btn-primary{
  background-color: #3c50c1;
  border-color: #3c50c1;
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
    <h3 style = "margin-left: 40%; padding-bottom: 20px;font-family: 'IBM Plex Sans', sans-serif;"> WELCOME SUPER ADMIN </h3>
    <div class="row">
  <div class="col-md-4" style="max-width:25%;margin-top: 3%;">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-dash-list" data-toggle="list" href="#list-dash" role="tab" aria-controls="home">Dashboard</a>
      <a class="list-group-item list-group-item-action" href="#list-doc" id="list-doc-list"  role="tab"    aria-controls="home" data-toggle="list">Hospital Admins List</a>
	  <a class="list-group-item list-group-item-action" href="#list-vadmin" id="list-vadmin-list"  role="tab" data-toggle="list" aria-controls="home">Vaccination Center Admins List</a>
      <a class="list-group-item list-group-item-action" href="#list-pat" id="list-pat-list"  role="tab" data-toggle="list" aria-controls="home">Users List</a>
      <a class="list-group-item list-group-item-action" href="#list-settings" id="list-adoc-list"  role="tab" data-toggle="list" aria-controls="home">Add Hospital/Admin</a>
	  <a class="list-group-item list-group-item-action" href="#list-advadmin" id="list-advadmin-list"  role="tab" data-toggle="list" aria-controls="home">Add VC Admin</a>
      <a class="list-group-item list-group-item-action" href="#list-mes" id="list-mes-list"  role="tab" data-toggle="list" aria-controls="home">Queries</a>
      
	  
	  
    </div><br>
  </div>
  <div class="col-md-8" style="margin-top: 3%;">
    <div class="tab-content" id="nav-tabContent" style="width: 950px;">
		<div class="tab-pane fade show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
			<div class="container-fluid container-fullw bg-white" >
				<div class="row">
					<div class="col-sm-4">
						<div class="panel panel-white no-radius text-center">
							<div class="panel-body">
								<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
								<h4 class="StepTitle" style="margin-top: 5%;">Admins List</h4>
								<script>
								function clickDiv(id) {
								document.querySelector(id).click();
								}
								</script> 
								<p class="cl-effect-1">
								<a href="#list-doc" onclick="clickDiv('#list-doc-list')">Hospital Admins</a>
								&nbsp|
								<a href="#list-vadmin" onclick="clickDiv('#list-vadmin-list')">
								Vaccination Center Admins
								</a>
								</p>
							</div>
						</div>
					</div>

					<div class="col-sm-4" style="left: -3%">
						<div class="panel panel-white no-radius text-center">
							<div class="panel-body" >
								<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
								<h4 class="StepTitle" style="margin-top: 5%;">Users List</h4>
                      
								<p class="cl-effect-1">
								<a href="#list-pat" onclick="clickDiv('#list-pat-list')">
								View Users
								</a>
								</p>
							</div>
						</div>
					</div>
                
			   
					<div class="col-sm-4">
						<div class="panel panel-white no-radius text-center">
							<div class="panel-body" >
								<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
								<h4 class="StepTitle" style="margin-top: 5%;">Manage Admins</h4>
                    
								<p class="cl-effect-1">
								<a href="#list-settings" onclick="clickDiv('#list-adoc-list')">Add Hospital Admin</a>
								&nbsp|
								<a href="#list-advadmin" onclick="clickDiv('#list-advadmin-list')">
								Add VC Admin
								</a>
								</p>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
      
                
      






      <div class="tab-pane fade" id="list-doc" role="tabpanel" aria-labelledby="list-home-list">
              

              
              <table class="table table-hover">
                <thead>
                  <tr>
					<th scope="col">S.No</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Password</th>
					<th scope="col">Email</th>
					<th scope="col">Hospital Name</th>
					<th scope="col">Hospital Id</th>
					<th scope="col">Hospital Location</th>
					<th scope="col">Hospital Address</th>
					<th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $con=mysqli_connect("localhost","root","","hmsdb");
                    global $con;
                    $query = "select * from admins a, hospitals h where a.hpid=h.hpid";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
					  $id=$row['id'];
                      $username = $row['username'];
                      $password = $row['password'];
                      $email = $row['email'];
					  $h=$row['hpid'];
					  $hname=$row['hname'];
					  $hlocation=$row['Location'];
					  $haddress=$row['Address'];
                      echo "<tr>
						<td>$id</td>
                        <td>$username</td>
                        <td>$password</td>
						<td>$email</td>
						<td>$hname</td>
						<td>$h</td>
						<td>$hlocation</td>
						<td>$haddress</td>";
						?>
						<td><a href='admin-panel1.php?hpid=<?php echo $row["hpid"]?>&cancel1=update' 
                              onClick='return confirm(\"Are you sure you want to block this hospital ?\")'
                              title='Block' tooltip-placement='top' tooltip='Remove'><button class='btn btn-danger'>Block</button></a>
						</td>
                      </tr>
					 <?php
                    }

                  ?>
                </tbody>
              </table>
        <br>
      </div>
    
	
	
	
	
	
	
	<div class="tab-pane fade" id="list-vadmin" role="tabpanel" aria-labelledby="list-home-list">
              

              
              <table class="table table-hover">
                <thead>
                  <tr>
					<th scope="col">S.No</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Password</th>
					<th scope="col">Email</th>
					<th scope="col">VC Id</th>
					<th scope="col">VC Name</th>
					<th scope="col">VC Location</th>
					<th scope="col">VC Address</th>
					<th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $con=mysqli_connect("localhost","root","","hmsdb");
                    global $con;
                    $query = "select * from vadmin a, vcenters c where a.vid=c.vid";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
					  $id=$row['vaid'];
                      $username = $row['username'];
                      $password = $row['password'];
                      $email = $row['email'];
					  $h=$row['vid'];
					  $hname=$row['vname'];
					  $hlocation=$row['location'];
					  $haddress=$row['address'];
                      echo "<tr>
						<td>$id</td>
                        <td>$username</td>
                        <td>$password</td>
						<td>$email</td>
						<td>$h</td>
						<td>$hname</td>
						<td>$hlocation</td>
						<td>$haddress</td>";
						?>
						<td><a href='admin-panel1.php?vid=<?php echo $h?>&cancel2=update' 
                              onClick='return confirm(\"Are you sure you want to block this hospital ?\")'
                              title='Block' tooltip-placement='top' tooltip='Remove'><button class='btn btn-danger'>Block</button></a>
						</td>
                      </tr>
					  <?php
                    }

                  ?>
                </tbody>
              </table>
        <br>
    </div>
    
	
	
	
	
	
	

    <div class="tab-pane fade" id="list-pat" role="tabpanel" aria-labelledby="list-pat-list">

       
        
              <table class="table table-hover">
                <thead>
                  <tr>
                  <th scope="col">User ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Password</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $con=mysqli_connect("localhost","root","","hmsdb");
                    global $con;
                    $query = "select * from patreg";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
                      $pid = $row['pid'];
                      $fname = $row['fname'];
                      $lname = $row['lname'];
                      $gender = $row['gender'];
                      $email = $row['email'];
                      $contact = $row['contact'];
                      $password = $row['password'];
                      
                      echo "<tr>
                        <td>$pid</td>
                        <td>$fname</td>
                        <td>$lname</td>
                        <td>$gender</td>
                        <td>$email</td>
                        <td>$contact</td>
                        <td>$password</td>
                      </tr>";
                    }

                  ?>
                </tbody>
              </table>
        <br>
      </div>
	  
	  
<div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>

      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
        <form class="form-group" method="post" action="admin-panel1.php">
          <div class="row">
				  <div class="col-md-4"><label>Hospital Id:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="hpid" required></div><br><br>
				  <div class="col-md-4"><label>Hospital Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="hname" required></div><br><br>
				  
				  <div class="col-md-4"><label>Phone:</label></div>
                  <div class="col-md-8"><input type="tel" minlength="10" maxlength="10" class="form-control" name="phn" required></div><br><br>
				  <div class="col-md-4"><label>Email:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="email" onfocusout='validateEmail();' required></div><br><br>
				  <div class="col-md-4"><label>Location:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="location" onkeydown="return alphaOnly(event);" required></div><br><br>
				  <div class="col-md-4"><label>Address:</label></div>
                  <div class="col-md-8"><textarea name="address" rows="3" cols="50" class="form-control" required></textarea></div><br><br>
                  <div class="col-md-4"><label>Admin Username:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="username" onkeydown="return alphaOnly(event);" required></div><br><br>
                  <div class="col-md-4"><label>Password:</label></div>
                  <div class="col-md-8"><input type="password" class="form-control"  onkeyup='check();' name="password" id="password"  required></div><br><br>
                  <div class="col-md-4"><label>Confirm Password:</label></div>
                  <div class="col-md-8"  id='cpass'><input type="password" class="form-control" onkeyup='check();' name="cdpassword" id="cdpassword" required>&nbsp &nbsp<span id='message'></span> </div><br><br>
				</div>
          <input type="submit" name="docsub" value="Add Admin" class="btn btn-primary">
        </form>
      </div>
	  
	  
	  
	  
	  

      <div class="tab-pane fade" id="list-advadmin" role="tabpanel" aria-labelledby="list-settings-list">
        <form class="form-group" method="post" action="admin-panel1.php">
          <div class="row">
				  <div class="col-md-4"><label>VC Id:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="hpid" required></div><br><br>
				  <div class="col-md-4"><label>VC Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="hname" required></div><br><br>
				  <div class="col-md-4"><label>Email:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="email" onfocusout='validateEmail();' required></div><br><br>
				  <div class="col-md-4"><label>Location:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="location" onkeydown="return alphaOnly(event);" required></div><br><br>
				  <div class="col-md-4"><label>Address:</label></div>
                  <div class="col-md-8"><textarea name="address" rows="3" cols="50" class="form-control" required></textarea></div><br><br>
                  <div class="col-md-4"><label>Admin Username:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="username" onkeydown="return alphaOnly(event);" required></div><br><br>
                  <div class="col-md-4"><label>Password:</label></div>
                  <div class="col-md-8"><input type="password" class="form-control"  onkeyup='check();' name="password" id="password"  required></div><br><br>
                  <div class="col-md-4"><label>Confirm Password:</label></div>
                  <div class="col-md-8"  id='cpass'><input type="password" class="form-control" onkeyup='check();' name="cdpassword" id="cdpassword" required>&nbsp &nbsp<span id='message'></span> </div><br><br>
				</div>
          <input type="submit" name="dosub" value="Add Admin" class="btn btn-primary">
        </form>
      </div>

      


       <div class="tab-pane fade" id="list-mes" role="tabpanel" aria-labelledby="list-mes-list">

         
        
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Message</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    $con=mysqli_connect("localhost","root","","hmsdb");
                    global $con;

                    $query = "select * from contact;";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
              
                      #$fname = $row['fname'];
                      #$lname = $row['lname'];
                      #$email = $row['email'];
                      #$contact = $row['contact'];
                  ?>
                      <tr>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['contact'];?></td>
                        <td><?php echo $row['message'];?></td>
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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
  </body>
</html>