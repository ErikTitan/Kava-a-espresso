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
    <div class="image-overlay4"></div>
    <div class="image-bar-text">
      <h1 class="display-3 fw-normal text-capitalize">Vytvorte si vlastný recept</h1>
      <p class="lead fw-normal">Vytvorte a sledujte svoje vlastné kávové recepty. Urobte si kávu presne podľa svojich predstáv.</p>
    </div>
  </div>
  <div class="container my-5 py-5">
    <div class="row justify-content-center">
    <div class="col-12 text-center mb-5">
        <h1 class="display-4 fw-bold">Vitajte, <?= $_SESSION['useruid']; ?>!</h1>
      </div>
      <!-- zobrazenie receptov  -->
      <div class="col-lg-4">
        <div class="custom-form p-5 mb-4" style="background-color: <?= $background; ?>; color: <?= $color; ?>">
            <h2 class="form-title fw-semi-bold text-center mb-4" style="color: <?= $color; ?>">Vaše Recepty</h2>
            <div id="displayRecipe">
              <?php
              $userId = $_SESSION['userid'];
              $recipeObj = new Recipe();
              $getrecipes = $recipeObj->getRecipe($userId);
              if ($getrecipes) {
                ?>
                <div class="recipe-list">
                  <?php foreach ($getrecipes as $recipe) { ?>
                    <div class="recipe-item p-3 mb-3 border rounded">
                      <div class="recipe-details">
                        <h4><?= $recipe['recipe_name']; ?></h4>
                        <p><strong>Typ praženia:</strong> <?= $recipe['roast_type']; ?></p>
                        <p><strong>Množstvo vody:</strong> <?= $recipe['water_amount']; ?> ml</p>
                        <p><strong>Množstvo kávy:</strong> <?= $recipe['coffee_amount']; ?> g</p>
                        <a href="#" class="mt-2 btn btn-outline-dark btn-sm me-2 edit-recipe" style="color: <?= $color; ?>"><i class="bi bi-pencil"></i> Upraviť</a>
                        <a href="includes/recipe-delete.inc.php?id=<?= $recipe['recipe_id']; ?>" class="mt-2 btn btn-outline-dark btn-sm delete-recipe" style="color: <?= $color; ?>"><i class="bi bi-trash"></i> Odstrániť</a>
                      </div>
                      <form class="edit-form" action="includes/recipe-update.inc.php" method="post" style="display: none;">
                        <input type="hidden" name="recipe_id" value="<?= $recipe['recipe_id']; ?>">
                        <div class="mb-3">
                          <label for="recipe_name_<?= $recipe['recipe_id']; ?>" class="form-label">Názov receptu</label>
                          <input type="text" class="form-control" id="recipe_name_<?= $recipe['recipe_id']; ?>" name="recipe_name" value="<?= $recipe['recipe_name']; ?>">
                        </div>
                        <div class="mb-3">
                          <label for="roast_type_<?= $recipe['recipe_id']; ?>" class="form-label">Typ praženia</label>
                          <select class="form-select" id="roast_type_<?= $recipe['recipe_id']; ?>" name="roast_type">
                            <option value="light" <?= ($recipe['roast_type'] == 'light') ? 'selected' : ''; ?>>Jemne pražená
                            </option>
                            <option value="medium" <?= ($recipe['roast_type'] == 'medium') ? 'selected' : ''; ?>>Stredne pražená
                            </option>
                            <option value="dark" <?= ($recipe['roast_type'] == 'dark') ? 'selected' : ''; ?>>Tmavo pražená
                            </option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="water_amount_<?= $recipe['recipe_id']; ?>" class="form-label">Množstvo vody (ml)</label>
                          <input type="number" class="form-control" id="water_amount_<?= $recipe['recipe_id']; ?>" name="water_amount" value="<?= $recipe['water_amount']; ?>">
                        </div>
                        <div class="mb-3">
                          <label for="coffee_amount_<?= $recipe['recipe_id']; ?>" class="form-label">Množstvo kávy (g)</label>
                          <input type="number" class="form-control" id="coffee_amount_<?= $recipe['recipe_id']; ?>" name="coffee_amount" value="<?= $recipe['coffee_amount']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Uložiť</button>
                        <a href="#" class="btn btn-secondary cancel-edit">Zrušiť</a>
                      </form>
                    </div>
                  <?php } ?>
                </div>
                <?php
              } else {
                echo '<p>Neboli nájdené žiadne recepty.</p>';
              }
              ?>
            </div>
          </div>
        </div>
        <!-- Volba receptu -->
        <div class="col-lg-4">
          <div class="custom-form p-5" style="background-color: <?= $background; ?>; color: <?= $color; ?>">
            <h1 class="form-title fw-semi-bold text-center mb-4" style="color: <?= $color; ?>">Vytvoriť Recept</h1>
            <form id="recipeForm" action="includes/recipe.inc.php" method="post" class="row g-3" novalidate>
              <div class="col-md-12">
                <label for="roast_type" class="form-label" style="color: <?= $color; ?>">Typ praženia</label>
                <select class="form-select" id="roast_type" name="roast_type">
                  <option value="light">Jemne pražená</option>
                  <option value="medium">Stredne pražená</option>
                  <option value="dark">Tmavo pražená</option>
                </select>
              </div>
              <div class="col-md-12">
                <label for="water_amount" class="form-label" style="color: <?= $color; ?>">Množstvo vody (ml)</label>
                <input type="number" class="form-control"
                  style="background-color: <?= $background; ?>; color: <?= $color; ?>" id="water_amount" name="water_amount"  required>
                <div class="invalid-feedback">
                  Prosím, zadajte množstvo vody.
                </div>
              </div>
              <div class="col-md-12">
                <label for="coffee_amount" class="form-label" style="color: <?= $color; ?>">Množstvo kávy (g)</label>
                <input type="number" class="form-control"
                  style="background-color: <?= $background; ?>; color: <?= $color; ?>" id="coffee_amount" name="coffee_amount" required>
                <div class="invalid-feedback">
                  Prosím, zadajte množstvo kávy.
                </div>
              </div>
              <div class="col-md-12">
                <label for="recipe_name" class="form-label" style="color: <?= $color; ?>">Názov receptu</label>
                <input type="text" class="form-control"
                  style="background-color: <?= $background; ?>; color: <?= $color; ?>" id="recipe_name" name="recipe_name" required>
                <div class="invalid-feedback">
                  Prosím, zadajte názov receptu.
                </div>
              </div>
              <div class="col-12 text-center">
                <?php if (isset($_GET['rec_error'])) { ?>
                  <div class="alert alert-danger" role="alert"><?= $_GET['rec_error']; ?></div>
                <?php } ?>
              </div>
              <div class="col-12 text-center">
                <button type="submit" name="submit" class="btn btn-primary-custom btn-lg">Pridať Recept</button>
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