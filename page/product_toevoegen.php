<!-- REGISTER.PHP

FUNCTIES:
- Kunnen registreren van een account
- Zorgen dat de gegevens van de producten in de database komen

-->

<?php
	include 'inc/db_connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) 
  { 
	
		$error_msg = "";
		$productid = mysqli_real_escape_string($db, $_POST['idproducten']);
       	$productnaam = mysqli_real_escape_string($db, $_POST['naam']);
		$afbeelding = mysqli_real_escape_string($db, $_POST['afbeelding']);
		$omschrijving = mysqli_real_escape_string($db, $_POST['omschrijving']);
		$specificatie = mysqli_real_escape_string($db, $_POST['specificaties']);
		$prijs = mysqli_real_escape_string($db,$_POST['prijs']);
		$hoeveelheid = mysqli_real_escape_string($db, $_POST['hoeveelheid']);
		
		
       	
 
       
	
      	
      	$query1 = "SELECT * FROM producten WHERE naam ='$productnaam';";
		$result1 = mysqli_query($db, $query1) or die ("FOUT: " . mysqli_error());
		if (mysqli_num_rows($result1) > 0) {
		// e-mailadres al aanwezig in de database, foutmelding tonen
		$error_msg.="<li>De productnaam is al in gebruik.</li>";	
	}
       	if(strlen($error_msg)>0){
       		//Een van de velden is niet juist ingevuld
       	echo ("<p>Om de volgende reden kan uw vraag helaas niet worden verwerkt:<p><ul>");
       	echo $error_msg;
       	echo "</ul><p>Klik op <a href=\"javascript:history.back(1)\">terug</a> en vul alle velden juist in.</p><br/>"; 
    } 
       else 
          { 
		$query = ("INSERT INTO producten (idproducten, naam, afbeelding, omschrijving, specificaties, prijs, hoeveelheid, catogorie_idcatogorie, bestelling_idbestelling)
		VALUES('$productid','$productnaam','$afbeelding','$omschrijving','$specificatie', '$prijs','$hoeveelheid', '1', '1')") or die (mysqli_error());
		$result = mysqli_query($db, $query);
		echo("Product is toegevoegd!");
		
		
	}
}
?>
	
	
	
	
	
	