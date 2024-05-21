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

if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
    header("Location: prihlasenie.php");
    exit();
}
include './components/darkmode.php';
include './classes/config.php';
include './classes/admin.classes.php';

$admin = new Admin();
$users = $admin->fetchUsers();
?>

<body style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
    <header>
        <!-- navbar-->
        <?php
        $page = 'thankyou.php';
        include './components/header.php';
        ?>
    </header>

    <main>
        <!-- darkmode JS link-->
        <script src="./js/darkmode.js"></script>
        <div class="container my-5">
            <h1>Admin Panel</h1>
            <table class="table table-striped">
                <thead >
                    <tr >
                        <th>ID</th>
                        <th>Meno</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th>Vymazať</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo ($user['users_id']); ?></td>
                            <td><?php echo ($user['users_uid']); ?></td>
                            <td><?php echo ($user['users_email']); ?></td>
                            <td><?php echo ($user['admin']); ?></td>
                            <td>
                                <?php if ($user['admin'] == 0): ?>
                                    <a href="includes/user-delete.inc.php?id=<?= $user['users_id']; ?>"
                                        class="btn btn-danger">Delete</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
    <footer>
        <?php include './components/footer.php'; ?>
    </footer>
</body>

</html>