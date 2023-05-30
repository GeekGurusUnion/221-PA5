<!-- <head> -->
<?php include "header.php";?>
<!-- </head> -->
<!-- <body> -->
<h3>Filters</h3>
<div class="row g-3 mb-3">
    <div id="filter" class="col-md-6 g-3">
        <div>
            <label for="table-select">Select a Table:</label>
            <select id="table-select" class="form-select" onchange="loadAttributes()">
                <option selected>Select Table</option>
                <?php if (!$_COOKIE['client'] || $_COOKIE['client'] == 'false') { ?>
                    <option value="User">User</option>
                <?php } ?>
                <option value="Winery">Winery</option>
                <option value="Wine">Wine</option>
                <option value="Review">Review</option>
            </select>
        </div>
        <div>
            <label for="filter-select">Sort by:</label>
            <select id="filter-select" class="form-select bg-secondary" disabled>
                <option selected>Select Filter</option>
            </select>
        </div>
        <div class="mt-3">
            <label for="rgp">Order by:</label><br>
            <radiogroup id="rgp">
                <input type="radio" id="asc" name="order-by" value="ASC">
                <label for="asc">ASC</label>
                <input type="radio" id="desc" name="order-by" value="DESC">
                <label for="desc">DESC</label>
            </radiogroup>
        </div>
        <div class="mt-3">
            <button class="btn btn-primary" type="submit" onclick="loadList()">Load List <i class="fas fa-check"></i></button>
        </div>
        <div class="mt-5">
            <h5>Special Filter Operations</h5>
            <div class="d-flex gap-3 m-1">
                <input type='text' class='form-control' id='input-country-code' placeholder="Enter Winery ID">
                <button class="btn btn-primary col-md-7" type="submit" onclick="loadList()">Load all Wines from Winery ID</button>
            </div>
            <div class="d-flex gap-3 m-1">
                <input type='text' class='form-control' id='input-country-code' placeholder="Enter Country Code">
                <button class="btn btn-primary col-md-7" type="submit" onclick="loadList()">Load all Wineries in Country Code</button>
            </div>
            <div class="d-flex gap-3 m-1">
                <input type='text' class='form-control' id='input-country-code' placeholder="...">
                <button class="btn btn-secondary col-md-7" type="submit" onclick="loadList()">Add yours</button>
            </div>
        </div>
    </div>
</div>

<div id="table-container" class="table table-responsive table-condensed w-100 justify-content-center"></div>

<!-- </body> -->
<?php include "footer.php";?>