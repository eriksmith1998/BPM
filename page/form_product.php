

<!-- form_product.PHP

FUNCTIES:
- Product in database zetten
- Per 'Categorie' ingedeeld d.m.v. fieldset

-->

<?php

	if(isset($_SESSION[''])){
	echo "Er is al een product genaamd: ". $_SESSION["productnaam"] ;
	}else{

	?>
<div class="col-lg-9">
	<div class="card card-outline-secondary my-4">
				<div class="card-header">
				  Contact Pagina
				</div>
				<div class="card-body">


	<form method="post" action="?page=product_toevoegen">
	<fieldset>
		<legend>Persoonlijke informatie: </legend>
		<table>
			<tr><td>Productcode</td><td>			<input name="idproducten" type="number" size="40" maxlength="20" ></td></tr>
			<tr><td>Productnaam:</td><td>			<input name="naam" type="text" size="40" maxlength="20" ></td></tr>
			<tr><td>Afbeelding:</td><td> <input name="afbeelding" type="text" size="40" maxlength="12" ></td></tr>
			<tr><td>Omschrijving:</td><td>	<input name="omschrijving" type="text" size="40" maxlength="20" </td></tr>
			<tr><td>Specificatie</td><td>		<input name="specificaties" type="text" size="40" maxlength="6"></td></tr>
			<tr><td>Prijs</td><td>	<input name="prijs" type="text" size="40" maxlength="25" ></td></tr>
			<tr><td>Hoeveelheid</td><td>		<input name="hoeveelheid" type="text" size="40" maxlength="25"></td></tr>
		</table>
	</fieldset>

	<br>


		<input type="submit" name="submit" value="Uploaden">
		<input name="reset" type="reset" value="Leegmaken">
	</form>

				</div>
	</div>
</div>
<?php
}

?>
?>
