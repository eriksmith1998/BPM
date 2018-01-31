<?php
if (isset($_SESSION["winkelwagen"])){
	
}

$winkelwagen = array();
$productenquery = "SELECT * FROM producten WHERE idproducten = '" . $_POST["hidden_id"] ."';";
$productenresultaat = mysqli_query($db, $productenquery) or die("FOUT : " . mysqli_error()); 

while($row = mysqli_fetch_assoc($productenresultaat)){
	$_SESSION["winkelwagen"] = array(
	'id' => $row['idproducten'],
	'naam'=> $row['naam'],
	'aantal'=> 1);
	array_push($winkelwagen, $row['naam']);
	echo "U heeft " . $winkelwagen[0] . "<br>";
		
}

echo $_SESSION["winkelwagen"]["naam"]." ".$_SESSION["winkelwagen"]["aantal"]."x";






?>