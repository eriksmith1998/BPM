<!-- FORM_REGISTER.PHP

FUNCTIES:
- Account aan kunnen maken
- Gegevens worden in de database gezet
- Per 'Categorie' ingedeeld d.m.v. fieldset

-->

<?php

	if($_SESSION['admin'] == 0){
	echo "je hebt hier geen rechten voor" ;
	}else{

	?>
<div class="col-lg-9">
	<div class="card card-outline-secondary my-4">
				<div class="card-header">
				  Contact Pagina
				</div>
				<div class="card-body">


	<form method="post" action="?page=product_aanpassen">
	<fieldset>
		<legend>Product informatie: </legend>
		<table>
			<tr><td>idproducten:</td><td>			<input name="idproducten" type="text" size="40" maxlength="3" ></td></tr>
			<tr><td>Naam:</td><td>			<input name="naam" type="text" size="40" maxlength="30" ></td></tr>
			<tr><td>afbeelding:</td><td><input name="afbeelding" type="text" size="40" maxlength="30" ></td></tr>
			<tr><td>omschrijving:</td><td>	<input name="omschrijving" type="text" size="40" maxlength="200" ></td></tr>
			<tr><td>specificaties</td><td>		<input name="specificaties" type="text" size="40" maxlength="100" ></td></tr>
			<tr><td>prijs:</td><td>	<input name="prijs" type="text" size="40" maxlength="10" ></td></tr>
			<tr><td>hoeveelheid:</td><td>		<input name="hoeveelheid" type="text" size="40" maxlength="4" ></td></tr>
		</table>
	</fieldset>

	<br>


		<input type="submit" name="submit" value="Aanpassen">
		<input name="reset" type="reset" value="Leegmaken">
	</form>

				</div>
	</div>
</div>
<?php
}

?>
