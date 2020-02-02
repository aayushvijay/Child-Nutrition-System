<!DOCTYPE html>
<?php

include 'connect_to_database.php';

session_start();

	if(!isset($_SESSION['cns_user_username']))
			{
				header('location:index.php');
			}
			
			
	$User_Username = $_SESSION['cns_user_username'];
	
		if(isset($_GET['success'])){
		
							echo '<script>';
							echo 'alert("Child Information Succesfully Updated.")';
							echo '</script>';
							
	}
	
		if(isset($_GET['success_delete'])){
		
							echo '<script>';
							echo 'alert("Child Information Succesfully Deleted.")';
							echo '</script>';
							
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
	<link href="local_stylesheet/style_user.css" rel="stylesheet">
	<link href="fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet">
	<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<!--CSS LINKS ENDS HERE-->
	
	<!--TITLE-->
	<title>Table</title>
	<!--TITLE ENDS HERE-->
	
	<!--JQUERY-->
	<script src="jquery/jquery.js"> </script>
	<!--JQUERY ENDS HERE--

	
	
<!--HEAD STYLE, JAVASCRIPT, AND ETC-->	
<head>

<script>

	//EDIT
			function edit_child_information(id, user){
				if (confirm("Are you sure you want to edit?  '"+user + " '"))
				{
					
					window.location.href = 'edit_child_information.php?edit_user_account=' +id;
				}
			}
			
			
				
			//DELETE	
			function delete_child_information(id, user){
				if (confirm("Are you sure you want to delete  '" + user + "'"))
				{
				window.location.href = 'delete_child_information.php?delete_child_information=' + id;
					}	
				}


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
<li><span  class="fa fa-book "></span> <a href="#">About </a></li>
<li><span  class="fa fa-user "></span> <a href="user_profile.php">User Profile </a></li>
<li><span  class="fa fa-male "></span> <a href="child_information.php">Child Information</a></li>
<li class="active"><span  class="fa  fa-table "></span> <a href="child_information_table.php">Table</a></li>
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

<div class="cp_responsive_table">
	<!--TOP BAR USER NAME ENDS HERE-->


<div class="table_header">
<span>Child Information</span>
<div class="table_search">
<label>Search:</label>
<form method="GET">
<input type="text" name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; }?>">
</form>
</div>
</div>

<div class="table_container">
<table class="table" cellpadding="0" cellspacing="0" border="0">

<thead>
<tr>
<th>Name</th>
<th>Age</th>
<th>Sex</th>
<th>Address</th>
<th>Weight</th>
<th>Height</th>
<th>Guardian</th>
<th>Status</th>
<th>Calories to Intake</th>
<th>Optimal Calories</th>
<th>Important Nutrition Required</th>
<th> Edit / Delete</th>
</tr>
</thead>


<tbody cellpadding="0" cellspacing="0" border="0">



<?php

