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
session_start();
include './components/darkmode.php';
?>

<body style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
  <header>
    <!-- navbar-->
    <?php
    $page = 'recepty.php';
    include './components/header.php';
    include "./classes/config.php";
    include "./classes/recipe.classes.php";
    include "./classes/recipe-contr.classes.php";
    ?>
  </header>

  <main>
   <!-- darkmode JS link--> 
  <script src="./js/darkmode.js"></script>
  <div class="image-bar2">
      <div class="image-overlay3"></div>
      <div class="image-bar-text">
        <h1 class="display-3 fw-normal text-capitalize">Vytvorte si vlastný recept</h1>
        <p class="lead fw-normal">Máte otázky ohľadom kávy? Neváhajte a kontaktujte nás.</p>
      </div>
    </div>
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
        <!-- Volba receptu -->
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
                <label for="coffee_amount" class="form-label" style="color: <?php echo $color; ?>">Množstvo kávy
                  (g)</label>
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
        <?php
        if (isset($_SESSION['userid'])) {
          echo "User ID: " . $_SESSION['userid'];
        } else {
          echo "User ID session variable is not set.";
        }
        ?>
        <div class="col-lg-8">
          <div class="recipe-display p-5"
            style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
            <h2 class="text-center mb-4" style="color: <?php echo $color; ?>">Váš Nový Recept</h2>
            <div id="displayRecipe">
              <?php
              $userId = $_SESSION['userid'];
              $recipeObj = new Recipe();
              $getrecipes = $recipeObj->getRecipe($userId);
              if ($getrecipes) {
                echo '<div class="recipe-list">';
                foreach ($getrecipes as $recipe) {
                  echo '<div class="recipe-item">';
                  echo '<h3>' . $recipe['recipe_name'] . '</h3>';
                  echo '<p><strong>Roast Type:</strong> ' . $recipe['roast_type'] . '</p>';
                  echo '<p><strong>Water Amount:</strong> ' . $recipe['water_amount'] . ' ml</p>';
                  echo '<p><strong>Coffee Amount:</strong> ' . $recipe['coffee_amount'] . ' g</p>';
                  echo '</div>';
                }
                echo '</div>';
              } else {
                echo '<p>No recipes found.</p>';
              }
              ?>
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