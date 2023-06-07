<!-- <head> -->
<?php include "header.php";?>
<!-- </head> -->
<!-- <body> -->
<h3>Select a table to view:</h3><br>
<a href="./filter_wines.php" class="btn btn-primary" style="width:100px; margin-right: 10px">Wines</a>
<a href="./filter_wineries.php" class="btn btn-primary" style="width:100px; margin-right: 10px">Wineries</a>
<a href="./filter_users.php" class="btn btn-primary" style="width:100px; margin-right: 10px" id="users">Users</a>
<a href="./filter_reviews.php" class="btn btn-primary" style="width:100px">Reviews</a>
<?php if ($_COOKIE['client'] == 'true' || $_COOKIE['connoisseur'] == 'true') { ?>
    <script>
        document.getElementById("users").style.display = "none";
    </script>
<?php }  ?>

<!-- </body> -->
<?php include "footer.php";?>