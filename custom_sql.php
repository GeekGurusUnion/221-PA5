<!-- <head> -->
<?php include "header.php";?>
<!-- </head> -->
<!-- <body> -->
    <div id="loader" class="w-100 position-absolute h-100">
    </div> 
    <script>
        var sqlQuery = "SELECT * FROM Wine";
        XMLRequest(sqlQuery);
    </script>  
    <div class="container m-4 text-white overflow-auto">
        <div class="input-group mb-3">
            <input id="query" type="text" class="form-control bg-dark text-white">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button" onclick="xmlreq()">Execute SQL Query</button>
            </div>
        </div>
        <div id="table-container" class="table-responsive table-condensed" ></div>
    </div>

    <script>
        var value = "SELECT * FROM Wine";
        var q = document.getElementById('query');
        q.value = value;
    
        q.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                XMLRequest(q.value);
            }
        });

        function xmlreq() {
            XMLRequest(q.value);
        }
    </script>

    

<!-- </body> -->
<?php include "footer.php";?>