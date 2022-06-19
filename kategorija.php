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
            <div class="tijelo">
                <img id="logo" class="tijelo" src="images/logo.png" alt="">
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
        <main>
        <?php
            include 'connect.php';
            define('UPLPATH', 'images/');

                //Početak ispisa članaka
                $kategorija=$_GET['id'];
                $query = "SELECT * FROM pwa_tablica WHERE kategorija=\"".$kategorija."\" AND arhiva=0";
                $result = mysqli_query($dbc, $query);

                if($kategorija == 'posaoikarijera'){
                    
                //Posao i karijera
                    echo "<section id='posao_karijere' class='wrapper'>";
                    echo "<h2>Posao &#38; Karijera</h2>";
                    echo "<div class='clanci'>";
                    $i=0;
                    while($row = mysqli_fetch_array($result)){
                        
                                echo "<article>";
                                    echo '<img src="' . UPLPATH . $row['slika'] . '"';
                                    echo '<h3>';
                                    echo '<a class="naslovi_clanaka" href="clanak.php?id='.$row['id'].'">';
                                    echo $row['naslov'];
                                    echo '</a></h3>';
                                    //echo "<h3><a href='clanak.php?id='".$row['id'].">".$row['naslov']."</a></h3>";
                                    echo "<p>".$row['tekst']."</p>";
                                    echo "<p class='datum'>".$row['datum']."</p>";
                                    echo "<hr>";
                                echo "</article>";
    
                    }
                echo "</div>";
                echo "</section>";  

                }

                if($kategorija == 'hrana'){
                    
                    //Hrana
                        echo "<section id='posao_karijere' class='wrapper'>";
                        echo "<h2>Hrana</h2>";
                        echo "<div class='clanci'>";
                        $i=0;
                        while($row = mysqli_fetch_array($result)){
                            
                                    echo "<article>";
                                        echo '<img src="' . UPLPATH . $row['slika'] . '"';
                                        echo '<h3>';
                                        echo '<a class="naslovi_clanaka" href="clanak.php?id='.$row['id'].'">';
                                        echo $row['naslov'];
                                        echo '</a></h3>';
                                        //echo "<h3><a href='clanak.php?id='".$row['id'].">".$row['naslov']."</a></h3>";
                                        echo "<p>".$row['tekst']."</p>";
                                        echo "<p class='datum'>".$row['datum']."</p>";
                                        echo "<hr>";
                                    echo "</article>";
        
                        }
                    echo "</div>";
                    echo "</section>";  
    
                    }
                 
        ?> 

            <br>
        </main>
        <br>
        <footer id="podnozje">
            <h6 class="tijelo">Mislav Štih 2022.</h6>            
        </footer>
    </body>
</html>