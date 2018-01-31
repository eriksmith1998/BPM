<!-- FORM_REGISTER.PHP

FUNCTIES:
- Account aan kunnen maken
- Gegevens worden in de database gezet
- Per 'Categorie' ingedeeld d.m.v. fieldset

-->

<?php 

	if(isset($_SESSION['naam'])){
	echo "Je hebt al een account en je bent ingelogd als: ". $_SESSION["naam"]." ". $_SESSION["tussenvoegsel"]. " ". $_SESSION["achternaam"] ;
	}else{ 
	
	?>
<div class="col-lg-9">
	<div class="card card-outline-secondary my-4">
				<div class="card-header">
				  Contact Pagina
				</div>
				<div class="card-body">
				 

	<form method="post" action="?page=register">
	<fieldset>
		<legend>Persoonlijke informatie: </legend>
		<table>
			<tr><td>Naam:*</td><td>			<input name="naam" type="text" size="40" maxlength="20" required></td></tr>
			<tr><td>Tussenvoegsel:</td><td><input name="tv" type="text" size="40" maxlength="5" ></td></tr>
			<tr><td>Achternaam:*</td><td>	<input name="achternaam" type="text" size="40" maxlength="20" required></td></tr>
			<tr><td>Postcode*</td><td>		<input name="postcode" type="text" size="40" placeholder="9999AA" maxlength="6" required></td></tr>
			<tr><td>Woonplaats:*</td><td>	<input name="woonplaats" type="text" size="40" maxlength="25" required></td></tr>
			<tr><td>Straat:*</td><td>		<input name="straat" type="text" size="40" maxlength="25" required></td></tr>
			<tr><td>Huisnummer:*</td><td>	<input name="huisnummer" type="number" size="40" maxlength="6" required></td></tr>
			<tr><td>Toevoeging:</td><td>	<input name="toevoeging" type="text" size="40" maxlength="3" ></td></tr>
		</table>
	</fieldset>	
	<fieldset>
		<table>
			<legend>Accountgegevens:</legend>
			<tr><td>Emailadres:*</td><td>	<input name="emailadres" type="text" placeholder="voorbeeld@voorbeeld.com" size="40" maxlength="40" required></td></tr>
			<tr><td>Wachtwoord:*</td><td>	<input name="wachtwoord" type="password"  size="40" maxlength="20" required></td></tr>
			
		</table>
	</fieldset>	
	<br>


		<input type="submit" name="submit" value="Registreren">
		<input name="reset" type="reset" value="Leegmaken">
	</form>

				</div>
	</div>
</div>	
<?php 
}

?>