<!-- <head> -->
<?php include "header.php";?>
<!-- </head> -->
<!-- <body> -->

<h3>Review a Wine</h3>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
        var sqlQuery = "SELECT Wines.Name, AVGReviews.avgrating, Wines.Winery_id \
    FROM ( \
        SELECT Wine_id,  AVG(rating) as avgrating \
        FROM Review \
        GROUP BY Wine_id \
    ) as AVGReviews \
    INNER JOIN ( \
        SELECT Wine_id, Name, Winery_id \
        FROM Wine \
        GROUP BY Wine_id, Winery_id \
    ) as Wines ON AVGReviews.Wine_id = Wines.Wine_id";
        var func = 2;
        XMLRequest(sqlQuery, true, func);
    </script>  
    <div class="overflow-auto">
        <div id="table-container" class="table table-responsive table-fit table-condensed w-100 justify-content-center">
        </div>
    </div>
    <div class="modal fade" id="narratModal" tabindex="-1" role="dialog" aria-labelledby="narratModalLabel" aria-hidden="true">
        <div class="modal-dialog bg-dark">
            <div class="modal-content bg-dark">
            <div class="modal-header">
                <h4 class="modal-title modal_head" id="narratModalLabel">Rate {this wine}</h4>
                <button type="button" class="close btn btn-danger cash-dismiss" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <button type="button" class="btn btn-danger cashmodal_btn" id="narrat_ok" data-dismiss="modal">1</button>
                <button type="button" class="btn btn-danger cashmodal_btn" id="narrat_ok" data-dismiss="modal">2</button>
                <button type="button" class="btn btn-warning cashmodal_btn" id="narrat_ok" data-dismiss="modal">3</button>
                <button type="button" class="btn btn-success cashmodal_btn" id="narrat_ok" data-dismiss="modal">4</button>
                <button type="button" class="btn btn-success cashmodal_btn" id="narrat_ok" data-dismiss="modal">5</button>
            </div>
            </div>
        </div>
    </div>

<!-- </body> -->
<?php include "footer.php";?>