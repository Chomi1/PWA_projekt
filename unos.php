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
        <main class="center">
            <br>
            <form enctype="multipart/form-data" action="skripta.php" method="POST" class="unos_vijesti">

                <div class="form-item">
                    <label for="title">Naslov vijesti</label>
                        <div class="form-field">
                            <input type="text" name="title" id="title" class="form-field-textual">
                        </div>
                        <span id="porukaTitle" class="bojaPoruke"></span>
                </div>

                <div class="form-item">
                    <label for="about">Kratki sadržaj vijesti (do 50 znakova)</label>
                        <div class="form-field">
                            <textarea name="about" id="about" id="" cols="35" rows="5" class="form-field-textual"></textarea>
                        </div>
                        <span id="porukaAbout" class="bojaPoruke"></span>
                </div>

                <div class="form-item">
                    <label for="content">Sadržaj vijesti</label>
                        <div class="form-field">
                            <textarea name="content" id="content" id="" cols="35" rows="5" class="form-field-textual"></textarea>
                        </div>
                        <span id="porukaContent" class="bojaPoruke"></span>
                </div>

                <div class="form-item">
                    <label for="image">Slika: </label>
                        <div class="form-field">
                            <input type="file" accept="image/jpg,image/gif" class="input-text" name="image" id="image"/>
                        </div>
                        <span id="porukaSlika" class="bojaPoruke"></span>
                </div>

                <div class="form-item">
                    <label for="category">Kategorija vijesti</label>
                        <div class="form-field">
                            <select name="category" id="category" class="form-field-textual">
                                <option value="" disabled selected>Izaberi kategoriju</option>
                                <option value="sport">Sport</option>
                                <option value="kultura">Kultura</option>
                            </select>
                        </div>
                        <span id="porukaKategorija" class="bojaPoruke"></span>
                </div>
                <br>
                <div class="form-item">
                    <div class="form-field">
                        
                        <label>Spremiti u arhivu:</label> <input type="checkbox" name="archive">

                    </div>
                </div>
                <br>
                <div class="form-item">
                    <button type="reset" value="Poništi">Poništi</button>
                    <button type="submit" value="Prihvati" id="slanje">Prihvati</button>
                </div>
            </form>
                <br>
        </main>
<script type="text/javascript">
    // Provjera forme prije slanja
    document.getElementById("slanje").onclick = function(event) {

    var slanjeForme = true;

    // Naslov vjesti (5-30 znakova)
    var poljeTitle = document.getElementById("title");
    var title = document.getElementById("title").value;

    if (title.length < 5 || title.length > 30) {

    slanjeForme = false;
    poljeTitle.style.border="1px dashed red";
    document.getElementById("porukaTitle").innerHTML="Naslov vijesti mora imati između 5 i 30 znakova!<br>";

    } else {
    poljeTitle.style.border="1px solid green";
    document.getElementById("porukaTitle").innerHTML="";
    }

    // Kratki sadržaj (10-100 znakova)
    var poljeAbout = document.getElementById("about");
    var about = document.getElementById("about").value;

    if (about.length < 10 || about.length > 100) {

    slanjeForme = false;
    poljeAbout.style.border="1px dashed red";
    document.getElementById("porukaAbout").innerHTML="Kratki sadržaj mora imati između 10 i 100 znakova!<br>";

    } else {
    poljeAbout.style.border="1px solid green";
    document.getElementById("porukaAbout").innerHTML="";
    }

    // Sadržaj mora biti unesen
    var poljeContent = document.getElementById("content");
    var content = document.getElementById("content").value;

    if (content.length == 0) {

    slanjeForme = false;
    poljeContent.style.border="1px dashed red";
    document.getElementById("porukaContent").innerHTML="Sadržaj mora biti unesen!<br>";

    } else {
    poljeContent.style.border="1px solid green";
    document.getElementById("porukaContent").innerHTML="";
    }

    // Slika mora biti unesena
    var poljeSlika = document.getElementById("image");
    var image = document.getElementById("image").value;

    if (image.length == 0) {

    slanjeForme = false;
    poljeSlika.style.border="1px dashed red";
    document.getElementById("porukaSlika").innerHTML="Slika mora biti unesena!<br>";

    } else {
    poljeSlika.style.border="1px solid green";
    document.getElementById("porukaSlika").innerHTML="";
    }

    // Kategorija mora biti odabrana
    var poljeCategory = document.getElementById("category");

    if(document.getElementById("category").selectedIndex == 0) {
    slanjeForme = false;
    poljeCategory.style.border="1px dashed red";

    document.getElementById("porukaKategorija").innerHTML="Kategorija mora biti odabrana!<br>";
    } else {

    poljeCategory.style.border="1px solid green";
    document.getElementById("porukaKategorija").innerHTML="";
    }

    if (slanjeForme != true) {
    event.preventDefault();
    }

    };
</script>
        <footer id="podnozje">
            <h6 class="tijelo">Mislav Štih 2022.</h6>            
        </footer>
    </body>
</html>