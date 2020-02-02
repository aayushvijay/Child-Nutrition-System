<!--FOR UPDATE SESSIONS-->
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
	header('location:index_admin.php?update_admin_sucess=1');
}






?>
</body>
</html>
