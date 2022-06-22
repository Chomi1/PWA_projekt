<!DOCTYPE html>
<html lang="hr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="autor" content="Mislav Štih">
        <link rel="icon" href="images/logo1.ico" type="image/x-icon" />
        <title>Dnevne novosti</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <header id="zaglavlje">
            <div class="tijelo_2">
                <img id="logo" class="tijelo_2" src="images/logo.png" alt="">
            </div>
            <nav id="navigacija">
                <ul class="tijelo">
                    <li><a href="index.php">Naslovnica</a></li>
                    <li><a href="kategorija.php?id=sport">Sport</a></li>
                    <li><a href="kategorija.php?id=kultura">Kultura</a></li>
                    <li><a href="administracija.php">Administracija</a></li>
                    <li><a href="unos.php">Unos vijesti</a></li>
                    <li><a href="registracija.php">Registracija</a></li>
                </ul>
            </nav>
        </header>
        <main class="tijelo_2">
            <?php
            include 'connect.php';
            define('UPLPATH', 'images/');
            $clanak = $_GET['id'];
            $query = "SELECT * FROM pwa_tablica WHERE id=\"".$clanak."\" ";
            $result = mysqli_query($dbc, $query);

            $i = 0;
                while($row = mysqli_fetch_array($result)){
                    echo '<div class="center">';
                    echo '<h1 class="naslov_clanka">'.$row['naslov'].'</h1>';
                    echo '<h5 class="podnaslov_clanka">'.$row['sazetak'].'</h5>';
                    echo '</div>';
                    echo '<img id="slika_clanak_zasebni" src="'. UPLPATH . $row['slika'] .'" alt="slika">';
                    echo '<section id="tekst_clanak">';
                    echo    '<p>'.$row['tekst'].'</p>';
                    echo '</section>';
                }
            ?>

        </main>        
        <footer id="podnozje_2">
            <div class="omotac_footer">
                <img id="slika_clanak2" class="tijelo_2" src="images/logo.png" alt="">
                <h6 class="tijelo_2">Programiranje web aplikacija Mislav   Štih   Tvz.hr</h6>  
            </div>
        </footer>