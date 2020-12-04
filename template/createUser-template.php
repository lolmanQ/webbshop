<!DOCTYPE html>

<html lang="sv">

  <head>
     <meta charset="utf-8">
     <title>Skapa användare</title>
		 <link rel="stylesheet" href="css/stilmall.css">
		 <link rel="stylesheet" href="css/bulmaswatch.min.css">
	</head>
  <body id="login" class="loginPage">
    <div id="wrapper">
		<?php
			require "masthead.php";
		?>

		<?php
			require "menu.php";
		?>
		
		<main> <!--Huvudinnehåll-->
			<section class="loginWindow box">
				<form action="createUser2.php" method="post">
            		<label class="label" for="user">Användarnamn:</label>
            		<input class="input is-primary" type="text" id="user" name="username" required>
            		<label class="label" for="pwd">Lösenord:</label>
					<input class="input is-primary" type="password" id="pwd" name="password" required>
					
					<label class="label" for="email">Email:</label>
					<input class="input is-primary" type="email" name="email" id="email" required>

					<label class="label" for="firstname">Firstname:</label>
					<input class="input is-primary" type="text" name="firstname" id="firstname" required>

					<label class="label" for="surname">Surname:</label>
					<input class="input is-primary" type="text" name="surname" id="surname" required>

					<label class="label" for="address">address:</label>
					<input class="input is-primary" type="text" name="address" id="address" required>

					<label class="label" for="postcode">Post code:</label>
					<input class="input is-primary" type="number" name="postcode" id="postcode" required>

					<label class="label" for="locality">City:</label>
					<input class="input is-primary" type="text" name="city" id="locality" required>

					<label class="label" for="phone">Phone number:</label>
					<input class="input is-primary" type="tel" name="phone" id="phone" required>
            		
            		<input class="button is-success" type="submit" value="Skapa användare">
        			
          		</form>
			</section>
		</main>

    </div>
    <?php
			require("footer.php");
		?>

	</body>
</html>
