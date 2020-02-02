<!DOCTYPE html>


<?php

//CONNECT TO THE DATABASE
include 'connect_to_database.php';

session_start();

	if(!isset($_SESSION['cns_admin_username']))
			{
				header('location:index_admin.php');
			}


		$Admin_Username = $_SESSION['cns_admin_username'];


?>

<?php
	
		global $create_user_account;
		$create_user_account = 0;
		if(isset($_POST['submit'])){
			
		$create_user_account=1;
		
		
							$username         = $_POST['username'];
							$password         = md5($_POST['password']);
							$confirm_password =  md5($_POST['confirm_password']);
							
							$show_accounts = $conn->query("SELECT *FROM user_account WHERE UserName ='$username'");
							
							while($row=$show_accounts->fetch()){
								
							}
							
							if($show_accounts->rowCount() > 0 ) {
								
								echo '<script >';
								echo 'alert("Username Already Taken.")';
								echo '</script>';
								
								
								
								
								
								
								 
							}
							
							
							else if($password != $confirm_password) 
							{
								echo '<script>';
								echo 'alert("Password and Confirm Password did not match.")';
								
								echo '</script>';
								
								echo '<script >';
								
								echo 'alert("Upload Again the Photo.")';
				
								
								echo '</script>';

							}
							else {
								
															
							// FOLDER FOR THE IMAGES						
							$folder ="user_photo/"; 
							
							//GET THE FILE NAME
							$profile_photo = $_FILES['profile_photo']['name']; 
							
							//DECLARE THE PATH OF THE PHOTO
							$path = $folder . $profile_photo ; 
							
							// GET THE NAME OF THE PHOTO
							$target_file=$folder.basename($_FILES["profile_photo"]["name"]);

							//GET THE FILE EXTENSION OF THE PHOTO							 
							$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);

							//ALLOWED EXTENSION OF THE PHOTO					 
							$allowed=array('jpeg','png' ,'jpg'); 
							
							//THE FILENAME OF THE PHOTO
							$filename=$_FILES['profile_photo']['name']; 
							
							//GET THE FILE EXTENSION OF THE PHOTO
							$ext=pathinfo($filename, PATHINFO_EXTENSION);
							
							//IF THE EXTENSION IS NOT ALLOWED ECHO THE SCRIPT
							if(!in_array($ext,$allowed) ) 

							{ 
							
								echo '<script>';
								echo 'alert("Sorry, only JPG, JPEG, PNG & GIF  files are allowed.")';
								echo '</script>';

						

							}
							// IF THE PHOTO EXTENSION IS ALLOWED UPLOAD THE FILE TO THE PATH
							
							else{ 

								
							// UPLOAD THE FILE
							move_uploaded_file( $_FILES['profile_photo'] ['tmp_name'], $path); 

															

							
						

							//UPLOAD THE DATA INTO THE DATABASE
							$first_name       = $_POST['first_name'];
							$middle_name      = $_POST['middle_name'];
							$last_name        = $_POST['last_name'];
							
							$show_name = $conn->query("SELECT *FROM user_account WHERE FirstName='$first_name' && MiddleName='$middle_name' && LastName='$last_name'");
							
							while($row=$show_name ->fetch()){
								
							}
							
							if($show_name->rowCount() > 0 ) {
								
								echo '<script >';
								echo 'alert("User already created.")';
								echo '</script>';
								
							}else {
							
							$username         = $_POST['username'];
							$date_of_birth      =	$_POST['date_of_birth'];
							$birth_place      = $_POST['birth_place'];
							$position         = $_POST['position'];
							$work_place       = $_POST['work_place'];
							
							
							/**
							* Simple PHP age Calculator
							* 
							* Calculate and returns age based on the date provided by the user.
							* @param   date of birth('Format:yyyy-mm-dd').
							* @return  age based on date of birth
							*/
							function ageCalculator($dob){
							if(!empty($dob)){
							$birthdate = new DateTime($dob);
							$today   = new DateTime('today');
							$age = $birthdate->diff($today)->y;
							return $age;
							}else{
							return 0;
								}
							}
								$dob = $date_of_birth;
								$age = ageCalculator($dob);
							
							//INSERT THE DATA FROM FROM TO DATABASE
							$adminreg = $conn->query("INSERT INTO user_account (FirstName,MiddleName,LastName,UserName,Password,ConfirmPassword,BirthMonth,Age,BirthPlace,Position,WorkPlace) VALUES ('$first_name','$middle_name' ,'$last_name','$username','$password','$confirm_password', '$date_of_birth', '$age', '$birth_place', '$position','$work_place')");

							
							//ECHO THAT THE USER IS CREATED
							
						
							unset($_POST['first_name']);
							unset($_POST['middle_name']);
							unset($_POST['last_name']);
							unset($_POST['username']);
							unset($_POST['password']);
							unset($_POST['confirm_password']);
							unset($_POST['date_of_birth']);
							unset($_POST['birth_place']);
							unset($_POST['position']);
							unset($_POST['work_place']);
							
							echo '<script>';
							echo 'alert("User Account Succesfully Created.")';
							echo '</script>';
							
							
						
		}
		
		}
		}
		
		}
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
	<title>Create User Account</title>
	<!--TITLE ENDS HERE-->
	
	<!--JQUERY-->
	<script src="jquery/jquery.js"> </script>
	<!--JQUERY ENDS HERE--

	
	
