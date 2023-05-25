<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <!--Collegamento al foglio di stile comune alle pagine-->
    <link rel="stylesheet" href="css/style.css">
    <!--Collegamento al foglio di stile specifico per la pagina-->
    <link rel="stylesheet" href="css/about.css">
    <link rel="icon" type="image/png" href="../imgs/logo.png">
</head>

<body>
    <?php
        session_start();
        if(isset($_SESSION['username']) == 1 && isset($_SESSION['pwd']) == 1){}
        else{
            header("Location: http://54.36.188.122/index.php");
            session_destroy();
        }
    ?>
    <!--NavBar-->
    <div class="nav">
        <div class="nav-sx">
            <img src="../imgs/logo.png" alt="logo">
            <a href="http://54.36.188.122/others/home.php" class="nav-link">PRODOTTI</a>
            <a href="./chisiamo.php" class="nav-link">CHI SIAMO</a>
        </div>
        <div class="nav-dx">
            <img src="../imgs/user.png" alt="usr" onclick="openForm()">
            <div class="form-popup" id="myForm">
                <form action="../logout.php" class="form-container">
                    <?php echo "<h1>".$_SESSION['username']."</h1>";?>
                    <button type="submit" class="btn">Logout</button>
                    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                </form>
            </div>
        </div>
    </div>
    <!--Sezione principale della pagina-->
    <section class="main">
        <!--Contenitore principale della pagina-->
        <div class="main-container">
            <!--Contenitore informazioni-->
            <div class="main-header">
                <h1>MIND, chi siamo?</h1>
                <p class="first">MIND è un'azienda di web developer, nata a scopo scolastico. Formata da Luca Fadhel, Matteo Sensi, Andrea Ramaj e Marco Melani
                    tutti studenti al 5^ anno del corso di informatica di un ITTS.</p>
                <p class="second">In questo primo progetto vogliamo presentarvi il nostro shop online.</p>
            </div>
            <!--Contenitore carte sviluppatori-->
            <div id="card-container">
                <div class="card"><img src="../imgs/luca_fadhel.png" alt="Luca Fadhel"><p>Luca Fadhel</p></div>
                <div class="card"><img src="../imgs/matteo_sensi.png" alt="Matteo Sensi"><p>Matteo Sensi</p></div>
                <div class="card"><img src="../imgs/plaka.jpg" alt=""><p>Andrea Ramaj</p></div>
                <div class="card"><img src="../imgs/stef.jpeg" alt=""><p>Marco Melani</p></div>
            </div>
        </div>
    </section>
    <script src="./js/app.js"></script>
</body>

</html>