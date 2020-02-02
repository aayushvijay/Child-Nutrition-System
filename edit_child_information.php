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
	<title>Edit Child Information</title>
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



?>

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
<li><span  class="fa fa-book "></span> <a href="#">About </a></li>
<li><span  class="fa fa-user "></span> <a href="user_profile.php">User Profile </a></li>
<li class="active"><span  class="fa fa-male "></span> <a href="child_information.php">Child Information</a></li>
<li><span  class="fa  fa-table "></span> <a href="child_information_table.php">Table</a></li>
<li><span  class="fa fa-map-marker "></span> <a href="spotmap.php">Spot Map </a></li>
<li><span  class="fa fa-pie-chart "></span> <a href="chart.php">Chart </a></li>
<li><span  class="fas fa-file-pdf"></span> <a href="test.php" target="_blank">Table (PDF)</a></li>

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

<?php

if(isset($_GET['edit_user_account'])){
		
		$user_id = $_GET['edit_user_account'];
		
	}

		
		global $edit1_user_account;
		$edit1_user_account = 0;
		if(isset($_POST['submit'])){
			
		$edit1_user_account=1;
		
					$Name = $_POST['Name'];
					$Age  = $_POST['Age'];
					$Sex  = $_POST['Sex'];
					$Address  = $_POST['Address'];
					$Height = $_POST['Height'];
					$Weight = $_POST['Weight'];
					$Guardian = $_POST['Guardian'];
		
		
							//INSERT THE DATA FROM FROM TO DATABASE
							$update_child_information = $conn->query("UPDATE child_information SET Name='$Name' WHERE IDNumber = $user_id");
							$update_child_information = $conn->query("UPDATE child_information SET Age='$Age' WHERE IDNumber = $user_id");
							$update_child_information = $conn->query("UPDATE child_information SET Sex='$Sex' WHERE IDNumber = $user_id");
							$update_child_information = $conn->query("UPDATE child_information SET Address='$Address' WHERE IDNumber = $user_id");
							$update_child_information = $conn->query("UPDATE child_information SET Height='$Height' WHERE IDNumber = $user_id");
							$update_child_information = $conn->query("UPDATE child_information SET Weight='$Weight' WHERE IDNumber = $user_id");
							$update_child_information = $conn->query("UPDATE child_information SET Guardian='$Guardian' WHERE IDNumber = $user_id");
						
							
							
							header('Location:child_information_table.php?success=1');

	}
	
	
?>

	<!--TOP BAR USER NAME ENDS HERE-->


<div class="child_information_container">

<span>Enter Child Information</span>


<div class="child_information_content">

<div class="child_information_input">



<form action="#" method="POST">

<?php $child_information = $conn->query("SELECT *FROM child_information WHERE Name = $Name");
 while ($row=$child_information->fetch()) {
	 
	
		$child_Name = $row['Name'];
		$child_Age = $row ['Age'];
		$child_Sex = $row['Sex'];
		$child_Address = $row['Address'];
		$child_Height = $row['Height'];
		$child_Weight = $row['Weight'];
		$child_Guardian = $row['Guardian'];
		
 }
	
?>

<div>
<label>Name:</label>
<input type="text" name="Name" placeholder="Enter Full Name" value = "<?php echo $child_Name ?> " required>
</div>

<div>
<label>Age:</label>
<input type="text" name="Age" placeholder="Enter Age (Number of Months)" value = "<?php echo $child_Age?> " required>
</div>

<div>
<label>Sex:</label>
<select  name="Sex" >
									<option name = "Sex" value = "<?php echo $child_Sex?> "><?php echo $child_Sex?></option>
                                    <option name="Sex"   value="Male">Male</option>
                                    <option name="Sex"   value="Female">Female</option>
						
 </select required>
</div>

<div>
<label>Address:</label>
<input type="text" name="Address" placeholder="Enter Address" value = "<?php echo $child_Address?> "  required>
</div>

<div>
<label>Height:</label>
<input type="number" name="Height" placeholder="Enter Height (cm)" value = "<?php echo $child_Height?>" required>
</div>

<div>
<label>Weight:</label>
<input type="number" name="Weight" placeholder="Enter Weight (kg)" value = "<?php echo $child_Weight?>"  required>
</div>

<div>
<label>Guardian:</label>
<input type="text" name="Guardian" placeholder="Enter Guardian Name" value = "<?php echo $child_Guardian?>"  required>
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




<!--FOOTER-->
<div id="mainfooter" class="fotter_user">
 <center>&copy; 2018 Child Nutrition System</center>
</div>
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


<!--

/*

 
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


	var viewportwidth_min = 523;
	var viewportwidth_max = 800;
 
 
  var viewportheight_min = 600 ;
  var viewportheight_max = 800;
  
  
  if( viewportwidth_min <=  viewportwidth && viewportwidth <= viewportwidth_max && viewportheight_min <= viewportheight && viewportheight <= viewportheight_max) {
	  
	  
	  
	function openNav() {
    document.getElementById("mySidenav").style.width = "525px";
    document.getElementById("main").style.marginLeft = "525px";
	document.getElementById("mainfooter").style.marginLeft = "525px";
	

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
</script>
</body>
</html>