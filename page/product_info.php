<!-- PRODUCT_INFO.PHP

FUNCTIES:
- Weergeven van product

-->


<?php 
include ('inc/db_connect.php');

		if(!empty($_GET)){
				$productid = $_GET['product'];

				$query = 	"SELECT * FROM producten 
							WHERE idproducten ='" . $_GET['product'] ."'"; 
				$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error()); 
				
				while($row = mysqli_fetch_assoc($result)){
					
?>			


        
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div class="card mt-4">
            <img class="card-img-top img-fluid" src="img/<?php echo $row['afbeelding'] ?>.png" style="height: 500px; width: 500px;" alt="">
            <div class="card-body">
              <h3 class="card-title"><?php echo $row['naam'] ?></h3>
              <h4>&euro;<?php echo $row['prijs'] ?>,00</h4>
              <p class="card-text"><?php 
	$voorraad = $row['hoeveelheid'];
		if($voorraad == 0){
		echo "<i>Levertijd onbekend</i>";
		}elseif($voorraad > 0 ){
		echo "Levertijd: 1 tot 2 werkdagen";
		}

	?></p>
			  <button class="btn btn-success">In winkelwagen</button>
              
              
            </div>
          </div>
          <!-- /.card -->

          <div class="card card-outline-secondary my-4">
            <div class="card-header">
              Omschrijving
            </div>
            <div class="card-body">
              <?php echo $row['omschrijving'] ?>
            </div>
          </div>
		  <div class="card card-outline-secondary my-4">
            <div class="card-header">
              Specificaties
            </div>
            <div class="card-body">
              <?php echo $row['specificaties'] ?>
            </div>
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

      
 <?php 
		}
	}else {
	}
	mysqli_close($db);

?>		