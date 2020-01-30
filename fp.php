<?php

session_start();
if(!empty($_SESSION['user']))
{
	unset($_SESSION['user']);

}
if(!empty($_POST['usname']) && !empty($_POST['psword']))
{
	require_once('teststudent/students.php');
	$o=new TestStudent();
	$array=$o->checkStLogin($_POST['usname'],$_POST['psword']);
	if(!empty($array['status']) && !empty($array['name']) && $array['status']==1)
	{
		$_SESSION['user']=$_POST['usname'];
		header('Location:home.php');
   }
   else
   {
	
       $err=9;
   }
}
?>
<!DOCTYPE html>
<html>
<head> 
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
   .input-container {
	     display: flex;

  width: 100%;
}
.icon {
	padding-top:9px;
	width:50px;
  text-align:center;
  color:blue;
}
</style>
</head>
<?php
require_once("header.html");
?>
<body>
<form action="log.php" method="POST">
<br>
<div class="row">
<div class="col-sm-4">&nbsp </div>
<div class="col-sm-4" style="text-align:center">
	<h3>Student Login</h3>
	<br>
	<div class="input-container">
	<i class="fa fa-user icon"></i>
	<input type="text" class="form-control" placeholder="username" name="usname">
	</div>
	<br>
	<div class="input-container">
	<i class="fa fa-lock icon"></i>
<input type="password" class="form-control" placeholder="password" name="psword">
</div>
<br>
<input type="submit" style="margin-left:60px;width:80%" class="form-control btn-primary " value="Login">
<br>
<a href="fog.php" >forget password</a>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<a  href="soul.php" class="btn btn-primary">Sign up</a>
</div>
<div class="col-sm-4 ">&nbsp </div>
</div>
</form>
<?php
if(!empty($err))
{
	echo "<div class='alert alert-danger'>Invalid Credentials...!</div>";
}
?>
</body>
</html>