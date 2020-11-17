<?php
	session_start();
	if(empty($_SESSION["username"])){
		header('Location: login.php');
	}

	require("../includes/connect.php");
	$sql = "SELECT * FROM customers;";
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
<body id="admin">
	<div id="wrapper">
		<?php
			require "masthead.php";
		?>

		<?php
			require "menu.php";
		?>	
		<main class="box"> <!--Huvudinnehåll-->
			<section id="content">
				<h2>Users</h2>
				<table class="table">
					<thead>
						<tr>
							<th>Första namn</th>
							<th>Efternamn</th>
							<th>address</th>
							<th>post code</th>
							<th>stad</th>
							<th>telefon number</th>
						</tr>
					</thead>
					<tbody>
					<?php
					while ($row = $result->fetch_assoc()) {
					echo <<<TR
						<tr>
							<td>{$row['firstname']}</td>
							<td>{$row['surname']}</td>
							<td>{$row['address']}</td>
							<td>{$row['postcode']}</td>
							<td>{$row['city']}</td>
							<td>{$row['phone']}</td>
						</tr>
						TR;
					}
					?>
					</tbody>
				</table>
				<a href="logout.php">logout</a>
			</section>		
		</main>
	</div>
	<!--Egen fil -->
	<?php
		require("footer.php");
	?>
  
</body>
</html>