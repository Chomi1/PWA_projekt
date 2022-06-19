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

        <?php

            //Dohvaćanje varijabli
            include 'connect.php';

            if (isset($_POST['title'])){
                
                $title=$_POST['title'];
            }
                
            if (isset($_POST['about'])){

                $about=$_POST['about'];
            }

            if (isset($_POST['content'])){

                $content=$_POST['content'];
            }

            if (isset($_POST['category'])){

                $category=$_POST['category'];
            }

            if(isset($_POST['archive'])){
                $archive=1;
            }
            else{
                $archive=0;
            }

            $picture = $_FILES['image']['name'];
            $target_dir = 'images/'.$picture;

            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir);
            $query = "INSERT INTO pwa_tablica (naslov, sazetak, tekst, slika, kategorija, 
            arhiva ) VALUES ('$title', '$about', '$content', '$picture', '$category', '$archive')";
            $result = mysqli_query($dbc, $query) or die('Error querying databese.');
            mysqli_close($dbc);

        ?>
        <main>
            <section class="clanak">

                <div class="row">
                    <p class="category">
                        <?php
                            echo $category;
                        ?>
                    </p>
                    <h3 class="title">
                        <?php
                        echo $title;
                        ?>
                    </h3>
                </div>
                <br>
                <section class="about">
                    <p>
                        <?php
                            echo $about;
                        ?>
                    </p>
                </section>
                <section class="slika">
                    <?php
                        echo "<img src='images/$picture' >";
                    ?>
                </section>

                <br>
                <section class="sadrzaj">
                    <p>
                        <?php
                            echo $content;
                        ?>
                        </p>
                </section>

            </section>

        </main>
        <footer id="podnozje">
            <h6 class="tijelo">Mislav Štih 2022.</h6>            
        </footer>
    </body>
</html>