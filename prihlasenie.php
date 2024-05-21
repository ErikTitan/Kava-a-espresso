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
    $page = 'login.php';
    include './components/header.php';
    ?>
  </header>

  <main>
   <!-- darkmode JS link--> 
  <script src="./js/darkmode.js"></script>
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
        <!-- registracia -->
        <div class="col-lg-4 pb-sm-5 mb-4 mb-sm-0">
            <div class="custom-form p-5" style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
            <h1 class="form-title fw-semi-bold text-center mb-4" style="color: <?php echo $color; ?>">Registrácia</h1>
            <form id="myForm" action="includes/signup.inc.php" method="post" class="row g-3 needs-validation" novalidate>
              <div class="col-md-12">
                <label for="username" class="form-label" style="color: <?php echo $color; ?>">Používateľské meno</label>
                <input type="text" class="form-control"
                  style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>" id="username"
                  name="uid" required>
                <div class="invalid-feedback">
                  Prosím, vyplňte používateľské meno.
                </div>
              </div>
              <div class="col-md-12">
                <label for="password" class="form-label" style="color: <?php echo $color; ?>">Heslo</label>
                <input type="password" class="form-control"
                  style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>" id="password"
                  name="pwd" required>
                <div class="invalid-feedback">
                  Prosím, vyplňte heslo.
                </div>
              </div>
              <div class="col-md-12">
                <label for="confirm_password" class="form-label" style="color: <?php echo $color; ?>">Potvrďte
                  heslo</label>
                <input type="password" class="form-control"
                  style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>" id="confirm_password"
                  name="pwdrepeat" required>
                <div class="invalid-feedback">
                  Prosím, potvrďte heslo.
                </div>
              </div>
              <div class="col-md-12">
                <label for="email" class="form-label" style="color: <?php echo $color; ?>">Email</label>
                <input type="email" class="form-control"
                  style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>" id="email"
                  name="email" required>
                <div class="invalid-feedback">
                  Prosím, zadajte platný email.
                </div>
              </div>
              <div class="col-12 text-center">
                <?php if (isset($_GET['reg_error'])) {
                  echo '<div class="alert alert-danger" role="alert">' . $_GET['reg_error'] . '</div>';
                } ?>
              </div>
              <div class="col-12 text-center">
                <button type="submit" name="submit" class="btn btn-primary-custom btn-lg">Registrovať</button>
              </div>
            </form>
          </div>
        </div>
        <!-- prihlasenie -->
        <div class="col-lg-4">
          <div class="custom-form p-5" style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
            <h1 class="form-title fw-semi-bold text-center mb-4" style="color: <?php echo $color; ?>">Prihlásenie</h1>
            <form id="loginForm" action="includes/login.inc.php" method="post" class="row g-3 needs-validation"
              novalidate>
              <div class="col-md-12">
                <label for="login_username" class="form-label" style="color: <?php echo $color; ?>">Používateľské
                  meno</label>
                <input type="text" class="form-control"
                  style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>" id="login_username"
                  name="uid" required>
                <div class="invalid-feedback">
                  Prosím, vyplňte používateľské meno.
                </div>
              </div>
              <div class="col-md-12">
                <label for="login_password" class="form-label" style="color: <?php echo $color; ?>">Heslo</label>
                <input type="password" class="form-control"
                  style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>" id="login_password"
                  name="pwd" required>
                <div class="invalid-feedback">
                  Prosím, vyplňte heslo.
                </div>
              </div>
              <div class="col-12 text-center ">
                <?php if (isset($_GET['log_error'])) {
                  echo '<div class="alert alert-danger" role="alert">' . $_GET['log_error'] . '</div>';
                } ?>
              </div>
              <div class="col-12 text-center">
                <button type="submit" name="submit" class="btn btn-primary-custom btn-lg">Prihlásiť</button>
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