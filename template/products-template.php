<?php
	require("../includes/connect.php");
	$sql = "SELECT * FROM products;";
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();

	if(!$result){
		echo "SQL failed to execute";
		exit;
	}
	$dbh->close();
?>


<!DOCTYPE html>
<html lang="sv">
  <head>
	 <meta charset="utf-8">
	 <title>Produkter</title>
		 <link rel="stylesheet" href="css/stilmall.css">
		 <link rel="stylesheet" href="css/bulmaswatch.min.css">
  </head>
  <body id="produkter">
	<div id="wrapper">
	  
		<?php
			require "masthead.php";
		?>

		<?php
			require "menu.php";
		?>
		
		
		
		<main class="box"> <!--Huvudinnehåll-->
			<section id="content" class="productTable">
				<h2>Varor</h2>
				<table class="table">
					<thead>
						<tr>
							<th>Namn</th>
							<th>Beskrivning</th>
							<th>Bild</th>
							<th>Pris</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($row = $result->fetch_assoc()) {
							echo <<<TR
							<tr>
								<td>{$row['name']}</td>
								<td>{$row['description']}</td>
								<td><img src="{$row['image']}" alt="{$row['name']}"></td>
								<td>{$row['price']}</td>
								<td><a href="#">buy</a></td>
							</tr>
							TR;
						}
						/*
						foreach($varor as $vara){

							echo <<<TR
							<tr>
								<td>$vara[0]</td>
								<td>$vara[1]</td>
								<td><img src="$vara[3]" alt="$vara[0]"></td>
								<td>$vara[2]</td>
								<td><a href="#">buy</a></td>
							</tr>
							TR;
						}*/
						?>
					</tbody>
				</table>

			</section>
		</main>
	
		<?php
			require("footer.php");
		?>
	</div>
  </body>
</html>