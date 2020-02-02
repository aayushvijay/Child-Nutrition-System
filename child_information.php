<!DOCTYPE html>
<?php

include 'connect_to_database.php';

session_start();

	if(!isset($_SESSION['cns_user_username']))
			{
				header('location:index.php');
			}
			
			
	$User_Username = $_SESSION['cns_user_username'];
	
	


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
	<link href="local_stylesheet/style_user.css" rel="stylesheet">
	<link href="fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet">
	<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<!--CSS LINKS ENDS HERE-->
	
	<!--TITLE-->
	<title>Input Child Information</title>
	<!--TITLE ENDS HERE-->
	
	<!--JQUERY-->
	<script src="jquery/jquery.js"> </script>
	<!--JQUERY ENDS HERE--

	
	
<!--HEAD STYLE, JAVASCRIPT, AND ETC-->	
<head>

<script>


</script>

<style>

body {
	
	
background-color:white;	
}

</style>
</head>
<!--HEAD ENDS HERE-->	

<body>

<!--SIDENAV-->
<div id="mySidenav" class="user_sidenav">

<div class="user_profile">

<?php
	
	//QUERY THE DATAS FROM THE user_account table
	$show_account = $conn->query("SELECT *FROM user_account WHERE UserName = '$User_Username'");
	
	//FETCH THE DATAS FROM user_account table
	while($row=$show_account->fetch()){
		
		//SET the value of $image_name to ProfilePhoto
		
		//SET the value of $user_first_name to FirstName
		$user_first_name = $row['FirstName'];
		
		//SET the value of $user_position to Position
		$user_position = $row['Position'];
		
	}
		
		?>
		

	<p><?php echo $user_first_name?></p>
	<span><?php echo $user_position ?></span>	
	
	

</div>

<div class="user_menu">

<ul>

<li><i class="active_hover"></i><span  class="fa fa-home "></span> <a href="home.php">Home </a></li>
<li><span  class="fa fa-book "></span> <a href="about.php">About </a></li>
<li><span  class="fa fa-user "></span> <a href="user_profile.php">User Profile </a></li>
<li class="active"><span  class="fa fa-male "></span> <a href="child_information.php">Child Information</a></li>
<li><span  class="fa  fa-table "></span> <a href="child_information_table.php">Table</a></li>
<li><span  class="fa  fa-table "></span> <a href="bmi.php">BMI Chart</a></li>
<li><span  class="fa  fa-male "></span> <a href="calories.php">Calories Intake</a></li>
<li><span  class="fa  fa-table "></span> <a href="food.php">Nutritious Food Calories</a></li>




</ul>
</div>


<div class="user_removesidenav">
<a onclick="closeNav()"><span class="fa fa-eye-slash" ></span>Hide Sidebar</a>
</div>
</div>

<div id="main">

<div class="user_topbar">
	
	<!-- TOPBAR MENU AND IMAGE -->
	<div class="topbar_menu_logo">
	<a href="#" onclick="openNav()"> <span class="fa fa-bars fa-lg"></span></a><img src="Images/small_CNSLogowhite.png">
	</div>
	
	<!--TOP BAR USER NAME-->
	<div class="topbar_menu_user_name">
<?php 
    $show_account = $conn->query("SELECT *FROM user_account WHERE UserName = '$User_Username'");
	
	while($row=$show_account->fetch()){
		
		
		$user_first_name = $row['FirstName'];
	}
	
	?>
	
	<a href="logout_account.php"><span class=" fa fa-power-off"></span></a>
	<a href="user_profile.php"><?php echo $user_first_name ?></a>


	
	</div>
	

	
	
</div>

	<!--TOP BAR USER NAME ENDS HERE-->

<div class="cp_responsive">

<div class="child_information_container">

<span>Enter Child Information</span>

<div class="responsive1">
<div class="child_information_content">

<div class="child_information_input">


