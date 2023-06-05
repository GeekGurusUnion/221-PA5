<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Wine Travels</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./css/style.css" rel="stylesheet">
    <meta name="description" content="A minimalist and focused to-do app for human."/>
    <meta name=”robots” content="index, follow">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="./css/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="./css/fontawesome/css/brands.css" rel="stylesheet">
    <link href="./css/fontawesome/css/solid.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="./util/JSONtoTable.js" type="text/javascript"></script>
    </head>
    <body class="bg-dark">
        <main class="d-flex flex-nowrap">
        <div class="d-flex sidebar-sticky top-0 border border-top-0 border-bottom-0 border-left-0 border-secondary flex-column flex-shrink-0 p-3 text-bg-dark" style="height: 100vh; width: 280px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-5">Wine Travels</span>
        </a>
        <hr>
        <script>
            $(document).ready(function() {
                var pathname = window.location.pathname;
                pathname = pathname.split('/').pop();
                pathname = './' + pathname;
                // console.log(pathname);

                $('.nav-link').each(function() {
                    if ((pathname === './' && $(this).attr('href') === './index.php') || ($(this).attr('href') === pathname)) {
                        $(this).addClass('active');
                        // $(this).removeClass('text-white');
                        $(this).addClass('text-black');
                        return;
                    }
                });
            }); 

            function setClient(bool) {
                if (bool) {
                    document.cookie = "client = true";
                } else {
                    document.cookie = "client = false";
                }
            }
        </script>
        <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="./index.php" class="nav-link text-success">
                <i class="fas fa-home"></i>
            Dashboard
            </a>
        </li>
        <li>
            <a href="./location_sugg.php" class="nav-link text-success">
                <i class="fas fa-location-dot"></i>
            Destination Suggestion
            </a>
        </li>
        <li>
            <a href="./filters.php" class="nav-link text-warning">
                <i class="fas fa-filter"></i>
            Filters
            </a>
        </li>
        <li>
            <a href="./review.php" class="nav-link text-warning">
                <i class="fas fa-star"></i>
            Review Wine
            </a>
        </li>
        <?php if (!$_COOKIE['client'] || $_COOKIE['client'] == 'false') { ?>
        <li>
            <a href="./manage_users.php" class="nav-link text-success">
            <i class="fas fa-user"></i>
            Manage Users
            </a>
        </li>
        <li>
            <a href="./manage_winery.php" class="nav-link text-success">
            <i class="fas fa-wine-glass"></i>
            Manage Wineries
            </a>
        </li>
        <li>
            <a href="./manage_wines.php" class="nav-link text-success">
            <i class="fas fa-wine-bottle"></i>
            Manage Wines
            </a>
        </li>
        <li>
            <a href="./db_operations.php" class="nav-link text-warning">
            <i class="fas fa-cog"></i>  
            Database Operations
            </a>
        </li>
        <li>
            <a href="./custom_sql.php" class="nav-link text-success">
                <i class="fas fa-database"></i>
            Manual SQL Query
            </a>
        </li>
        <?php } ?>
        <li class="m-3">
            <li><h5>Guide</h5></li>
            <li class="text-success">Fully working</li>
            <li class="text-warning">Partially working</li>
            <li class="text-danger">Not implemented</li>
            <li>
                <a href="https://github.com/PA5G5/PA5/issues/18" class="">
                    <i class="fab fa-github"></i> Issue on Github
                </a>
            </li>
        </li>
        </ul>

        <hr>
        <div class="d-flex">
            <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user rounded-circle me-2" width="32" height="32"></i>
                <?php if ($_COOKIE['client'] == 'true') { ?>
                    <strong class="text-warning">Client1</strong>
                <?php } else { ?>
                    <strong class="text-warning">Manager1</strong>
                <?php } ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <!-- <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li> -->
                <li><a class="dropdown-item text-warning" href="./login.php">Login Preview</a></li>
                <li>
                <?php if ($_COOKIE['client'] == 'true') { ?>
                    <a class="dropdown-item text-warning" onclick="setClient(false)" href="./index.php">Switch to Manager View</a>
                <?php } else { ?>
                    <a class="dropdown-item text-warning" onclick="setClient(true)" href="./index.php">Switch to Client View</a>
                <?php } ?>
                </li>
                <li><a class="dropdown-item text-danger" href="#">Sign out</a></li>
            </ul>
            </div>
        </div>
    </div>
    <div id="loader" class="w-100 position-absolute h-100 d-none"></div> 
    <div class="container m-4 text-white">
    <!-- rest of <body> to be continued here -->