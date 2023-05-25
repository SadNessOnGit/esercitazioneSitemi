<!DOCTYPE html>
<html lang="it">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Accedi</title>
	<link rel="stylesheet" href="./css/access.css">
</head>

<body>
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="./index.php" method="post">
				<h1>Iscriviti</h1>
				<input type="text" name="nusername" placeholder="Username" />
				<input type="password" name="npwd" placeholder="Password" />
				<input name = "submit" type="submit" value="Iscriviti"></input>
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form action="./index.php" method="post">
				<h1>Accedi</h1>
				<input type="text" name="username" placeholder="Username" />
				<input type="password" name="pwd" placeholder="Password" />
				<input name = "submit" type="submit" value="Accedi"></input>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Bentornato!</h1>
					<p>Accedi per consultare il sito e vedere i tuoi prodotti</p>
					<button class="ghost" id="signIn">Accedi</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Ciao!</h1>
					<p>Inserisci i tuoi dati per accedere al nostro sito e unirti a noi</p>
					<button class="ghost" id="signUp">Iscriviti</button>
				</div>
			</div>
		</div>
	</div>
	<?php
		if($_POST['submit']){
			include "./connect.php";
			$db->autocommit(true);
			//header("Location: ./others/home.php");
			if($_POST['nusername'] != null && $_POST['npwd'] != null){
				$user = $_POST['nusername'];
				$pwd = $_POST['npwd'];
				if ( preg_match('/\s/',$user) || preg_match('/\s/',$pwd)){
					echo "<p class='php-message'>Dati errati</p>";
				} else {
					$result = $db->query("SELECT * FROM user WHERE username = '$user'");
					if($result->num_rows > 0){
						echo "<p class='php-message'>Utente esistente</p>";
					}else{
						$sql = "INSERT INTO user ".
						"(username,password) "."VALUES ".
						"('$user','$pwd')";
						if($db->query($sql)) header("Location: http://54.36.188.122/others/home.php");
						else printf("<p class='php-message'>Impossibile inserire la riga: %s</p><br/>", $db->error);;
					}
				}
				unset($_POST["nusermane"]);
				unset($_POST["npwd"]);
			}elseif($_POST['username'] != null && $_POST['pwd'] != null){
				$user = $_POST['username'];
				$pwd = $_POST['pwd'];
				$result = $db->query("SELECT * FROM user WHERE username = '$user' AND password = '$pwd'");
				if($result->num_rows > 0){
					header("Location: http://54.36.188.122/others/home.php");
				}else{
					echo "<p class='php-message'>Utente o password errati</p>";
				}
				unset($_POST["usermane"]);
				unset($_POST["pwd"]);
			}else{}
			$db->close();
		}
		
?>
	<script src="./js/access.js"></script>
</body>

</html>