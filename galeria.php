<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="káva a espresso">
  <meta name="keywords" content="coffee, espresso, latte, aboutcoffee">
  <meta name="author" content="Erik Sháněl">
  <title>Zaverečný_Projekt</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/galeria.css">
  <link rel="stylesheet" href="./css/style.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script defer src="./js/app.js"></script>
</head>

<?php
$background = "white"; // predvolena farba pozadia biela
$color = "#000"; // predvolena farba textu cierna
if(isset($_COOKIE["theme"])) // kontrola ci je nastaveny cookie theme
{ 
    if($_COOKIE["theme"] == "dark") { // ak je cookie theme dark
        $background = "#151718"; // pozadie tmave
        $color = "#D1C5BE"; // text biely
    }
} else { // ak neni cookie theme nastaveny 
    setcookie("theme", "light", time() + (86400 * 30), "/"); // nastavenie default cookie na light a expiracny cas 30 dni
}
?>

<body style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
  <header>
    <!-- navbar-->
    <?php
    $page = 'galeria.php';
    include './components/header.php';
    ?>
  </header>
  
  <main>
  <!-- darkmode JS link--> 
  <script src="./js/darkmode.js"></script>

    <div class="image-bar2">
      <div class="image-overlay2"></div>
      <div class="image-bar-text">
        <h1 class="display-3 fw-normal text-capitalize">Galéria Kávy</h1>
        <p class="lead fw-normal">Ponorte sa do fascinujúceho sveta kávy prostredníctvom našej rozmanitej galérie
          fotografií a záberov, ktoré nádherne zachytávajú každodenné rituály a umenie spojené s touto lahodnou
          nápojovou kultúrou.</p>
      </div>
    </div>

    <!-- galeria-->

    <section class="gallery mt-5 custom-mb-4">
      <div class="container-img">
        <div class="grid">
          <div class="column-xs-12 column-md-4">
            <figure class="img-container rounded-4">
              <img class="img-img rounded-4" src="./img/gal1.jpg" />
              <figcaption class="img-content pt-4">
                <h2 class="title">Čerstvá vôňa</h2>
                <h3 class="category">Oživenie rána.</h3>
              </figcaption>
              <span class="img-content-hover">
                <h2 class="title">Čerstvá vôňa</h2>
                <h3 class="category">Oživenie rána.</h3>
              </span>
            </figure>
          </div>
          <div class="column-xs-12 column-md-4">
            <figure class="img-container rounded-4">
              <img class="img-img rounded-4" src="./img/gal2.jpg" />
              <figcaption class="img-content pt-4">
                <h2 class="title">Latte umenie</h2>
                <h3 class="category">Kremová harmónia.</h3>
              </figcaption>
              <span class="img-content-hover">
                <h2 class="title">Latte umenie</h2>
                <h3 class="category">Kremová harmónia.</h3>
              </span>
            </figure>
          </div>
          <div class="column-xs-12 column-md-4">
            <figure class="img-container rounded-4">
              <img class="img-img rounded-4" src="./img/gal3.jpg">
              <figcaption class="img-content pt-4">
                <h2 class="title">Pena dokonalosti</h2>
                <h3 class="category">Sladký objav.</h3>
              </figcaption>
              <span class="img-content-hover">
                <h2 class="title">Pena dokonalosti</h2>
                <h3 class="category">Sladký objav.</h3>
              </span>
            </figure>
          </div>
          <div class="column-xs-12 column-md-6">
            <figure class="img-container rounded-4">
              <img class="img-img rounded-4" src="./img/gal4.jpg" />
              <figcaption class="img-content pt-4">
                <h2 class="title">Hladká klasika</h2>
                <h3 class="category"> Kultúra kávy.</h3>
              </figcaption>
              <span class="img-content-hover">
                <h2 class="title">Hladká klasika</h2>
                <h3 class="category"> Kultúra kávy.</h3>
              </span>
            </figure>
          </div>
          <div class="column-xs-12 column-md-6">
            <figure class="img-container rounded-4">
              <img class="img-img rounded-4" src="./img/gal5.jpg" />
              <figcaption class="img-content pt-4">
                <h2 class="title">Karamelový svet</h2>
                <h3 class="category">Sladká vášeň.</h3>
              </figcaption>
              <span class="img-content-hover">
                <h2 class="title">Karamelový svet</h2>
                <h3 class="category">Sladká vášeň.</h3>
              </span>
            </figure>
          </div>
          <div class="column-xs-12 column-md-6">
            <figure class="img-container rounded-4">
              <img class="img-img rounded-4" src="./img/gal6.jpg" />
              <figcaption class="img-content pt-4">
                <h2 class="title">Vôňa rána</h2>
                <h3 class="category">Kávová poézia.</h3>
              </figcaption>
              <span class="img-content-hover">
                <h2 class="title">Vôňa rána</h2>
                <h3 class="category">Kávová poézia.</h3>
              </span>
            </figure>
          </div>
        </div>
      </div>
    </section>

  </main>
  <!--footer-->

  <footer>

  <?php include './components/footer.php';?>

  </footer>
</body>

</html>