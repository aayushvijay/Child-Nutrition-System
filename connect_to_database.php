
<!--CONNECT TO CHILD NUTRITION MONITORING SYSTEM DATABASE -->
<?php
	try{
	$conn = new PDO("mysql:host=localhost; dbname=child_nutrition_system", 'root', '');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	}catch(PDOException $MEMES)
	{
		echo "Error".$MEMES->getMessage();
	}
	
	?>