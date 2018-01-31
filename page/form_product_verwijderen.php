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


	<form method="post" action="?page=product_verwijderen">
	<fieldset>
		<legend>Product verwijderen: </legend>
		<table>

			<tr><td>Naam:</td><td>			<input name="naam" type="text" size="40" maxlength="30" ></td></tr>

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