if(isset($_GET['search'])){
	
	$search_data =$_GET['search'];
	$search_final_data = $search_data;
	
	
	$result_per_page = 6;
	
	$show_child_information = $conn->prepare("SELECT * FROM user_account");
	$show_child_information  -> execute();
	
	$number_of_rows = $show_child_information -> rowcount();
	
	$number_of_pages = ceil($number_of_rows/$result_per_page);
	
	if(!isset($_GET['page'])){
		
		$page = 1;
		
	} else {
		
		$page = $_GET['page'];
		
	}
	
	$this_page_first_result = ($page-1)*$result_per_page;
	
	$show_child_information = $conn->query("SELECT * FROM child_information WHERE Name LIKE '%".$search_final_data."%'OR Age LIKE '%".$search_final_data."%' OR Sex LIKE '%".$search_final_data."%' OR Address LIKE '%".$search_final_data."%' OR Height LIKE '%".$search_final_data."%' OR Weight LIKE '%".$search_final_data."%' OR Guardian LIKE '%".$search_final_data."%' ORDER BY Name ASC LIMIT ".$this_page_first_result.','.$result_per_page);
	
	$count_result = $show_child_information -> rowCount();
	if(empty($count_result)){
		
		echo '<tr> 
		
		
		
				<td><p> No Result Found </p></td>
				
			</tr>';
			
			$number_of_pages = 1;
			
	}
	
	else {
		
		
		while($row=$show_child_information->fetch()){
		
			
		$child_Name = $row['Name'];
		$child_Age = $row ['Age'];
		$child_Sex = $row['Sex'];
		$child_Address = $row['Address'];
		$child_Height = $row['Height'];
		$child_Weight = $row['Weight'];
		$child_Guardian = $row['Guardian'];
		$bmi = $child_Weight / (($child_Height/100) * ($child_Height/100));
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
		
		$kg = 'kg';
		$cm = 'cm';
		$mo = 'mo.';
		
		echo '<tr>';
		
		echo '<td>'.$child_Name.'</td>';
		echo '<td>'.$child_Age.' '.$mo.'</td>';
		echo '<td>'.$child_Sex.'</td>';
		echo '<td>'.$child_Address.'</td>';
		echo '<td>'.$child_Weight.' '.$kg.'</td>';
		echo '<td>'.$child_Height. ' '.$cm.'</td>';
		echo '<td>'.$child_Guardian.'</td>';
		echo '<td>'.$status.'</td>';
		echo '<td>'.$calories.'</td>';
		echo '<td>'.$optimal.'</td>';
		echo '<td>'.$vitamins.'</td>';

		
		
		
	
		
		
?>



<td>
<!--EDIT BUTTON-->
<a href="javascript:edit_child_information('<?php echo $child_IDNumber;?>', '<?php echo $child_Name;?>')">
<button class="blue_button"><span class="fa fa-pencil "></span></button>
</a>

<a href="javascript:delete_child_information('<?php echo $child_IDNumber;?>', '<?php echo $child_Name;?>')">
<button class="red_button"><span class="fa fa-trash-o"></span></button> 
</a>
</td>

<?php
unset($_POST['page']);
?>

</tr>

<?php

		
		}
	}
	
	

	
	

?>

<?php } else {
	
	$result_per_page = 6;
	$show_child_information = $conn->prepare("SELECT *FROM child_information");
	
	$show_child_information -> execute();
	
	$number_of_rows = $show_child_information -> rowcount();
	
	$number_of_pages = ceil($number_of_rows/$result_per_page);
	
	if(!isset($_GET['page'])){
		
		$page = 1;
	
	} else {
		
		$page = $_GET['page'];
	}
	
	$this_page_first_result = ($page-1) * $result_per_page;
	
	$show_child_information = $conn->query("SELECT *FROM child_information ORDER BY Height ASC  LIMIT ".$this_page_first_result.','.$result_per_page);
	
	$count_child_information = $show_child_information ->rowCount();
	
	if(empty($count_child_information)){
		
					echo '<tr>
					
					
					
					
							<td><p> No Data Entered </p></td>
							
					</tr>';
					
						$number_of_pages = 1;
						
	}else {
			
		while($row=$show_child_information->fetch()) {
				
				
	
		$child_Name = $row['Name'];
		$child_Age = $row ['Age'];
		$child_Sex = $row['Sex'];
		$child_Address = $row['Address'];
		$child_Height = $row['Height'];
		$child_Weight = $row['Weight'];
		$child_Guardian = $row['Guardian'];
				$bmi = $child_Weight / (($child_Height/100) * ($child_Height/100));

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
		if($child_Age>0 && $child_Age<=5){
			$optimal = 500;
			if($status == "Severely Underweight"){
				$calories = 700;
				$vitamins = "Only Breast Milk";
			}
			elseif($status == "Underweight"){
				$calories = 620;
				$vitamins = "Only Breast Milk";
			}
			elseif($status == "Optimal"){
				$vitamins = "Only Breast Milk";
				$calories = 550;
			}
			elseif($status == "Overweight"){
				$calories = 500;
				$vitamins = "Only Breast Milk";

			}
			elseif($status == "Obese"){
				$calories = 450;
				$vitamins = "Only Breast Milk";

			}
			elseif($status == "Severely Obese"){
				$calories = 400;
				$vitamins = "Only Breast Milk";

			}
		}
		elseif($child_Age>=6 && $child_Age<=11){
			$optimal = 700;
			if($status == "Severely Underweight"){
				$calories = 900;
				$vitamins = "Channa Dal + Rotini";

			}
			elseif($status == "Underweight"){
				$calories = 800;
				$vitamins = "Yogurt + Brown Rice";

			}
			elseif($status == "Optimal"){
				$calories = 700;
				$vitamins = "White Rice + Milk + Spinach";

			}
			elseif($status == "Overweight"){
				$calories = 620;
				$vitamins = "White Rice + Chicken Wing";
			}
			elseif($status == "Obese"){
				$calories = 550;
				$vitamins = "Spinach + Raw Paneer";
			}
			elseif($status == "Severely Obese"){
				$calories = 500;
				$vitamins = "Bread";
			}
		}
		elseif($child_Age>=12 && $child_Age<=24){
			$optimal = 1000;
			if($status == "Severely Underweight"){
				$calories = 1300;
				$vitamins = "Brown Rice + Channa Dal + Chicken Breast";

			}
			elseif($status == "Underweight"){
				$vitamins = "Chocolate Bar + Cashew + Yogurt";
				$calories = 1150;
			}
			elseif($status == "Optimal"){
				$calories = 1000;
				$vitamins = "White Rice + Milk + Spinach Dal";

			}
			elseif($status == "Overweight"){
				$vitamins = "Chicken Wing + Bread + Banana";
				$calories = 900;
			}
			elseif($status == "Obese"){
				$calories = 820;
				$vitamins = "Milk + Spinach + Apple";

			}
			elseif($status == "Severely Obese"){
				$vitamins = "Celery Baked + Chicken Breast + Jute";

				$calories = 750;
			}
		}
		elseif($child_Age>24 && $child_Age<=60){
			$optimal = 1400;
			if($status == "Severely Underweight"){

				$vitamins = "Brown Rice + Channa Dal + Milk + Chocolate Bar";
				$calories = 1600;
			}
			elseif($status == "Underweight"){
				$vitamins = "Walnuts + Rotini + Paneer Raw + Banana";

				$calories = 1500;
			}
			elseif($status == "Optimal"){
				$vitamins = "White Rice + Spinach Dal + Cashew + Yogurt + Celery Raw";

				$calories = 1400;
			}
			elseif($status == "Overweight"){
				$vitamins = "Spinach + Chicken Wing + Banana + Apple";

				$calories = 1320;
			}
			elseif($status == "Obese"){
				$vitamins = "Bread + Paneer Raw + Spinach Dal";

				$calories = 1250;
			}
			elseif($status == "Severely Obese"){
				$vitamins = "Apple + Celery Raw + Chicken Breast + Jute";

				$calories = 1200;
			}
		}
		
		$kg = 'kg';
		$cm = 'cm';
		$mo = 'mo.';
		
		
		
		
		
		echo '<tr>';
		
		echo '<td>'.$child_Name.'</td>';
		echo '<td>'.$child_Age.' '.$mo.'</td>';
		echo '<td>'.$child_Sex.'</td>';
		echo '<td>'.$child_Address.'</td>';
		echo '<td>'.$child_Weight.' '.$kg.'</td>';
		echo '<td>'.$child_Height. ' '.$cm.'</td>';
		echo '<td>'.$child_Guardian.'</td>';
				echo '<td>'.$status.'</td>';
				echo '<td>'.$calories.'</td>';
echo '<td>'.$optimal.'</td>';
echo '<td>'.$vitamins.'</td>';

		
		
	
		
		
?>

<td>
<!--EDIT BUTTON-->
<a href="javascript:edit_child_information('<?php echo $child_Name;?>', '<?php echo $child_Name;?>')">
<button class="blue_button"><span class="fa fa-pencil "></span></button>
</a>

<a href="javascript:delete_child_information('<?php echo $child_Name;?>', '<?php echo $child_Name;?>')">
<button class="red_button"><span class="fa fa-trash-o"></span></button> 
</a>
</td>

<?php
unset($_POST['page']);
?>

</tr>

<?php 
			}
			
		}
		
}
?>






































