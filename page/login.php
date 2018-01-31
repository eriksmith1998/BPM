<!-- LOGIN_CONTROLE.PHP

ERIK SMITH

FUNCTIES:
- Er wordt een sessie gestart
- Database connectie bestand wordt geinclude 
- Controle of de pagina correct is aangeroepen
- Controle gebruikersnaam en wachtwoord
- Controle geslaagd? -> ingelogd.

-->

<?php

include ('inc/db_connect.php');


if (!empty($_POST)){
	
	$emailadres = mysqli_real_escape_string($db, $_POST['emailadres']);
	$wachtwoord = mysqli_real_escape_string($db, $_POST['wachtwoord']);
	$query = 	"SELECT * FROM gebruikers
				WHERE Email ='" . $_POST["emailadres"] ."'
				AND Wachtwoord='" . $_POST["wachtwoord"] ."'"; 
	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error()); 
	
	if (mysqli_num_rows($result) > 0){
				$_SESSION["auth"]=true;
				$_SESSION["timeout"]=time() + 120; 
				$_SESSION["emailadres"]=$emailadres;
				
		while($row = mysqli_fetch_assoc($result)) {
		echo "Je bent nu ingelogd als: ". $row['Naam'];
		$_SESSION["naam"] = $row['Naam'];
		$_SESSION["tussenvoegsel"] = $row['tussenvoegsel'] ;
		$_SESSION["achternaam"] = $row['achternaam'];
		$_SESSION["admin"] = $row['admin'];
		
		header('Location:?page=home');
	}
	
}else{
  	echo "Opgegeven gebruikersnaam en/of wachtwoord incorrect";
			
		}
}else{
	
}
?>
