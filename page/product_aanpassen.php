<!-- product_aanpassen.PHP

FUNCTIES:
- Zorgen dat de gegevens van producten veranderen

-->

<?php
	include 'inc/db_connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST))
  {

		$error_msg = "";
		$idproducten = mysqli_real_escape_string($db, $_POST['idproducten']);
    $naam = mysqli_real_escape_string($db, $_POST['naam']);
		$afbeelding = mysqli_real_escape_string($db, $_POST['afbeelding']);
		$omschrijving = mysqli_real_escape_string($db, $_POST['omschrijving']);
		$specificaties = mysqli_real_escape_string($db, $_POST['specificaties']);
		$prijs = mysqli_real_escape_string($db,$_POST['prijs']);
		$hoeveelheid = mysqli_real_escape_string($db, $_POST['hoeveelheid']);

		if(!preg_match("/^[0-9]$/",$idproducten)){
				$error_msg.="<li>Vul een geldig id in.</li>";
			}

			else

          {
					$query = "UPDATE producten SET naam = '$naam', afbeelding = '$afbeelding' omschrijving= '$omschrijving', specificaties = '$specificaties', prijs = '$prijs', hoeveelheid = '$hoeveelheid' WHERE idproducten = '$idproducten'";

					$result = mysqli_query($db, $query);
					echo("Uw product is veranderd!");

	}
}
?>