<!--HEAD STYLE, JAVASCRIPT, AND ETC-->	
<head>

<script>


</script>

<style>
@media only screen and (max-width:800px) {



body {
	
	overflow-x:hidden;
	
}
}




</style>
</head>
<!--HEAD ENDS HERE-->	

<body>
<!--SIDENAV-->
<div  id="mySidenav" class="sidenav">

<div class="profile">
	<?php
	
	//QUERY THE DATAS FROM THE admin_account table
	$show_accounts = $conn->query("SELECT * FROM admin_account WHERE UserName = '$Admin_Username'");
			
			//FETCH THE DATAS FROM admin_account table
			while($row=$show_accounts->fetch()){
			
			//SET $image_name value is equal to ProfilePhoto
			$image_name=$row['ProfilePhoto'];
			
			//SET $admin_first_name value is equal to FirstName
			$admin_first_name=$row['FirstName'];
			
			?>
<!-- GET THE IMAGE NAME FROM $image_name -->
<img src="admin_photo/<?php echo $image_name; ?>">


			
<!-- GET THE ADMIN NAME FROM $admin_first_name -->			
<p><?php echo $admin_first_name; ?></p>
<span>Administrator</span>					

<?php } ?>	
</div>

<div class="cp_sidenav_responsive">
<div >
<ul class="sidenavmenus">


 <li>
 <a href="home_admin.php">
 <i  class="fa fa-home fa-lg "></i><span>Home</span>
 </a>
 </li>

 
 <li>
 <a href="admin_profile.php">
 <i  class="fa fa-user fa-lg active"></i><span>Admin Profile</span>
 </a>
 </li>
 
 
 <li>
 <a href="about_admin.php">
 <i class="fa fa-book fa-lg"></i><span>About</span>
 </a>
 </li>
 
 <li>
 <a href="create_user_account.php">
 <i class="fa fa-plus fa-lg"></i><span class="active">Create User Account</span>
 </a>
 </li>
 
 <li>
 <a href="list_of_accounts.php">
 <i class="fa fa-list-ol fa-lg"></i><span>List of Accounts</span>
 </a>
 </li>
 
 <li>
 <a href="update_admin_account.php">
 <i  class="fa fa-pencil-square-o fa-lg"></i><span>Update Admin Account</span>
 </a>
 </li>
 
 <li>
 <a href="create_announcement.php">
 <i  class="fa fa-exclamation fa-lg"></i><span>Announcements</span>
 </a>
 </li>
 
</ul>
</div>
</div>

<div class="removesidenav">
<a onclick="closeNav()"><span class="fa fa-eye-slash" ></span>Hide Sidebar</a>
</div>
</div>
<!--SIDENAV ENDS HERE-->



<!--CONTENT-->
<div id="main">


<!--TOPBAR-->
<div  class="topbar">
	
	<!--SIDENAV BUTTON & LOGO-->
	<div class="sidenav_button_logo">
		<a href="#home" onclick="openNav()"><span class="fa fa-bars fa-lg"></span></a><img src="Images/small_CNSLogowhite.png">
	</div>
	<!--SIDENAV BUTTON & LOGO ENDS HERE-->
 
	
	<div class="topbar_welcome_logout">
	<?php
	
	//QUERY THE DATAS FROM THE admin_account table
	$show_accounts = $conn->query("SELECT *FROM admin_account WHERE UserName='$Admin_Username'");
	
			//FETCH THE DATAS FROM admin_account table
			while($row=$show_accounts->fetch()){
			
			//SET $image_name value is equal to ProfilePhoto	
			
			
			//SET $admin_first_name value is equal to FirstName
			$admin_first_name=$row['FirstName'];
			
			?>
																				
	<a href="logout_account.php"><span class=" fa fa-power-off fa-lg"></span></a><a href="admin_profile.php">
	<!-- GET THE ADMIN NAME FROM $admin_first_name -->
	<?php echo $admin_first_name; ?></a>
	<!-- GET THE IMAGE NAME FROM $image_name -->
	<img src="admin_photo/<?php echo $image_name; ?>">
	
			<?php }
			?>

	</div>

