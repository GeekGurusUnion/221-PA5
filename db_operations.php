    <!-- <head> -->
    <?php include "header.php";?>
    <!-- </head> -->
    <!-- <body> -->
    <h3>Database Operations</h3>
    <div class="row g-3">
    <div class="col-md-3">
        <select id="table-select" class="form-select" aria-label="Default select example">
            <option selected>Select Table</option>
            <option value="User">User</option>
            <option value="Winery">Winery</option>
            <option value="Wine">Wine</option>
            <option value="Review">Review</option>
        </select>
    </div>
        <div class="col-md-3">
            <button class="btn btn-primary" type="submit" onclick="loadForm()">Load Form <i class="fas fa-check"></i></button>
        </div>
    </div>

    <div id="form-container" class="overflow-scroll">
        <form id="form" class='row g-3 m-2'></form>
    </div>
    
    <!-- </body> -->
    <?php include "footer.php";?>