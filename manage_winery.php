<!-- <head> -->
<?php include "header.php";?>
<!-- </head> -->
<!-- <body> -->
<h3>Manage Wineries</h3>
<script>
        var sqlQuery = "SELECT * FROM Winery";
        var func = true;
        XMLRequest(sqlQuery, true, func);
    </script>  
    <div class="overflow-auto">
        <div id="table-container" class="table table-responsive table-condensed w-100 justify-content-center">
        </div>
    </div>
<!-- </body> -->
<script src="js/manage_winery.js"></script>
<?php include "footer.php";?>