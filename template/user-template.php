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
				<h2>Profile</h2>
				<form action="changePass.php" method="post">
					<label class="label" for="oldPass">Old password</label>
					<input class="input" type="password" name="oldPass" id="oldPass">
					<label class="label" for="newPass">New password</label>
					<input class="input" type="password" name="newPass" id="newPass">
					<input class="button is-danger" type="submit" value="Change password">
				</form>
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