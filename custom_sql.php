<!-- <head> -->
<?php include "header.php";?>
<!-- </head> -->
<!-- <body> -->
    
    <script>
        var sqlQuery = "SELECT * FROM Wine";
        XMLRequest(sqlQuery, true);
    </script>  
    <div class="overflow-auto">
        <div class="input-group mb-3">
            <input id="query" type="text" class="sql form-control bg-dark text-white">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button" onclick="xmlreq()">Execute SQL Query</button>
            </div>
        </div>
        <div id="table-container" class="table-responsive table-condensed w-100 justify-content-center">
        </div>
    </div>

    <script>
        var value = "SELECT * FROM Wine";
        var q = document.getElementById('query');
        q.value = value;
    
        q.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                XMLRequest(q.value, true);
            }
        });

        function xmlreq() {
            XMLRequest(q.value, true);
        }
    </script>

    

<!-- </body> -->
<?php include "footer.php";?>