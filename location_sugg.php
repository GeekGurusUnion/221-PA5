<!-- <head> -->
<?php include "header.php";?>
<!-- </head> -->
<!-- <body> -->
<h3>Destination Suggestions</h3>
<div class="row g-3 align-items-end">
    <div class='col-md-4'><label for='input-country-code' class='form-label'>Enter Your Country Code</label><input type='text' class='form-control' id='input-country-code'></div>
    <div class="col-md-3">
        <button class="btn btn-primary" type="submit" onclick="loadDistances()">Load Suggestions <i class="fas fa-magnifying-glass-location"></i></button>
    </div>
</div>
<!-- Enter country code, search through distances.csv array and sort by distances and then by rating -->
<div id="distances">
    <div id="best-location" class='m-4'>
    </div>
    <div id="other-locations" class='m-4'>
    </div>
</div>
<!-- <script src="https://unpkg.com/@usecsv/js/build/index.umd.js"></script> -->
<script src="./js/location.js"></script>
<!-- </body> -->
<?php include "footer.php";?>