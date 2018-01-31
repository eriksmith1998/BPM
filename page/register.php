<!-- REGISTER.PHP

FUNCTIES:
- Kunnen registreren van een account
- Zorgen dat de gegevens van de gebruiker in de database komen

-->

<?php
	include 'inc/db_connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) 
  { 
	
		$error_msg = "";
       	$naam = mysqli_real_escape_string($db, $_POST['naam']);
		$tussenvoegsel = mysqli_real_escape_string($db, $_POST['tv']);
		$achternaam = mysqli_real_escape_string($db, $_POST['achternaam']);
		$email = mysqli_real_escape_string($db, $_POST['emailadres']);
		$wachtwoord = mysqli_real_escape_string($db,$_POST['wachtwoord']);
		$postcode = mysqli_real_escape_string($db, $_POST['postcode']);
		$woonplaats = mysqli_real_escape_string($db, $_POST['woonplaats']);
		$straat = mysqli_real_escape_string($db, $_POST['straat']);
		$straatnummer = mysqli_real_escape_string($db, $_POST['huisnummer']);
		$toevoegsel = mysqli_real_escape_string($db, $_POST['toevoeging']);
		$admin = 0;
		
       	
 
       
	 // if (!preg_match("/^[a-zA-Z ]*$/",$naam)) {
      if(!preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$/",$email)){
      		$error_msg.="<li>Vul een geldig e-mail adres in.</li>";
      	}
      	
      	$query1 = "SELECT * FROM gebruiker WHERE emailadres ='$email';";
		$result1 = mysqli_query($db, $query1) or die ("FOUT: " . mysqli_error());
		if (mysqli_num_rows($result1) > 0) {
		// e-mailadres al aanwezig in de database, foutmelding tonen
		$error_msg.="<li>Het emailadres is al in gebruik.</li>";	
	}
       	if(strlen($error_msg)>0){
       		//Een van de velden is niet juist ingevuld
       	echo ("<p>Om de volgende reden kan uw vraag helaas niet worden verwerkt:<p><ul>");
       	echo $error_msg;
       	echo "</ul><p>Klik op <a href=\"javascript:history.back(1)\">terug</a> en vul alle velden juist in.</p><br/>"; 
    } 
       else 
          { 
		$query = ("INSERT INTO gebruiker (naam, tussenvoegsel, achternaam, emailadres, wachtwoord, postcode, woonplaats, straat, straatnummer, toevoegsel, admin)
		VALUES('$naam','$tussenvoegsel','$achternaam','$email', '$wachtwoord', '$postcode', '$woonplaats', '$straat', '$straatnummer', '$toevoegsel', '$admin')") or die (mysqli_error());
		$result = mysqli_query($db, $query);
		echo("Uw account is aangemaakt!");
		
	}
}
?>
	
	
	
	
	
	