    <!-- <head> -->
<?php include "header.php";?>
    <!-- </head> -->
    <!-- <body> -->
<div class="container m-4">
    <h3 class="text-white m-4">
        Welcome to the Wine Tourism Dashboard
    </h3>
    <div class="row my-4">
        <div class="col-lg">
            <div class="card-body bg-dark text-white rounded border border-secondary p-4 h-100">
                <h5 class="card-title"><i class="fas fa-user"></i> Manage Users</h5>
                <p class="card-text text-secondary mt-2">Control user accounts and permissions.</p>
                <a href="./manage_users.php" class="btn btn-primary">Manage</a>
            </div>
        </div>
        <div class="col-lg">
            <div class="card-body bg-dark text-white rounded border border-secondary p-4 h-100">
                <h5 class="card-title"><i class="fas fa-wine-glass-alt"></i> Manage Wineries</h5>
                <p class="card-text text-secondary mt-2">Handle winery profiles, including details, images, locations, and ratings.</p>
                <a href="./manage_winery.php" class="btn btn-primary">Manage</a>
            </div>
        </div>
        <div class="col-lg">
            <div class="card-body bg-dark text-white rounded border border-secondary p-4 h-100">
                <h5 class="card-title"><i class="fas fa-wine-bottle"></i> Manage Wines</h5>
                <p class="card-text text-secondary mt-2">Add, edit, and organize wine information, such as type, vintage, and tasting notes.</p>
                <a href="./manage_wines.php" class="btn btn-primary">Manage</a>
            </div>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-lg">
            <div class="card-body bg-dark text-white rounded border border-secondary p-4 h-100">
                <h5 class="card-title"><i class="fas fa-filter"></i> Filters</h5>
                <p class="card-text text-secondary mt-2">Refine search results and data views with powerful filtering capabilities for precise information retrieval.</p>
                <a href="./filters.php" class="btn btn-primary">Apply</a>
            </div>
        </div>
        <div class="col-lg">
            <div class="card-body bg-dark text-white rounded border border-secondary p-4 h-100">
                <h5 class="card-title"><i class="fas fa-cog"></i> Database Operations</h5>
                <p class="card-text text-secondary mt-2">Keep your database up-to-date with the latest information.</p>
                <a href="./db_operations.php" class="btn btn-primary">Update</a>
            </div>
        </div>
        <div class="col-lg">
            <div class="card-body bg-dark text-white rounded border border-secondary p-4 h-100">
                <h5 class="card-title"><i class="fas fa-map-marker-alt"></i> Destination Suggestion</h5>
                <p class="card-text text-secondary mt-2">Get personalized wine destination recommendations based on your preferences and desired experiences.</p>
                <a href="./location_sugg.php" class="btn btn-primary">Explore</a>
            </div>
        </div>
    </div>
</div>    
<?php include "footer.php";?>
