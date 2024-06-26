<!DOCTYPE html>
<html lang="en" class="h-100">

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
session_start();
include './components/darkmode.php';
?>

<body class="d-flex flex-column h-100" style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
    <header>
        <!-- navbar-->
        <?php
    $page = 'thankyou.php';
    include './components/header.php';
    ?>
    </header>
    <main class="flex-shrink-0 position-absolute top-50 start-50 translate-middle w-100">
     <!-- darkmode JS link--> 
    <script src="./js/darkmode.js"></script>

        <div class=" justify-content-center align-items-center">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="custom-form p-5 text-center" style="background-color: <?php echo $background;?>; color: <?php echo $color;?>" >
                        <h1 class="form-title mb-4" style = "color: <?php echo $color;?>">Ďakujeme!</h1>
                        <p class="lead">Ďakujeme vám za vyplnenie formulára. Čoskoro sa vám ozveme.</p>
                        <p>Pre ďalšie otázky nás môžete kontaktovať:</p>
                        <p class="mb-1"><a href="mailto:info@dobrakava.com" style="text-decoration: none; color: #5e3c28;">info@dobrakava.com</a></p>
                        <p><a href="tel:+0949876899" style="text-decoration: none; color: #5e3c28;">+0949876899</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>


    </main>
    <!--footer-->

    <footer class="mt-auto">

    <?php include './components/footer.php';?>

    </footer>
</body>

</html>