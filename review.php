<!-- <head> -->
<?php include "header.php";?>
<!-- </head> -->
<!-- <body> -->

<h3>Review a Wine</h3>
<?php 
    $user_id = $_COOKIE['user_id']
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    var user_id = "<?php echo $user_id; ?>";
    console.log(user_id);

    var sqlQuery = "SELECT\
                        Wines.Name,\
                        Winery.Name AS WineryName,\
                        ROUND(AVGReviews.avgrating,2) AS Average_Rating,\
                        ROUND(AVGConReviews.avgrating,2) AS Connoisseur_Rating,\
                        UserReview.rating AS Your_Rating\
                    FROM\
                        (\
                            SELECT\
                                Wine_id,\
                                AVG(rating) AS avgrating\
                            FROM\
                                Review\
                            GROUP BY\
                                Wine_id\
                        ) AS AVGReviews\
                    INNER JOIN\
                        (\
                            SELECT\
                                Wine_id,\
                                Name,\
                                Winery_id\
                            FROM\
                                Wine\
                            GROUP BY\
                                Wine_id,\
                                Winery_id\
                        ) AS Wines ON AVGReviews.Wine_id = Wines.Wine_id\
                    INNER JOIN\
                        Winery ON Wines.Winery_id = Winery.Winery_id\
                    LEFT JOIN\
                        (\
                            SELECT\
                                Wine_id,\
                                rating\
                            FROM\
                                Review\
                            WHERE\
                            user_id = '" + user_id + "'\
                        ) AS UserReview ON Wines.Wine_id = UserReview.Wine_id\
                    LEFT JOIN\
                        (\
                            SELECT\
                                Wine_id,\
                                AVG(rating) AS avgrating\
                            FROM\
                                Review\
                            WHERE\
                                Review_type = 'Critic'\
                            GROUP BY\
                                Wine_id\
                        ) AS AVGConReviews ON AVGConReviews.Wine_id = Wines.Wine_id";



    var func = 1;
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
                <h4 class="modal-title modal_head" id="narratModalLabel">Rate</h4>
                <button type="button" class="close btn btn-danger cash-dismiss" data-dismiss="modal" aria-label="Close" onclick="closeModal()"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <button type="button" class="btn btn-success cashmodal_btn" id="narrat_ok-1" data-dismiss="modal">1</button>
                <button type="button" class="btn btn-success cashmodal_btn" id="narrat_ok-2" data-dismiss="modal">2</button>
                <button type="button" class="btn btn-success cashmodal_btn" id="narrat_ok-3" data-dismiss="modal">3</button>
                <button type="button" class="btn btn-success cashmodal_btn" id="narrat_ok-4" data-dismiss="modal">4</button>
                <button type="button" class="btn btn-success cashmodal_btn" id="narrat_ok-5" data-dismiss="modal">5</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="narrat2Modal" tabindex="-1" role="dialog" aria-labelledby="narratModalLabel" aria-hidden="true">
    <div class="modal-dialog bg-dark">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h4 class="modal-title modal_head" id="narrat2ModalLabel">You have already rated this wine</h4>
                <button type="button" class="close btn btn-danger cash-dismiss" data-dismiss="modal" aria-label="Close" onclick="closeModal()"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

<script>
    function closeModal() {
        $('#narratModal').modal('hide');
        $('#narrat2Modal').modal('hide');
    }
</script>

<!-- </body> -->
<?php include "footer.php";?>
