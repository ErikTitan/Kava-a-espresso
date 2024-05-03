<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Cache-Control" content="no-cache">  
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
    $page = 'recepty.php';
    include './components/header.php';
    ?>
  </header>

  <main>
   <!-- darkmode JS link--> 
  <script src="./js/darkmode.js"></script>
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
        <!-- Coffee Recipe Section -->
        <div class="col-lg-4">
          <div class="custom-form p-5" style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
            <h1 class="form-title fw-semi-bold text-center mb-4" style="color: <?php echo $color; ?>">Vytvoriť Recept</h1>
            <form id="recipeForm" action="includes/recipe.inc.php" method="post" class="row g-3" novalidate>
              <div class="col-md-12">
                <label for="roast_type" class="form-label" style="color: <?php echo $color; ?>">Typ praženia</label>
                <select class="form-select" id="roast_type" name="roast_type">
                  <option value="light">Jemne pražená</option>
                  <option value="medium">Stredne pražená</option>
                  <option value="dark">Tmavo pražená</option>
                </select>
              </div>
              <div class="col-md-12">
                <label for="water_amount" class="form-label" style="color: <?php echo $color; ?>">Množstvo vody (ml)</label>
                <input type="number" class="form-control"
                  style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>" id="water_amount"
                  name="water_amount" required>
                <div class="invalid-feedback">
                  Prosím, zadajte množstvo vody.
                </div>
              </div>
              <div class="col-md-12">
                <label for="coffee_amount" class="form-label" style="color: <?php echo $color; ?>">Množstvo kávy (g)</label>
                <input type="number" class="form-control"
                  style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>" id="coffee_amount"
                  name="coffee_amount" required>
                <div class="invalid-feedback">
                  Prosím, zadajte množstvo kávy.
                </div>
              </div>
              <div class="col-md-12">
                <label for="recipe_name" class="form-label" style="color: <?php echo $color; ?>">Názov receptu</label>
                <input type="text" class="form-control"
                  style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>" id="recipe_name"
                  name="recipe_name" required>
                <div class="invalid-feedback">
                  Prosím, zadajte názov receptu.
                </div>
              </div>
              <div class="col-12 text-center ">
                <?php if (isset($_GET['rec_error'])) {
                  echo '<div class="alert alert-danger" role="alert">' . $_GET['rec_error'] . '</div>';
                } ?>
              </div>
              <div class="col-12 text-center">
                <button type="submit" name="submit" class="btn btn-primary-custom btn-lg">Pridať Recept</button>
              </div>
            </form>
          </div>
        </div>
      </div>  
      <!-- zobrazenie receptov  -->
      <div class="row justify-content-center mt-5">
    <div class="col-lg-8">
        <div class="recipe-display p-5" style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
            <h2 class="text-center mb-4" style="color: <?php echo $color; ?>">Váš Nový Recept</h2>
            <div id="displayRecipe">
            </div>
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