</tbody>
</table>
</div>



<!--PAGINATION----------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="table_pagination_container">

<div class="table_page">
<?php
echo 'Page'.' '.$page.' '.'of'.' '.$number_of_pages;

?>
</div>

<div class="table_pagination">

<?php

// If the page have no value set it to 1
if(!isset($_GET['page'])) {			
$current_page = 1;
}
// Else if page have value get the value 
else {
				
$current_page = $_GET['page'];

}


// If current_page is less than or equal to 1 set curent_page to 1
if($current_page <=1 ) {
	
	$current_page = 1;
	
}
// Else if current_page is 
else {
	
	$current_page--;
	
}



	  echo '<a href="child_information_table.php?page='.($current_page).'">'.'Previous'.'</a>';


 ?>
 
 <?php 

 if(!isset($_GET['page']))
 {
	 
	$_GET['page']=1;
 }else{
	 
	 	$_GET['page'];
 }

 
 $limit = 5;
 


 for($i = max(1, $page - 3); $i<=min($page + 1, $number_of_pages); $i++) {
	 
  if($_GET['page'] == $i){
		 
		 $activeClass='active' ;
		 
	 }
	 
	 else{
		 $activeClass='' ;
	 }

	

 
	 
  echo '<li class='.$activeClass.'>'.'<a  href="child_information_table.php? page='.$i.'">'.$i.'</a>'.'</li>';
  


  
 }

 

 ?>

 
 <?php
 
 
if(!isset($_GET['page'])) {
				
				$current_page = 1;
				
			} else {
				
				$current_page = $_GET['page'];
				
}


if($current_page >= $number_of_pages) {
	
	$current_page = $number_of_pages;
	
}else {
	
	$current_page++;
	
}

	

	
  echo '<a href="child_information_table.php? page='.($current_page).'">'.'Next'.'</a>';
  

 ?>
</div>


</div>


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