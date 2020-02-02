<!DOCTYPE html>

<!--CONNECT TO DATABASE-->
<?php

include 'connect_to_database.php';

session_start();

?>
<!-- -->


<html>
<!--META DATA-->
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="Images/cnms_favicon.jpg" type="image/gif" sizes="16x16">
	<!--META DATA ENDS HERE-->
	
	<!--CSS LINKS-->
    <link href="local_stylesheet/style.css" rel="stylesheet">
	<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<!--CSS LINKS ENDS HERE-->
	
	<!--TITLE-->
	<title>User Login</title>
	<!--TITLE ENDS HERE-->
	
<head>
<style>

body{
	
	overflow:hidden;
	overflow-y:auto;
	background-color:	#228B22;

}
	
	
</style>

</head>
<body >

<?php

//for session logs
			if(isset($_SESSION['cns_user_username']))
			{
				header('location:home.php');
			}

			
		if (isset($_POST['submit'])){
					$Username = $_POST['Username'];
					$Password= $_POST['Password'];
					
					$cns_db = $conn->query("SELECT * FROM user_account WHERE UserName='$Username' and Password='$Password'");
					
					$row = $cns_db->fetch();
					
					
					if(($Username==$row['UserName'])&& ($Password==$row['Password'])){
									
										$_SESSION['cns_user_username'] = $row['UserName'];
										header('location:home.php');
										
					}else{
						echo '<script>';
						echo  'alert("Incorrect Username or Password!")';		
						echo '</script>';
					}		
		}
									

?>


<!-- HEADER LOGO-->
<header>
<div class="logo">
<a href="index_admin.php"><img src="Images/cnms_logo.jpg"> </a>


<div class="log_in_responsive">
<a  href="home_guest.php">Login as Guest</a>
</div>
</div>
</header>
<!-- HEADER ENDS HERE LOGO-->

<!--LOGIN FORM-->
<form method="POST" action="">
<div class="login-page">
<div class="form">

<i class="fa fa-user-circle fa-4x"></i>
<h2>User Panel</h2>

<span class="fa fa-user-circle fa-lg">	</span>
<input name ="Username" type="text" placeholder="Username" required/>


<span class="fa fa-key fa-lg">	</span>
<input name="Password" type="password" placeholder="Password" required/>


<button type="submit" name="submit">Login</button>
<div class="click_responsive">
</div>
</div>

</div>
</form>
<!--LOGIN FORM ENDS HERE-->


<!--FOOTER----------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!--FOOTER ENDS HERE-->
</div>
</body>
</html>