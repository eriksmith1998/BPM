<!-- FORGOTPASS.PHP

FUNCTIES:
- Emailadres in kunnen vullen
- Wachtwoord emailen

-->

<?php
if (!empty($_POST)){
	// databaseverbinding invoegen
	include("inc/db_connect.php");
	
	$email1 = mysqli_real_escape_string($db, $_POST['email']);
	
	// query samenstellen en uitvoeren
	$query = "SELECT * FROM gebruiker WHERE emailadres='$email1';";
	$result = mysqli_query($db, $query) or die("FOUT : " . mysql_error()); 
	
	// controleren of mail-adres is gevonden
	if (mysqli_num_rows($result) > 0){
		// JA: variabelen toekennen
		while($row = mysqli_fetch_assoc($result)){
			
			$email = $row['emailadres'];
			$wachtwoord = $row['wachtwoord'];
		}
		
		// rest van het bericht opstellen, inclusief extra header
		$ontvanger = $email;
		$onderwerp = "Uw wachtwoord";
		$msg = "Hallo, u hebt verzocht om toezending van uw wachtwoord en gebruikersnaam\n\n";
		$msg .= "Uw email is: " . $email;
		$msg .= "\nUw wachtwoord is: " . $wachtwoord;
		$msg.="\n\nHet bericht is op " . date("d.m.Y") . " om " . date("H:i") . "u verzonden.\n";
       	$msg.="\n\nMet vriendelijke groet,\n\nDe Webmaster\n\n";
       	$msg.=" ---- Einde van het automatisch gegenereerde bericht----";
		$extra = "X-MAILER: PHP/versie " .phpversion();
		
	ini_set("SMTP","smtp.strato.com");
	ini_set("smtp_port","465");
	ini_set("sendmail_from","erik@smithcomputerdiensten.nl");
  
    
		// bericht verzenden en eventueel foutboodschap tonen
		if (!mail($ontvanger, $onderwerp, $msg, $extra)){
			$tekst = "Er is helaas een fout opgetreden bij het verzenden van email";
			echo($tekst);
		}else{
		$tekst = "Uw wachtwoord is verzonden. 
				Terug naar het <a href=\"?page=home\">inloggen</a>";
			echo($tekst);
		}
		
	}else{
		// NEE, email-adres niet gevonden: foutmelding tonen
		$tekst = "Dit e-mailadres (<b>". $_POST["email"] . "</b>) komt
			 niet voor in de database<br>\n
			<a href=\"?page=forgotpass\">Ander e-mailadres</a>";
		echo ($tekst);
	}
	
 //Indien pagina zichzelf niet heeft aangeroepen: HTML-formulier tonen
}else{
?>



<form method="post" action="?page=forgotpass">
Uw e-mailadres: 
<input type="Text" name="email" size="30"><br>
<input type="Submit" value="E-mail mijn wachtwoord!">
</form>
<?php
} //else-blok afsluiten

?>
