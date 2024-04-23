<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zaverečný_Projekt</title>
  <meta name="description" content="káva a espresso">
  <meta name="keywords" content="coffee, espresso, latte, aboutcoffee">
  <meta name="author" content="Erik Sháněl">
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
    $page = 'kontakt.php';
    include './components/header.php';
    ?>
  </header>

  <main>
   <!-- darkmode JS link--> 
  <script src="./js/darkmode.js"></script>

    <div class="image-bar2">
      <div class="image-overlay3"></div>
      <div class="image-bar-text">
        <h1 class="display-3 fw-normal text-capitalize">Kontaktujte Nás</h1>
        <p class="lead fw-normal">Máte otázky ohľadom kávy? Neváhajte a kontaktujte nás.</p>
      </div>
    </div>
    <!--formular-->
    <div class="container my-5 py-5">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="custom-form p-5" style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
            <h1 class="form-title fw-semi-bold text-center mb-4" style = "color: <?php echo $color;?>">Napíšte nám</h1>
            <form id="myForm" action="thankyou.php" method="POST" class="row g-3 needs-validation" novalidate>
              <div class="col-md-6">
                <label for="meno" class="form-label" style = "color: <?php echo $color;?>">Meno</label>
                <input type="text" class="form-control" style="background-color: <?php echo $background;?>; color: <?php echo $color;?>" id="meno" name="meno" required>
                <div class="invalid-feedback">
                  Prosím, vyplňte meno.
                </div>
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label" style = "color: <?php echo $color;?>">Email</label>
                <input type="email" class="form-control" style="background-color: <?php echo $background;?>; color: <?php echo $color;?>" id="email" name="email" required>
                <div class="invalid-feedback">
                  Prosím, zadajte platný email.
                </div>
              </div>
              <div class="col-12">
                <label for="sprava" class="form-label" style = "color: <?php echo $color;?>">Správa</label>
                <textarea class="form-control" style="background-color: <?php echo $background;?>; color: <?php echo $color;?>" id="sprava" name="sprava" rows="3" required></textarea>
                <div class="invalid-feedback">
                  Prosím, zadajte správu.
                </div>
              </div>
              <div class="form-check col-12">
                <input class="form-check-input" type="checkbox" value="" id="suhlas" required>
                <label class="form-check-label" for="suhlas">
                  Súhlasím so spracovaním osobných údajov
                </label>
                <div class="invalid-feedback">
                  Musíte súhlasiť so spracovaním osobných údajov.
                </div>
              </div>
              <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-primary-custom btn-lg">Odoslať</button>
                <div class="mt-3">
                  <p class="mb-1">Pre ďalšie otázky nás môžete kontaktovať:</p>
                  <p class="mb-1"><a href="mailto:info@dobrakava.com"
                      style="text-decoration: none; color: #5e3c28;">info@dobrakava.com</a></p>
                  <p><a href="tel:+0949876899" style="text-decoration: none; color: #5e3c28;">+0949876899</a></p>
                </div>
              </div>
            </form>
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