<!-- <head> -->
<?php include "header.php";?>
<!-- </head> -->
<!-- <body> -->
<h3>Manage Wines</h3>
<script>
        var sqlQuery = "SELECT * FROM Wine";
        var func = true;
        XMLRequest(sqlQuery, true, func);
    </script>  
    <div class="overflow-auto">
        <div id="table-container" class="table table-fit table-condensed w-100 justify-content-center">
        </div>
    </div>

<!-- </body> -->
<script src="js/manage_wines.js"></script>
<?php include "footer.php";?>