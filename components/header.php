<nav class="navbar navbar-expand-lg navbar-dark <?php if ($page == 'thankyou.php' || $page == 'login.php') echo 'sticky-top'; else echo 'fixed-top' ?>"
    <?php if ($page == 'thankyou.php' || $page == 'login.php') echo 'style="background-color: rgb(119, 107, 93);"' ?>>
        <div class="container">
            <a class="navbar-brand" href="#"><img src="./img/logo.png" height="40px" width="40px" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto nav-underline">
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 'index.php') echo 'active'; ?>" href="<?php if ($page == 'index.php') echo '#'; else echo 'index.php'; ?>">Domov</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 'otazky.php') echo 'active'; ?>" href="<?php if ($page == 'otazky.php') echo '#'; else echo 'otazky.php'; ?>">Otázky</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 'galeria.php') echo 'active'; ?>" href="<?php if ($page == 'galeria.php') echo '#'; else echo 'galeria.php'; ?>">Galéria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 'kontakt.php') echo 'active'; ?>" href="<?php if ($page == 'kontakt.php') echo '#'; else echo 'kontakt.php'; ?>">Kontakt</a>
                </li>
                <?php
                if (isset($_SESSION['userid'])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($page == 'recepty.php') echo 'active'; ?>" href="<?php if ($page == 'recepty.php') echo '#'; else echo 'recepty.php'; ?>">Recepty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="includes/logout.inc.php">Odhlásiť sa</a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($page == 'recepty.php') echo 'active'; ?>" href="<?php if ($page == 'recepty.php') echo '#'; else echo 'prihlasenie.php'; ?>">Recepty</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link <?php if ($page == 'login.php') echo 'active'; ?>" href="prihlasenie.php">Registrácia</a>
                    </li>
                    <?php
                }
                ?>
                <!--dark mode checkbox-->
                <li class="switch-container">
                    <label class="switch">
                        <input type="checkbox" id="toggleTheme" <?php if ($_COOKIE["theme"] == "dark") { echo "checked";} ?>>
                        <span class="slider round"></span>
                    </label>
                </li>
            </ul>
        </div>
    </div>
</nav>