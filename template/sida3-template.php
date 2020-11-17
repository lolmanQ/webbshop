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
<body id="sida3">
	<div id="wrapper">
		<?php
			require "masthead.php";
		?>

		<?php
			require "menu.php";
		?>	
		<main class="box"> <!--Huvudinnehåll-->
			<section id="content">
				<h2>Varor</h2>
				<?php
				while ($row = $result->fetch_assoc()) {
					echo <<<FIGURE
					<figure>
						<img src="{$row['image']}" alt="{$row['description']}">
						<figcaption>{$row['name']} {$row['price']}
				  			<p>
								<a href="#">Köp</a>
				  			</p>
						</figcation>
					</figure>
FIGURE;
				}
				?>
			</section>		
		</main>
			
		<aside id="aside">
			<p>News</p>
		</aside>
	</div>
	<!--Egen fil -->
	<?php
		require("footer.php");
	?>
  
</body>
</html>