</div>
<!-- TOPBAR ENDS HERE -->

<div class="cp_responsive">
<!--CREATE USER ACCOUNT HEADER----------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="create_account_container">
<div class="create_header">Create User Account</div>
</div>


<!--CREATE USER ACCOUNT FORM----------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="responsive">
<div class="create_account">


<form action="#" method="POST" enctype="multipart/form-data">

<div class="part1">


<div>
<label>First Name:</label>
<input type="text" name="first_name" placeholder="Enter First Name" value = "<?php echo isset($_POST["first_name"]) ?  $_POST['first_name']: '';  ?>" required/>
</div> 
 
<div>
<label> Middle Name: </label>
<input type="text" name="middle_name" placeholder="Enter Middle Name" value = "<?php echo isset($_POST["middle_name"]) ?  $_POST['middle_name']: '';  ?>" required/>
</div>


<div>
<label> Last Name: </label>
<input type="text" name="last_name" placeholder="Enter Last Name" value = "<?php echo isset($_POST["last_name"]) ?  $_POST['last_name']: '';  ?>" required/>
</div>

<div>
<label> Username: </label>
<input type="text" name="username" placeholder="Enter Username" value = "<?php echo isset($_POST["username"]) ?  $_POST['username']: '';  ?>" required/>
</div>

<div>
<label> Password: </label>
<input type="password" name="password" placeholder="Enter Password" value = "<?php echo isset($_POST["password"]) ?  $_POST['password']: '';  ?>" required/>
</div>

<div>
<label> Confirm Password: </label>
<input type="password" name="confirm_password" placeholder="Re-Enter Password" value = "<?php echo isset($_POST["confirm_password"]) ?  $_POST['confirm_password']: '';  ?>"  required/>
</div>


</div>




<div class="part2">



<div>
<label>Date of Birth</label>
<input type="date" name="date_of_birth" placeholder="Enter Year" value = " " required/>
</div>

<div>
<label> Birth Place: </label>
<input type="text" name="birth_place" placeholder="Enter Birth Place" value = "<?php echo isset($_POST["birth_place"]) ?  $_POST['birth_place']: '';  ?>" required/>
</div>

<div>
<label> Position: </label>
<select  name="position">
									<option value="" disabled selected>Select Position</option>
                                    <option name="gender" value="Barangay Nutrition Scholar">Barangay Nutrition Scholar</option>
                                    <option name="gender" value="Barangay Health Worker">Barangay Health Worker</option>
									<option name="gender" value="Municipal Nutritionist">Municipal Nutritionist</option>
								
									
                                   
</select required>
</div>



<div>
<label> Work Place: </label>
<input type="text" name="work_place" placeholder="Enter Work Place" value = "<?php echo isset($_POST["work_place"]) ?  $_POST['work_place']: '';  ?>" required/>
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





 var viewportwidth;
 var viewportheight;
  
 // the more standards compliant browsers (mozilla/netscape/opera/IE7) use window.innerWidth and window.innerHeight
  
 if (typeof window.innerWidth != 'undefined')
 {
      viewportwidth = window.innerWidth,
      viewportheight = window.innerHeight
 }
  
// IE6 in standards compliant mode (i.e. with a valid doctype as the first line in the document)
 
 else if (typeof document.documentElement != 'undefined'
     && typeof document.documentElement.clientWidth !=
     'undefined' && document.documentElement.clientWidth != 0)
 {
       viewportwidth = document.documentElement.clientWidth,
       viewportheight = document.documentElement.clientHeight
 }
  
 // older versions of IE
  
 else
 {
       viewportwidth = document.getElementsByTagName('body')[0].clientWidth,
       viewportheight = document.getElementsByTagName('body')[0].clientHeight
 }

 
  /*document.write(viewportwidth + ' ' + viewportheight);*/

	var viewportwidth_min = 300;
	var viewportwidth_max = 500;
 
 
  var viewportheight_min = 300 ;
  var viewportheight_max = 700;

  if( viewportwidth_min <=  viewportwidth && viewportwidth <= viewportwidth_max && viewportheight_min <= viewportheight && viewportheight <= viewportheight_max) {
	  
	  
	  
	function openNav() {
    document.getElementById("mySidenav").style.width = "400px";
    document.getElementById("main").style.marginLeft = "400px";
	document.getElementById("mainfooter").style.marginLeft = "400px";
	
	

    document.getElementById("main").style.display = "none";
	document.getElementById("mainfooter").style.display = "none";
	
	  

	}
	
	function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
	document.getElementById("mainfooter").style.marginLeft = "0";
	
	document.getElementById("main").style.display = "block";
	document.getElementById("mainfooter").style.display = "block";

}


}  


</script>
</body>
</html>