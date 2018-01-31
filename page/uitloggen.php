<!-- UITLOGGEN.PHP

FUNCTIES:
- Session variabelen vrijgeven
- Session sluiten
- Doorsturen naar de homepagina.

-->

<?php 

session_unset(); // alle variabelen vrijgeven
session_destroy(); // sessie afsluiten
// Now remove Cookie (Start new session)
//setcookie(session_name());

header('Location:?page=home');
?>