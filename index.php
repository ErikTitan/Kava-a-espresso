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
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
      <div class="container">
        <p>.</p>
        <a class="navbar-brand" href="#"><img src="./img/logo.png" height="40px" width="40px" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto nav-underline">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Domov</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="otazky.php">Otázky</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="galeria.php">Galéria</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="kontakt.php">Kontakt</a>
            </li>
            <li class="switch-container">
              <label class="switch">
					     <input type="checkbox" id="toggleTheme" <?php if($_COOKIE["theme"] == "dark") { echo "checked"; }?>> <!--dark mode checkbox-->
					     <span class="slider round"></span>
				      </label>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
  </header>
  <main>
    <!-- kreatívny bod--> <!--cookies popup-->
    <div id="cb-cookie-banner" class="py-3 text-center mb-0" role="alert">
      🍪 Táto webová stránka používa súbory cookies na zabezpečenie čo najlepšieho zážitku pri jej používaní.
      <button type="button" class="btn btn-primary btn-sm ms-3" onclick="window.cb_skryCookieBanner()">Rozumiem</button>
    </div>

    <!-- kreatívny bod--> <!--parallax efekt-->
    <div class="bg-image1"></div>

    <!-- kreatívny bod--> <!--animácia textu-->
    <section class="text-show">
      <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
        <h1 class="display-3 fw-normal text-capitalize">Káva & Espresso</h1>
        <p class="lead fs-4 lead fw-normal">Vôňa čerstvo pražených zŕn, jemný tanec aróm.</p>
      </div>
    </section>

    <!-- sekcia1-->
    <section class="container text-center py-5 my-3">
      <div class="row">
        <div class="col-lg-4">
          <img src="./img/kavovezrna1.jpg" class="bd-img rounded-circle" width="170" height="170">
          <h2 class="fw-normal py-2">Kávové zrná</h2>
          <p>Klenoty plné intenzívnych chutí a vôní. Ich cesta od rastliny po praženie je príbeh plný bohatých chuťových
            tónov.</p>
        </div>

        <div class="col-lg-4">
          <img src="./img/accessories.jpg" class="bd-img rounded-circle" width="170" height="170">
          <h2 class="fw-normal py-2">Kávové doplnky</h2>
          <p>Elegantné nástroje pre dokonalú chuť. Od mlynčekov po šálky, pre štýlový kávový zážitok.</p>
        </div>

        <div class="col-lg-4">
          <img src="./img/latte-art.jpg" class="bd-img rounded-circle" width="170" height="170">
          <h2 class="fw-normal py-2">Latté umenie</h2>
          <p>Každá šálka je plátnom pre majstrovstvo baristu, ktorý transformuje každý dúšok na malé umelecké dielo.</p>
        </div>
      </div>
    </section>
    
    <!-- darkmode JS link-->
    <script src="./js/darkmode.js"></script>

    <!--carousel-->

    <div id="carouselExampleDark" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active c-item position-relative" data-bs-interval="5000">
          <img src="./img/CRobr1.jpg" class="d-block w-100 c-img" alt="...">
          <div class="carousel-caption container position-absolute top-50 start-50 translate-middle ">
            <h1 class="display-2 fw-normal text-capitalize">Čerstvo pražená káva</h1>
            <p class="mt-5 fs-3 fst-italic">S láskou pripravujeme každú šálku, aby sme vám priniesli ten najlepší
              zážitok
              z čerstvej kávy.</p>
            <a class="btn btn-primary btn-light" href="#cerstva-kava" role="button">Prejsť</a>
          </div>
        </div>
        <div class="carousel-item c-item position-relative" data-bs-interval="5000">
          <img src="./img/CRobr2.jpg" class="d-block w-100 c-img" alt="...">
          <div class="carousel-caption container position-absolute top-50 start-50 translate-middle">
            <h1 class="display-2 fw-normal text-capitalize">Stroj na espresso</h1>
            <p class="mt-5 fs-3 fst-italic">Stroj, ktorý premení každú domácnosť na kaviareň.</p>
            <a class="btn btn-primary btn-light" href="#stroj" role="button">Prejsť</a>
          </div>
        </div>
        <div class="carousel-item c-item position-relative" data-bs-interval="5000">
          <img src="./img/CRobr3.jpg" class="d-block w-100 c-img" alt="">
          <div class="carousel-caption container position-absolute top-50 start-50 translate-middle">
            <h1 class="display-2 fw-normal text-capitalize">Kávový mlynček</h1>
            <p class="mt-5 fs-3 fst-italic">Mlynček na kávu s výkonným motorom a elegantným dizajnom.</p>
            <a class="btn btn-primary btn-light" href="#mlyncek" role="button">Prejsť</a>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    </div>

    <!--sekcia2-->
    <section class="container py-3">
      <div class="row align-items-center" id="cerstva-kava">
        <div class="col-md-7">
          <h2 class="fw-normal lh-1">Čerstvo pražená Káva</h2>
          <p class="lead">Vôňa čerstvo praženej kávy je ako melódia pre vaše zmysly. Každá šálka ponúka dobrodružstvo do
            sveta plného jemných aróm a pikantných tónov. Je to tanec lahodnej horkosti a povznášajúceho osvieženia,
            ktoré
            každému dňu dodáva energiu a harmóniu.</p>
        </div>
        <div class="col-md-5 justify-content-center align-items-center text-center">
          <img class="animate-fly-in img-fluid " src="./img/kavovezrna.jpg" width="500" height="500" alt="">
        </div>
      </div>

      <hr>

      <div class="row align-items-center" id="stroj">
        <div class="col-md-5 justify-content-center align-items-center text-center">
          <img class="animate-fly-in img-fluid" src="./img/stroj1.jpg" width="500" height="500" alt="">
        </div>
        <div class="col-md-7">
          <h2 class="fw-normal lh-1">Stroj na Espresso</h2>
          <p class="lead">Stroj na espresso je srdcom vášho kávového rituálu. Jeho plynulý chod je ako symfónia
            presnosti a
            chuti, ktorá sa odohráva za jediným stlačením tlačítka. Je to zázrak vytvárania lahodného elixíru, ktorý
            napĺňa
            vašu šálku jemnou kávovou esenciou.</p>
        </div>
      </div>

      <hr>

      <div class="row align-items-center" id="mlyncek">
        <div class="col-md-7">
          <h2 class="fw-normal lh-1">Mlynček na Kávu</h2>
          <p class="lead">Kávový mlynček je ako kúzelník, ktorý premení hrubé zrná kávy na jemný prášok plný zážitkov.
            Jeho
            ručička je dirigentom symfónie aróm, čo uvoľňujú svoje tajomstvá v každom zrnku. Je to proces, ktorý sa
            odohráva
            v tichu, no jeho výsledok hovorí nahlas o kvalite vašej kávy.</p>
        </div>
        <div class="col-md-5 justify-content-center align-items-center text-center">
          <img class="animate-fly-in img-fluid" src="./img/mlyncek1.jpg" width="500" height="500" alt="">
        </div>
      </div>
    </section>


  </main>
  <!--footer-->

  <footer>

    <div class="py-4 container fw-medium">
      <ul class="nav justify-content-center ">
        <li class="nav-item">
          <a href="#" class="nav-link px-2 text-light ">Domov</a>
        </li>
        <li class="nav-item">
          <a href="otazky.php" class="nav-link px-2 text-light ">Otázky</a>
        </li>
        <li class="nav-item">
          <a href="galeria.php" class="nav-link px-2 text-light ">Galéria</a>
        </li>
        <li class="nav-item">
          <a href="kontakt.p" class="nav-link px-2 text-light ">Kontakt</a>
        </li>
      </ul>
      <hr class="hr">
      <p class="text-center text-light py-2">&copy; 2023 Vytvoril: Erik Sháněl</p>
    </div>

  </footer>

  
</body>

</html>