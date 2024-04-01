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
    <?php
    $page = 'otazky.php';
    include './components/header.php';
    ?>
  </header>

  <main>
  <!-- darkmode JS link--> 
  <script src="./js/darkmode.js"></script>

    <!-- obrazok bar-->

    <div class="image-bar">
      <div class="image-overlay"></div>
      <div class="image-bar-text ">
        <h1 class="display-3 fw-normal text-capitalize">Otázky a Odpovede o Káve</h1>
        <p class="lead fw-normal">Preskúmajte svet kávy, otázka po otázke!</p>
      </div>
    </div>
    

    <!-- 2 obrazky-->
    <div class="container my-5">
      <div class="row" >
        <div class="col-lg-6"> 
          <div class="card" style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
            <img src="./img/typy_zrn.jpg" alt="">
            <div class="card-body" >
              <h5 class="card-title" >Rôzne druhy kávových zŕn</h5>
              <p class="card-text">Dozviete sa o rôznych druhoch kávových zŕn a ich jedinečných charakteristikách.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card" style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
            <img src="./img/coffee_brewing.jpg" alt="">
            <div class="card-body">
              <h5 class="card-title">Metódy prípravy kávy</h5>
              <p class="card-text">Objavte široké spektrum rôznych metód prípravy kávy a ich vplyv na chuť tohto
                obľúbeného nápoja.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- akordeon-->
    <div class="container accordion my-5" id="coffeeAccordion">

      <div class="accordion-item" style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
        <h2 class="accordion-header" id="question1" >
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer1"
            aria-expanded="true" aria-controls="answer1" style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
            Aké sú rôzne druhy kávových zŕn?
          </button>
        </h2>
        <div id="answer1" class="accordion-collapse collapse" aria-labelledby="question1">
          <div class="accordion-body">
            Hlavné typy kávových zŕn sú primárne dva: Arabika a Robusta. Arabika je známa pre hladší a aromatickejší
            chuťový zážitok, zatiaľ čo Robusta má tendenciu byť silnejšia a horká.
          </div>
        </div>
      </div>

      <div class="accordion-item" style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
        <h2 class="accordion-header" id="question2">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer2"
            aria-expanded="false" aria-controls="answer2" style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
            V čom sa líši espresso od bežnej kávy?
          </button>
        </h2>
        <div id="answer2" class="accordion-collapse collapse" aria-labelledby="question2">
          <div class="accordion-body">
            Espresso je koncentrovaná káva pripravovaná nátlakom horúcej vody cez jemne zomleté kávové zrná. Je
            hutnejšie a koncentrovanejšie ako bežná káva a zvyčajne sa podáva v menších množstvách.
          </div>
        </div>
      </div>

      <div class="accordion-item" style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
        <h2 class="accordion-header" id="question3">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer3"
            aria-expanded="false" aria-controls="answer3" style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
            Ako by mala byť káva skladovaná, aby si zachovala čerstvosť?
          </button>
        </h2>
        <div id="answer3" class="accordion-collapse collapse" aria-labelledby="question3">
          <div class="accordion-body">
            Kávu by ste mali skladovať v hermeticky uzatvorenej nádobe na chladnom a tmavom mieste, mimo vlhkosti,
            vzduchu, tepla a svetla, aby si zachovala svoju čerstvosť a chuť.
          </div>
        </div>
      </div>

      <div class="accordion-item" style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
        <h2 class="accordion-header" id="question4">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer4"
            aria-expanded="false" aria-controls="answer3" style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
            Ktorý krajiny sú najväčšími producentmi kávy?
          </button>
        </h2>
        <div id="answer4" class="accordion-collapse collapse" aria-labelledby="question3">
          <div class="accordion-body">
            Najväčšími producentmi kávy na svete sú Brazília, Vietnam a Kolumbia.
          </div>
        </div>
      </div>

      <div class="accordion-item" style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
        <h2 class="accordion-header" id="question5">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer5"
            aria-expanded="false" aria-controls="answer5" style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
            Aké sú rôzne stupne praženia kávy?
          </button>
        </h2>
        <div id="answer5" class="accordion-collapse collapse" aria-labelledby="question5">
          <div class="accordion-body">
            Káva sa môže pražiť svetlo, stredne a tmavo, každý stupeň praženia ovplyvňuje chuť a arómu kávy.
          </div>
        </div>
      </div>

      <div class="accordion-item" style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
        <h2 class="accordion-header" id="question6">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer6"
            aria-expanded="false" aria-controls="answer6" style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
            Aký je rozdiel medzi Cappuccinom a Latte?
          </button>
        </h2>
        <div id="answer6" class="accordion-collapse collapse" aria-labelledby="question6">
          <div class="accordion-body">
            Cappuccino má rovnaké množstvo kávy, mlieka a peny, zatiaľ čo Latte má viac mlieka a menej peny.
          </div>
        </div>
      </div>

      <div class="accordion-item" style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
        <h2 class="accordion-header" id="question7">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer7"
            aria-expanded="false" aria-controls="answer7" style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
            Ako dlho treba variť kávu v French Presse?
          </button>
        </h2>
        <div id="answer7" class="accordion-collapse collapse" aria-labelledby="question7">
          <div class="accordion-body">
            Odporúčaný čas je približne 4 minúty, ale čas môže byť upravený podľa preferencií silnejšej alebo slabšej
            kávy.
          </div>
        </div>
      </div>
    </div>

  </main>
  <!--footer-->

  <footer>

  <?php include './components/footer.php';?>

  </footer>

</body>

</html>