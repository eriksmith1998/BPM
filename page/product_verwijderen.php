<!-- product_aanpassen.PHP

FUNCTIES:
- Zorgen dat de gegevens van producten veranderen

-->

<?php

include 'inc/db_connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST))
{

  $error_msg = "";
  $naam = mysqli_real_escape_string($db, $_POST['naam']);

        {
        $query = "DELETE FROM producten WHERE naam='$naam'";

        $result = mysqli_query($db, $query);
        echo("Uw product is verwijderd!");

}
}
?>
