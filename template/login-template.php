<?php
	//loginError 1: incorrect password
	//loginError 2: incorrect username
	$loginError = 0;
	$loginError = filter_input(1, 'loginError', FILTER_SANITIZE_NUMBER_INT);
?>


<!DOCTYPE html>
<html lang="sv">

  <head>
     <meta charset="utf-8">
     <title>Logga in</title>
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
				<!--<section>
					 <form action="login2.php" method="post">
            <p><label for="user">Användarnamn:</label>
            <input type="text" id="user" name="username"></p>
            <p><label for="pwd">Lösenord:</label>
            <input type="password" id="pwd" name="password"></p>
            <p>
            <input class="button" type="submit" value="Logga in">
            </p>
          </form>
          <p class="create button"><a href="createUser.php">Skapa användare</a></p>
				</section>-->

				<section class="loginWindow box">
					<form action="login2.php" method="post">
						<input required class="input is-primary" type="text" name="username" id="username" placeholder="Username">
						<input required class="input is-primary" type="password" name="password" id="password" placeholder="Password">
						<button class="button is-primary" type="submit">Login</button>
						<?php
							if($loginError == 1){
								echo "<p class='has-text-centered'>Incorrect password</p>";
							}
							else if($loginError == 2){
								echo "<p class='has-text-centered'>Incorrect username</p>";
							}
							else if($loginError == 3){
								echo "<p class='has-text-centered'>All fields need to be filed</p>";
							}
						?>
					</form>
					<a href="createUser.php">Create new user</a>
				</section>
			</main>
		</div>
    	<?php
			require("footer.php");
		?>
	</body>
</html>
