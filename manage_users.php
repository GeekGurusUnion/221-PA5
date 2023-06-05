<!-- <head> -->
<?php include "header.php";?>
<!-- </head> -->
<!-- <body> -->
<h3>Manage Users</h3>
<script>
        var sqlQuery = "SELECT * FROM User";
        var func = true;
        XMLRequest(sqlQuery, true, func);
    </script>  
        <div id="table-container" class="table table-fit table-condensed justify-content-center">
        </div>
<!-- </body> -->
<script src="js/manage_users.js"></script>
<?php include "footer.php";?>