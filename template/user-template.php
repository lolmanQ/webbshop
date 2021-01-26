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
				<?php
					if(session_status() == PHP_SESSION_NONE){
						session_start();
					}
					require('../includes/connect.php');			
					$sql = "SELECT * FROM webbshop.customers WHERE username=?";
					$res = $dbh->prepare($sql);
					$res->bind_param("s",$_SESSION['username']);
					$res->execute();

					$result = $res->get_result();
					$row=$result->fetch_assoc();
					echo <<<form
					<form action="updateUserInfo.php" method="post">
						<label class="label" for="firstname">Firstname</label>
						<input class="input" type="text" name="firstname" id="firstname" value="{$row['username']}">
						<label class="label" for="surname">Surname</label>
						<input class="input" type="text" name="surname" id="surname" value="{$row['surname']}">
						<label class="label" for="address">Address</label>
						<input class="input" type="text" name="address" id="address" value="{$row['address']}">
						<label class="label" for="postcode">Post code</label>
						<input class="input" type="number" name="postcode" id="postcode" value="{$row['postcode']}">
						<label class="label" for="city">City</label>
						<input class="input" type="text" name="city" id="city" value="{$row['city']}">
						<label class="label" for="phone">Phone number</label>
						<input class="input" type="tel" name="phone" id="phone" value="{$row['phone']}">
						<input class="button is-danger" type="submit" value="Update info">
					</form>
					form;
				?>
				

				<h2>Password</h2>
				<form action="changePass.php" method="post">
					<label class="label" for="oldPass">Old password</label>
					<input class="input" type="password" name="oldPass" id="oldPass">
					<label class="label" for="newPass">New password</label>
					<input class="input" type="password" name="newPass" id="newPass">
					<input class="button is-danger" type="submit" value="Change password">
				</form>
				<br>
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