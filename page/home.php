<!-- HOME.PHP

FUNCTIES:
- Weergeven van de producten
- Mogelijk om te filteren via de sidebarcategorie�n.

-->
<?php
include 'inc/db_connect.php';

 

	if(isset($_GET['categorie'])){
	$query = 	"SELECT * FROM producten WHERE catogorie_idcatogorie = '" . $_GET["categorie"] ."';";
	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error()); 
	}else {
	$query = 	"SELECT * FROM producten";
	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());	
	}
	
	
	
	?>






 
