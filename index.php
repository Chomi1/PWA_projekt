<!DOCTYPE html>
<html lang="hr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="autor" content="Mislav Štih">
        <title>Dnevne novosti</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <header id="zaglavlje">
            <div class="tijelo">
                <img id="logo" class="tijelo" src="images/logo.png" alt="Dnevne novosti logo">
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
        <main class="tijelo">
            <?php
                include 'connect.php';
                define('UPLPATH', 'images/');
                //SPORT
                echo "<section id='sport'>";
                echo "<h2>SPORT</h2>";
                echo "<div class='flex'>";
                    //ISPIS ČLANAKA IZ BAZE KOJI NISU ARHIVIRANI
                    $query = "SELECT * FROM pwa_tablica WHERE arhiva=0 AND kategorija='sport' ";
                    $result = mysqli_query($dbc, $query);
                    $i=0; //provjeri ovo
                    while($row = mysqli_fetch_array($result)){

                                echo '<article class="clanak">';
                                echo '<a  class="clanak_link" href="clanak.php?id='.$row['id'].'">';
                                        echo '<img class="slika_clanka" src =" '. UPLPATH . $row['slika'] .'">';
                                        echo '<div class="overlay"></div>';
                                        echo '<div class="overlay_tekst">';
                                        echo    '<p class="tekst">Saznaj više</p>';
                                        echo '</div>';
                                        echo '<h6>'.$row['tekst'].'</h6>'; //provjeri ispis, možda neće raditi zbog navodnika
                                echo '</a>';
                                echo '</article>';
                    }
                echo "</div>";
                echo "</section>";    
            ?> 

                <br>
            
            <?php
                echo "<section id='kultura'>";
                echo "<h2>KULTURA</h2>";
                echo "<div class='flex'>";
                    //ISPIS ČLANAKA IZ BAZE KOJI NISU ARHIVIRANI
                    $query = "SELECT * FROM pwa_tablica WHERE arhiva=0 AND kategorija='kultura' ";
                    $result = mysqli_query($dbc, $query);
                    $i=0; //provjeri ovo
                    while($row = mysqli_fetch_array($result)){

                                echo '<article class="clanak">';
                                echo '<a class="clanak_link" href="clanak.php?id='.$row['id'].'">';
                                        echo '<img class="slika_clanka" src =" '. UPLPATH . $row['slika'] .'">';
                                        echo '<div class="overlay"></div>';
                                        echo '<div class="overlay_tekst">';
                                        echo    '<p class="tekst">Saznaj više</p>';
                                        echo '</div>';
                                        echo '<h6>'.$row['tekst'].'</h6>'; //provjeri ispis, možda neće raditi zbog navodnika
                                echo '</a>';
                                echo '</article>';
                    }
                echo "</div>";
                echo "</section>";    
            ?> 
        </main>
        <footer id="podnozje">
            <h6 class="tijelo">Mislav Štih 2022.</h6>            
        </footer>
    </body>
</html>