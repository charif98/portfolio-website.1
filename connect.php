<?php  
try {
$conn = new PDO('mysql:host=localhost; dbname=xxxxx',"xxxxx" ,"xxxxx");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOExpeption $e){
	echo "error: " .$e->getMessage();
}


?>
