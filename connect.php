<?php  
try {
$conn = new PDO('mysql:host=localhost; dbname=u519097_portfolio',"u519097_root" ,"Zgvo5l89");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOExpeption $e){
	echo "error: " .$e->getMessage();
}


?>