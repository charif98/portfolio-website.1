<?php

include ("connect.php");


 if(isset($_POST['submit']) && isset($_POST['gebruikersnaam']) && isset($_POST['wachtwoord'])){ 

 	$gebruikersnaam = $_POST['gebruikersnaam'];
 	$wachtwoord = $_POST['wachtwoord'];
 	$roles_id = 2; //rollen_id van bezoeker

 	$gebruikersnaam = filter_var($gebruikersnaam,
 		FILTER_SANITIZE_STRING);
 	$wachtwoord = filter_var($wachtwoord,
 		FILTER_SANITIZE_STRING);
	// anti hack filter

 	$query = $conn->prepare("INSERT INTO `users` (gebruikersnaam,wachtwoord,roles_id) VALUES (:gebruikersnaam, :wachtwoord, :roles_id')");

 	$query->execute(array('gebruikersnaam' => $gebruikersnaam,
		'wachtwoord' => $wachtwoord, 'roles_id' => $roles_id));

 	if($query){
 		echo "gelukt";
 	} else {
 		echo "nope";
 	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>registeer</title>
</head>
<body>

<form action="" method="POST">
<label for="gebruikersnaam">gebruikersnaam</label>
<input type="text" id="gebruikersnaam" name="gebruikersnaam"> 
	<br/> 
	<label for="wachtwoord">wachtwoord</label>
	<input type="password" id="wachtwoord" name="wachtwoord" placeholder="een wachtwoord">
	<br/>
	<input type="submit" name="submit" value="registeren">
</form>


</body>
</html>