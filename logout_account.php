<!--FOR LOGOUT SESSIONS-->
<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<?php

//destroy sessions

if(isset($_SESSION['cns_admin_username'])){
	
	unset($_SESSION['cns_admin_username']);
	header('location:index_admin.php');
}
else if (isset($_SESSION['cns_user_username'])){
	
	unset($_SESSION['cns_user_username']);
	header('location:index.php');
}else if (isset($_SESSION['guest_user'])){
	

	unset($_SESSION['guest_user']);
	header('location:index.php');
}




?>
</body>
</html>
