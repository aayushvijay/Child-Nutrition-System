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
	<title>About</title>
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
<li class="active"><span  class="fa fa-book "></span> <a href="about.php">About </a></li>
<li><span  class="fa fa-user "></span> <a href="user_profile.php">User Profile </a></li>
<li><span  class="fa fa-male "></span> <a href="child_information.php">Child Information</a></li>
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


<div class="about_container1">
<div class="about_content1">


<h2>About</h2>

<p> Chettinad has chain of hospitals across the country. One of them is in the VIT Campus. We as the students of VIT UNIVERSITY have created this portal for the doctors to analyse the child nutrition of the patients coming to their hospital across the country. </p>




<h2>Location :</h2>
<p>The Healthcare Centre in the university is located in the A.L. Mudaliar block. It is a fully equipped facility, currently run by the Chettinad Medical Group. It caters to any student’s medical needs 24X7.
The healthcare facility is available round the clock at the VIT Health Centre. With 6453 sq. ft. space in the first floor & 1511 sq. ft. in the health centre annexe (Ground floor) of AL Mudalaiyar Block.
Aid Centers both at Men’s and Women’s hostel are functioning around the clock.</p>




 <br>

 <p>18 In-patient beds<br>
4 Observation beds<br>
5 Consultation rooms<br>
Pharmacy<br>
5 Full-time doctors and 2 part time doctors<br>
10 Staff nurses<br>

4 Hospital workers<br>
10 Specialist and physiotherapy services<br>
ECG machine<br>
1 Health assistant<br>
1 Male nursing assistant<br>
1 Pharmacist<br>
2 Lab technicians<br>
1 Assistant<br>
1 DEO<br>
Pulse oximeter<br>
3 Ambulances</p>




</div>
</div>









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

 
 /* document.write(viewportwidth + ' ' + viewportheight);*/

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