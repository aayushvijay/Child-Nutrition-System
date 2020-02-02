<!DOCTYPE html>

<?php

include 'connect_to_database.php';
session_start();

?>


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
	<title>Create Guest Account</title>
	<!--TITLE ENDS HERE-->
	
	<!--JQUERY-->
	<script src="jquery/jquery.js"> </script>
	<!--JQUERY ENDS HERE--

	
	
<!--HEAD STYLE, JAVASCRIPT, AND ETC-->	
<head>

<script>


</script>

<style>

.guest {
	
	
	border-top:2px solid #DDDCE4;
	border-bottom:2px solid #DDDCE4;
	
}

.margin-part2 {
	
	margin-top:7px;
	
	
}


.formfield * {
  vertical-align: top;
}
body{
overflow-x:hidden;
}
</style>
</head>
<!--HEAD ENDS HERE-->	

<body>
<?php
	
		global $create_user_account;
		$create_user_account = 0;
		if(isset($_POST['submit'])){
			
		$create_user_account=1;
																						
															
	
							
						

							//UPLOAD THE DATA INTO THE DATABASE
							$first_name       = $_POST['first_name'];
							$middle_name      = $_POST['middle_name'];
							$last_name        = $_POST['last_name'];
							$occupation       =	$_POST['occupation'];
							$reason           = $_POST['reason'];
						
						
							
							//INSERT THE DATA FROM FROM TO DATABASE
							$adminreg = $conn->query("INSERT INTO user_account_guest (FirstName,MiddleName,LastName,Occupation,Reason) VALUES ('$first_name','$middle_name' ,'$last_name', '$occupation','$reason')");

							
							
							$_SESSION['guest_user'] = $first_name;
							
							header('location:home_guest.php');
							
							
							
							//ECHO THAT THE USER IS CREATED
							echo '<script>';
							echo 'alert("User Account Succesfully Created.")';
							echo '</script>';
		}
			
		


?>
<!--SIDENAV-->
<div  id="mySidenav" class="sidenav">

<div class="profile">

<img src="Images/cat3.jpg">

<p>Christian Lester</p>
<span>Administrator</span>					


</div>




<div class="removesidenav">
<a onclick="closeNav()">Hide Sidebar</a>
</div>
</div>
<!--SIDENAV ENDS HERE-->



<!--CONTENT-->
<div id="main">


<!--TOPBAR-->
<div  class="topbar">
	
	<!--SIDENAV BUTTON & LOGO-->
	<div class="sidenav_button_logo">
		<img style="margin-left:20px" src="Images/small_CNSLogowhite.png">
		
		
		<a style="float:right; margin-right:40px; " href="index.php">Login as User</a>
	</div>
	<!--SIDENAV BUTTON & LOGO ENDS HERE-->
 
	


</div>
<!-- TOPBAR ENDS HERE -->


<!--CREATE GUEST ACCOUNT HEADER----------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<div class="cp_responsive_guest">
<div class="create_account_container">
<div class="create_header">Create Guest Account</div>
</div>


<!--CREATE GUEST ACCOUNT FORM----------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="create_account guest">


<form method="POST">

<div class="part1 guest_responsive_part2">



<div>
<label>First Name</label>
<input type="text" name="first_name" placeholder="Enter First Name" required/>
</div> 
 
<div>
<label> Middle Name: </label>
<input type="text" name="middle_name" placeholder="Enter Middle Name" required/>
</div>


<div>
<label> Last Name: </label>
<input type="text" name="last_name" placeholder="Enter Last Name" required/>
</div>




</div>



<div  class="part2 guest_responsive_part2">



<div>
<label> Occupation: </label>
<input type="text" name="occupation" placeholder="Enter Occupation " required/>
</div>

<div>
<p class="formfield">
<label> Reason: </label>
<textarea class="reason" type="text" name="reason" placeholder="Enter Reason" cols="40" rows="12" ></textarea>
</p>
</div>




</div>

</div>

<div class="create_account_container">
<div class="create_user_account">
<button  type="submit" name ="submit">Submit</button>
</div>
</div> 
</form>

</div>



<!--FOOTER----------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="mainfooter" class="fotter_home">
 <center>&copy; 2018 Child Nutrition System</center>
</div>
<!--FOOTER ENDS HERE-->
</div>


<!--SCRIPTS----------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "240px";
    document.getElementById("main").style.marginLeft = "240px";
	document.getElementById("mainfooter").style.marginLeft = "240px";

}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
	document.getElementById("mainfooter").style.marginLeft = "0";

}

 function upload(){
	 
	var upload_value = document.getElementById('upload_value');

	if(document.getElementById("upload_value").value != ""){
	document.getElementById("fileuploaded").innerHTML="Photo Uploaded";
	document.getElementById("fileuploaded").style.color="#56B855";

	

	}

}
</script>
</body>
</html>