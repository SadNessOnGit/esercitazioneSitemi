<!DOCTYPE html>
<html lang="it">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Accedi</title>
	<link rel="stylesheet" href="./css/access.css">
	<!--Collegamento all'immagine da mettere come icona del sito-->
    <link rel="icon" type="image/png" href="./imgs/logo.png">
</head>

<body>
	<!-- Container per il form di accesso/iscrizione -->
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
		session_start();
		//controllo se è stato premuto il bottone
		if(isset($_POST['submit']) == 1 || isset($_SESSION["submit"]) == 1){
			include "./connect.php";
			$db->autocommit(true);
			if($_POST['nusername'] != null && $_POST['npwd'] != null){ //controllo che i dati di iscrizione siano diversi da null
				$user = $_POST['nusername'];
				$pwd = $_POST['npwd'];
				if ( preg_match('/\s/',$user) || preg_match('/\s/',$pwd)){ //controllo che i dati siano validi
					echo "<p class='php-message'>Dati errati</p>";
				} else {
					$result = $db->query("SELECT * FROM user WHERE username = '$user'");
					if($result->num_rows > 0){ //controllo se l'utente inserito è già registrato
						echo "<p class='php-message'>Utente esistente</p>";
					}else{//se tutto è corretto inserisco l'utente nel db
						$sql = "INSERT INTO user ".
						"(username,password) "."VALUES ".
						"('$user','$pwd')";
						if($db->query($sql)){ //passo alla home della pagina e salvo i dati in sessione
							header("Location: http://54.36.188.122/others/home.php");
							$_SESSION['username'] = $user;
							$_SESSION['pwd'] = $pwd;
							$_SESSION['submit'] = "Accedi";
						} else printf("<p class='php-message'>Impossibile inserire la riga: %s</p><br/>", $db->error); //controllo per l'errore
					}
				}
				
				;
			}elseif($_POST['username'] != null && $_POST['pwd'] != null){ //controllo che i dati di accesso non siano null
				$user = $_POST['username'];
				$pwd = $_POST['pwd'];
				$result = $db->query("SELECT * FROM user WHERE username = '$user' AND password = '$pwd'");
				if($result->num_rows > 0){ //controllo se i dati inseriti corrispondono ai record nel db
					//se tutto è corretto passo alla home del sito e salvo i dati nella sessione
					$_SESSION['username'] = $user;
					$_SESSION['pwd'] = $pwd;
					$_SESSION['submit'] = "Accedi";
					header("Location: http://54.36.188.122/others/home.php");
				}else{
					echo "<p class='php-message'>Utente o password errati</p>";
				}
			}elseif(isset($_SESSION['username']) && isset($_SESSION['pwd'])){
				header("Location: http://54.36.188.122/others/home.php");
			}else{}
			$db->close();
		}
		//elimino i dati dal post
		unset($_POST["usermane"]);
		unset($_POST["pwd"]);
		unset($_POST['submit']);
		unset($_POST["nusermane"]);
		unset($_POST["npwd"]);
?>
	<!-- Collegamento con il file js -->
	<script src="./js/access.js"></script>
</body>

</html>