<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Prodotti</title>
    <!--Collegamento all'immagine da mettere come icona del sito-->
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
            <a><img src="../imgs/shopping-cart.png" alt="carrello"></a>
        </div>
    </div>
    <div class="search-div">
        <form class="searchbar-box" action="./home.php" method="get">
            <input type="text" name="cond" style="padding:4px;" placeholder="Cerca qualcosa">
            <button type="submit"><img src="../imgs/search.png" alt="lente"></button>
        </form>
    </div>
    
    <div class="card-container">
        <?php
        include "../connect.php";
        if ($_GET['cond'] == null) {
            $query = "SELECT * FROM prodotto";
        } else {
            $query = "SELECT * FROM prodotto WHERE nome LIKE '%".$_GET['cond']."%' OR descrizione LIKE '%".$_GET['cond']."%'";
        }
        try {
            $result = $db->query($query);
            if ($result->num_rows == 0) {
                echo "No products in the database";
            } else {
                $index = 0;
                while (($row = $result->fetch_assoc())) {
                    echo '
                    <div class="wrapper" style="margin:10px">
                    <div class="container">
                        <div class="top" style="background: url(../products/'.$row['url'].') no-repeat center center; -webkit-background-size: 100%;-moz-background-size: 100%;-o-background-size: 100%; background-size: 100%;">
                        </div>
                        <div class="bottom">
                            <div class="left">
                                <div class="details">
                                    <h1>'.$row['nome'].'</h1>
                                    <p>'.$row['prezzo'].' €</p>
                                </div>
                                <div class="buy" onclick="added('.$index.')"><img src="../imgs/add.png"></img></div>
                            </div>
                            <div class="right">
                                <div class="done"><img src="../imgs/done.png"></img></div>
                                <div class="details">
                                    <h1>'.$row['nome'].'</h1>
                                    <p>Added to your cart</p>
                                </div>
                                <div class="remove" onclick="removed('.$index.')"><img src="../imgs/close.png"></img></div>
                            </div>
                        </div>
                    </div>
                    <div class="inside">
                        <div class="icon"><img src="../imgs/information.png"></img></div>
                        <div class="contents">
                        <p>'.$row['descrizione'].'</p>
                        </div>
                    </div>
                </div>
                        ';
                    $index+=1;
                }
            }
        } catch (Exception $e) {
            echo "Error in the db";
        }
        $db->close();
        ?>
    </div>
    <script src="./js/app.js"></script>
</body>

</html>