<?php
$con=mysqli_connect("localhost","root","","hmsdb");
$q1="insert into block(hpid) values('HOS-HYD-124');";
$r1=mysqli_query($con,$q1);
$q2="select * from block";
$r2=mysqli_query($con,$q2);
$row=mysqli_fetch_array($r2);
echo date('Y-m-d H:i:s',strtotime('+48 hour',strtotime($row["time"])));
?>