<?php 

			global $create_child_information ;
			
			$create_child_information = 0;
			
			if(isset($_POST['submit'])){
				
				$create_child_information = 1;
				
				
		
			$height_input = $_POST['Height'];
			$weight_input = $_POST['Weight'];
			$age_input = $_POST['Age'];
			$sex_input = $_POST['Sex'];
			
				//UPLOAD THE DATA INTO THE DATABASE
				
					$Name = $_POST['Name'];
					
					
					$show_name = $conn->query("SELECT *FROM child_information WHERE Name='$Name'");
							
							while($row=$show_name ->fetch()){
								
							}
							
							if($show_name->rowCount() > 0 ) {
								
								echo '<script >';
								echo 'alert("Name already in the list.")';
								echo '</script>';
								
							}else {
					
					
					
					$Age  = $_POST['Age'];
					$Sex  = $_POST['Sex'];
					$Address  = $_POST['Address'];
					$Height = $_POST['Height'];
					$Weight = $_POST['Weight'];
					$Guardian = $_POST['Guardian'];
					




	$bmi = $Weight / (($Height/100)*($Height/100));
	if($bmi < 17.5){
			$status = "Severely Underweight";
		}
		elseif ($bmi>=17.5 && $bmi <= 18.4) {
			$status = "Underweight";
		}
		elseif ($bmi>=18.5 && $bmi <= 25) {
			$status = "Optimal";
		}
		elseif ($bmi>=25.1 && $bmi <= 30) {
			$status = "Overweight";
		}
		elseif ($bmi>=30.1 && $bmi < 40) {
			$status = "Obese";
		}
		elseif ($bmi>=40) {
			$status = "Severely Obese";
		}
		if($Age>0 && $Age<=5){
			if($status == "Severely Underweight"){
				$calories = 700;
			}
			elseif($status == "Underweight"){
				$calories = 620;
			}
			elseif($status == "Optimal"){
				$calories = 550;
			}
			elseif($status == "Overweight"){
				$calories = 500;
			}
			elseif($status == "Obese"){
				$calories = 450;
			}
			elseif($status == "Severely Obese"){
				$calories = 400;
			}
		}
		elseif($Age>=6 && $Age<=11){
			if($status == "Severely Underweight"){
				$calories = 900;
			}
			elseif($status == "Underweight"){
				$calories = 800;
			}
			elseif($status == "Optimal"){
				$calories = 700;
			}
			elseif($status == "Overweight"){
				$calories = 620;
			}
			elseif($status == "Obese"){
				$calories = 550;
			}
			elseif($status == "Severely Obese"){
				$calories = 500;
			}
		}
		elseif($Age>=12 && $Age<=24){
			if($status == "Severely Underweight"){
				$calories = 1300;
			}
			elseif($status == "Underweight"){
				$calories = 1150;
			}
			elseif($status == "Optimal"){
				$calories = 1000;
			}
			elseif($status == "Overweight"){
				$calories = 900;
			}
			elseif($status == "Obese"){
				$calories = 820;
			}
			elseif($status == "Severely Obese"){
				$calories = 750;
			}
		}
		elseif($Age>24 && $Age<=60){
			if($status == "Severely Underweight"){
				$calories = 1600;
			}
			elseif($status == "Underweight"){
				$calories = 1500;
			}
			elseif($status == "Optimal"){
				$calories = 1400;
			}
			elseif($status == "Overweight"){
				$calories = 1320;
			}
			elseif($status == "Obese"){
				$calories = 1250;
			}
			elseif($status == "Severely Obese"){
				$calories = 1200;
			}
		}
	$child_information_reg= $conn->query("INSERT INTO child_information (Name,Age,Sex,Address,Height,Weight,Guardian,Status,Calories) VALUES ('$Name','$Age','$sex_input','$Address','$Height','$Weight','$Guardian','$status','$calories')");

		
					//ECHO THAT THE CHILD INFORMATION IS CREATED
					
				header("Location: child_information_table.php?Add_child_data=Success");

					
			}
}
		
?>

<form action="#" method="POST">

<div>
<label>Name:</label>
<input type="text" name="Name" placeholder="Enter Full Name" value = "" required>
</div>

<div>
<label>Age:</label>
<input type="number" name="Age" placeholder="Enter Age (Number of Months)" value = "" required>
</div>

<div>
<label>Sex:</label>
<select  name="Sex" >
									<option value="" disabled selected>Select Sex</option>
                                    <option name="Sex"  value="Male">Male</option>
                                    <option name="Sex"  value="Female">Female</option>
						
 </select required>
</div>

<div>
<label>Address:</label>
<select  name="Address" >
									<option value="" disabled selected>Select Location</option>
                                    <option name="Address"  value="Vellore">Vellore</option>
                                    <option name="Address"  value="Chennai">Chennai</option>
									<option name="Address"  value="Bengaluru">Bengaluru</option>
									<option name="Address"  value="Delhi">Delhi</option>
									<option name="Address"  value="Mumbai">Mumbai</option>
									<option name="Address"  value="Hyderabad">Hyderabad</option>
														
 </select required>

</div>

<div>
<label>Height:</label>
<input type="number" step=0.01 name="Height" placeholder="Enter Height (cm)" value = "" required>
</div>

<div>
<label>Weight:</label>
<input type="number" step=0.01 name="Weight" placeholder="Enter Weight (kg)" value = "" required>
</div>

<div>
<label>Guardian:</label>
<input type="text" name="Guardian" placeholder="Enter Guardian Name" value = "" required>
</div>


</div>

</div>
<div class="child_information_container">
<div class="child_information_submit">
<button  type="submit" name ="submit">Submit</button>
</div>
</div>

</form>


</div>

</div>
</div>

<!--FOOTER-->

<!--FOOTER ENDS HERE-->
</div>
<script>

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
	document.getElementById("mainfooter").style.marginLeft = "250px";


}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
	document.getElementById("mainfooter").style.marginLeft = "0";


}

/*
<!--



 
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

//-->


	var viewportwidth_min = 400;
	var viewportwidth_max = 800;
 
 
  var viewportheight_min = 400 ;
  var viewportheight_max = 800;
  
  
  if( viewportwidth_min <=  viewportwidth && viewportwidth <= viewportwidth_max && viewportheight_min <= viewportheight && viewportheight <= viewportheight_max) {
	  
	  
	  
	function openNav() {
    document.getElementById("mySidenav").style.width = "800px";
    document.getElementById("main").style.marginLeft = "800px";
	document.getElementById("mainfooter").style.marginLeft = "800px";
	

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
*/



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