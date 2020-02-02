<?php

include 'connect_to_database.php';

session_start();

	if(!isset($_SESSION['cns_user_username']))
			{
				header('location:index.php');
			}





if(isset($_GET['delete_child_information'])){
		$checker = $_GET['delete_child_information'];
		
		$conn->query("DELETE FROM child_information WHERE Name='$Username'");
		
		header('Location:child_information_table.php?success_delete=1');
	
}
	
?>
