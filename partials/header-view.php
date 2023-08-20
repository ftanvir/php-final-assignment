<?php require './core/functions.php';

session_start();

// dd($_SESSION['user_id']);

require_once './core/Database.php';

$config = require_once('./core/config.php');
// dd($config);

$db = new Database($config);

if(isset($_SESSION['user_id'])) {

    $id = $_SESSION['user_id'];

    $query = "SELECT * FROM students WHERE id = $id";

    $statement = $db->query($query);

    $user = $statement->fetch();

    $user['isAdmin'] ? $_SESSION['isAdmin'] = true : $_SESSION['isAdmin'] = false;
}


?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>




<body class="d-flex flex-column min-vh-100">
    <header>

        <?php
        $navbg = "bg-dark";
        if(isset($_SESSION['isAdmin'])) {
            if($_SESSION['isAdmin'] == true){
                $navbg = "bg-danger";
            }

            if($_SESSION['isAdmin'] == false){
                $navbg = "bg-dark";
            }
        }
        ?>
        <nav class="navbar navbar-expand-lg <?php echo $navbg; ?>">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href= "index.php">FarhanT</a>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <?php if($_SESSION['isAdmin'] == true){ ?>
                        <a class="navbar-brand text-light" href= "admin.php">Admin Panel</a>
                    <?php } ?>

                        <li class="nav-item ">
                            <!-- if session user id isset it shows logout -->
                            <?php if (isset($_SESSION['user_id'])) : ?>
                                <a class="nav-link text-light" aria-current="page" href="controllers/logout-controller.php">Logout</a>
                            <?php endif; ?>

                            <?php if(!isset($_SESSION['user_id'])): ?>
                                <a class="nav-link text-light" aria-current="page" href="login.php">Login</a>
                            <?php endif; ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="register.php">Registration</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

    </header>