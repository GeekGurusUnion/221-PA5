<!-- <head> -->
<?php include "header.php";?>
<!-- </head> -->
<!-- <body> -->

<h3>Review a Wine</h3>
<script>
        var sqlQuery = "SELECT Name, Rating FROM Wine";
        var func = 2;
        XMLRequest(sqlQuery, true, func);
    </script>  
    <div class="overflow-auto">
        <div id="table-container" class="table table-responsive table-fit table-condensed w-100 justify-content-center">
        </div>
    </div>

<!-- </body> -->
<?php include "footer.php";?>