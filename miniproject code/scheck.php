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
        <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="body.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Back</a>
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
  <script>
	function myfun()
	{
		var c1=document.getElementById("c1");
		var c2=document.getElementById("c2");
		var c3=document.getElementById("c3");
		var c4=document.getElementById("c4");
		var c5=document.getElementById("c5");
		var c6=document.getElementById("c6");
		var c7=document.getElementById("c7");
		var c8=document.getElementById("c8");
		var c9=document.getElementById("c9");
		var c10=document.getElementById("c10");
		var c11=document.getElementById("c11");
		var c1=document.getElementById("c12");
		var c=0;
		var x=document.getElementById('x');
		if(c1.checked==true)
		{
			c+=1
		}
		if(c2.checked==true)
		{
			c+=1
		}
		if(c3.checked==true)
		{
			c+=1
		}
		if(c4.checked==true)
		{
			c+=1
		}
		if(c5.checked==true)
		{
			c+=1
		}
		if(c6.checked==true)
		{
			c+=1
		}
		if(c7.checked==true)
		{
			c+=1
		}
		if(c8.checked==true)
		{
			c+=2
		}
		if(c9.checked==true)
		{
			c+=2
		}
		if(c10.checked==true)
		{
			c+=3
		}
		if(c11.checked==true)
		{
			c+=3
		}
		if(c12.checked==true)
		{
			c+=3
		}
		if(c1.checked==false && c2.checked==false && c3.checked==false && c4.checked==false && c5.checked==false && c6.checked==false && c7.checked==false && c8.checked==false && c9.checked==false && c10.checked==false && c11.checked==false && c12.checked==false)
		{
			x.value="Choose the symptoms";
		}
		else if(c>=0 && c<=2)
		{
			x.value="May be stress related and observe";
		}
		else if(c>=3 && c<=5)
		{
			x.value="Hydrate properly and proper personel hygiene.Observe and Re-evaluate after 2 days";
		}
		else if(c>=6 && c<=12)
		{
			x.value="Seek a consultation with Doctor";
		}
		else if(c>=12 && c<=24)
		{
			x.value="Call the DOH Hotline 02-8-651-7800";
		}
	}
  </script>
</head>
<body>
<br><br><br>
 <div class="container">
 <center>
	<table border="1px" width="55%">
		<thead>
			<tr>
			<th scope="col" style="text-align:center;" colspan="2">SYMPTOMS</th>
			<th scope="col">     </th>
			</tr>
		</thead>
		<tbody>
			<tr>
			<td style="width:10%;text-align:center;"><img src="images/cough.jpg" width="100" height="100" alt="Could not be loaded"/></td>
			<td style="width:40%;text-align:center;">Do you have cough?</td>
			<td style="width:5%;text-align:center;"><input type="checkbox" name="c1" id="c1"/></td>
			</tr>
			<tr>
			<td style="width:10%;text-align:center;"><img src="images/cold.jpg" width="100" height="100" alt="Could not be loaded"/></td>
			<td style="width:40%;text-align:center;">Do you have colds?</td>
			<td style="width:5%;text-align:center;"><input type="checkbox" name="c2" id="c2"/></td>
			</tr>
			<tr>
			<td style="width:10%;text-align:center;"><img src="images/diarrhea.jpg" width="100" height="100" alt="Could not be loaded"/></td>
			<td style="width:40%;text-align:center;">Are you having Diarrhea?</td>
			<td style="width:5%;text-align:center;"><input type="checkbox" name="c3" id="c3"/></td>
			</tr>
			<tr>
			<td style="width:10%;text-align:center;"><img src="images/throat.jpg" width="100" height="100" alt="Could not be loaded"/></td>
			<td style="width:40%;text-align:center;">Do you have sore throat?</td>
			<td style="width:5%;text-align:center;"><input type="checkbox" name="c4" id="c4"/></td>
			</tr>
			<tr>
			<td style="width:10%;text-align:center;"><img src="images/bodyache.jfif" width="100" height="100" alt="Could not be loaded"/></td>
			<td style="width:40%;text-align:center;">Are you experiencing MYALGIA or BOdy Aches?</td>
			<td style="width:5%;text-align:center;"><input type="checkbox" name="c5" id="c5"/></td>
			</tr>
			<tr>
			<td style="width:10%;text-align:center;"><img src="images/headache.jpg" width="100" height="100" alt="Could not be loaded"/></td>
			<td style="width:40%;text-align:center;">Do you have a headache?</td>
			<td style="width:5%;text-align:center;"><input type="checkbox" name="c6" id="c6"/></td>
			</tr>
			<tr>
			<td style="width:10%;text-align:center;"><img src="images/thermometer.jpg" width="100" height="100" alt="Could not be loaded"/></td>
			<td style="width:40%;text-align:center;">Do you have fever(Temperature 37.8 Cand above)</td>
			<td style="width:5%;text-align:center;"><input type="checkbox" name="c7" id="c7"/></td>
			</tr>
			<tr>
			<td style="width:10%;text-align:center;"><img src="images/breath.jfif" width="100" height="100" alt="Could not be loaded"/></td>
			<td style="width:40%;text-align:center;">Are you having difficulty beathing?</td>
			<td style="width:5%;text-align:center;"><input type="checkbox" name="c8" id="c8"/></td>
			</tr>
			<tr>
			<td style="width:10%;text-align:center;"><img src="images/fatigue.jpg" width="100" height="100" alt="Could not be loaded"/></td>
			<td style="width:40%;text-align:center;">Are you experiencing Fatigue?</td>
			<td style="width:5%;text-align:center;"><input type="checkbox" name="c9" id="c9"/></td>
			</tr>
			<tr>
			<td style="width:10%;text-align:center;"><img src="images/travel.jpg" width="100" height="100" alt="Could not be loaded"/></td>
			<td style="width:40%;text-align:center;">Have you travelled recently during the past 14 days?</td>
			<td style="width:5%;text-align:center;"><input type="checkbox" name="c10" id="c10"/></td>
			</tr>
			<tr>
			<td style="width:10%;text-align:center;"><img src="images/area.jpg" width="100" height="100" alt="Could not be loaded"/></td>
			<td style="width:40%;text-align:center;">Do you have a travel history to a COVID-19 INFECTED AREA?</td>
			<td style="width:5%;text-align:center;"><input type="checkbox" name="c11" id="c11"/></td>
			</tr>
			<tr>
			<td style="width:10%;text-align:center;"><img src="images/talk.jpg" width="100" height="100" alt="Could not be loaded"/></td>
			<td style="width:40%;text-align:center;">Do you have direct contact or is taking care of a positive COVID-19 PATENT?</td>
			<td style="width:5%;text-align:center;"><input type="checkbox" name="c12" id="c12"/></td>
			</tr>
		</tbody>
	</table>
	<br>
	<input type="button" value="Submit" name="sub" onclick="myfun()"/><br><br>
	<textarea cols="100" rows="4"id="x"></textarea>
</center>
</div>
</body>
</html>