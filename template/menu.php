<?php
	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}
?>

<nav><!--Navigationsmeny-->
	<ul>
		<li><a href="index.php">Start</a></li>
		<li><a href="products.php">Produkter</a></li>
		<li><a href="sida3.php">Varusida 2</a></li>
		<?php
			if(empty($_SESSION['username'])){
				echo '<li><a href="login.php">Logga in</a></li>';
			}
			if(!empty($_SESSION['username']) && $_SESSION['status'] == 0){
				echo '<li><a href="user.php">';
				echo $_SESSION['username'];
				echo '</a></li>';
			}
			if(!empty($_SESSION['username']) && $_SESSION['status'] == 2){
				echo '<li><a href="admin.php">Admin</a></li>';
			}
		?>
	</ul>
</nav>