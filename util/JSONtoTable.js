function JSONtoTable(obj, functions) {
    // console.log(functions);
    let container = $('#table-container');
    if (functions === true || functions === 2) {
        $('#table-container').html('<div class="d-flex w-100 justify-content-end mb-3 gap-3"><div><button type="button" onclick="XMLRequest(sqlQuery, true, func)" class="btn btn-danger btn-sm mr-3"><i class="fa fa-undo"></i> Revert Changes</button></div><div><button type="button" class="btn btn-success btn-sm" id="confirmBtn" ><i class="fas fa-check"></i> Confirm Changes</button></div></div>');
    }
    $('#table').remove();
    // $('#table').html('');

    let table = $('<table>');
    table.addClass('table');
    table.addClass('table-bordered');
    table.attr('id', 'table');
    table.addClass('table-dark');
    // console.log(obj);
    var columns = Object.keys(obj[0]);
    // console.log(columns);

    let thead = $("<thead>");
    $(thead).addClass('thead-light');
    $(thead).addClass('text-warning');
    let tr = $("<tr>");
    for (var i = 0; i < columns.length; i++) {
        let th = $("<th>");
        th.attr('scope', 'col');
        th.text(columns[i]);
        tr.append(th);
    }
    if (functions === true) {
        let th = $("<th>");
        th.attr('colspan', '2');
        th.text('Functions');
        tr.append(th);
    } else if (functions === 2) {
        let th = $("<th>");
        th.attr('colspan', '2');
        th.text('Review');
        tr.append(th);
    }
    thead.append(tr);

    table.append(thead);

    let tbody = $("<tbody>");
    $.each(obj, function(x, item){
        let tr = $("<tr>");
        tr.attr('id', 'tr' + x);
        let vals = Object.values(item);
        // console.log(vals);
        $.each(vals, (x, elem) => {
            let td = $("<td>");
            if (x === 0) {
                td.attr('scope', 'row');
            }
            td.text(elem);
            tr.append(td);
            });
        var functionsArr = [
            '<button type="button" class="btn btn-warning btn-sm" onclick="editRow(' + x + ')"><i class="fas fa-pen"></i></button>',
            '<button type="button" class="btn btn-danger btn-sm" onclick="deleteRow(' + x + ')"><i class="fas fa-trash"></i></button>',
            '<button type="button" class="btn btn-success btn-sm" onclick="rateRow(' + x + ')"><i class="fas fa-star"></i> Rate this wine</button>'
        ]
        if (functions === true) {
            for (var i = 0; i < 2; i++) {
                let td = $("<td>");
                td.attr('id', x);
                td.html(functionsArr[i]);
                tr.append(td);
            }
            // td.text('Functions');
            // tr.append(td);
        } else if (functions === 2) {
            let td = $("<td>");
            td.attr('id', x)
            td.html(functionsArr[2]);
            tr.append(td);
        }
        tbody.append(tr);
    });


    table.append(tbody);

    container.append(table);
}

// functions
function editRow(elem) {
    // console.log(elem);
    var tr = '#tr' + elem;
    $('#tr' + elem).addClass("table-warning");
    $('#tr' + elem + ' td').each(function() {
        // console.log($(this).attr("id"));
        // console.log(elem);
        if($(this).attr("id") != elem) {
            $(this).attr('contenteditable', 'true');
        }
    });
    $('#table #tr' + elem).each(function() {
        // console.log($(this).attr("id"));
        // console.log(tr.slice(1));
        // console.log($(this).attr("id") != tr.slice(1));
        if ($(this).attr("id") != tr.slice(1)) {
            $(this).removeClass("table-warning");
        }
    });
}
function deleteRow(elem) {
    var tr = '#tr' + elem;
    $('#tr' + elem).addClass("table-danger");
    $('#tr' + elem + ' td').each(function() {
        // console.log($(this).attr("id"));
        // console.log(elem);
        if($(this).attr("id") != elem) {
            $(this).attr('contenteditable', 'true');
        }
    });
    $('#table #tr' + elem).each(function() {
        // console.log($(this).attr("id"));
        // console.log(tr.slice(1));
        // console.log($(this).attr("id") != tr.slice(1));
        if ($(this).attr("id") != tr.slice(1)) {
            $(this).removeClass("table-danger");
        }
    });
}
function rateRow(elem) {
    var tr = '#tr' + elem;
    $('#tr' + elem).addClass("table-success");
    $('#tr' + elem + ' td').each(function() {
        // console.log($(this).attr("id"));
        // console.log(elem);
        if($(this).attr("id") != elem) {
            $(this).attr('contenteditable', 'true');
        }
    });
    $('#table #tr' + elem).each(function() {
        // console.log($(this).attr("id"));
        // console.log(tr.slice(1));
        // console.log($(this).attr("id") != tr.slice(1));
        if ($(this).attr("id") != tr.slice(1)) {
            $(this).removeClass("table-success");
        }
    });

}

function XMLRequest(q, createTable, functions, callback) {
    return new Promise(function(resolve, reject) {
        var sqlQuery = JSON.stringify({
            "sql": q
        });

        // console.log(sqlQuery);
        // console.log(createTable);

        var result;

        $('#loader').removeClass('d-none');
        $('#loader').html(
            '<div class="h-100 d-flex align-items-center justify-content-center position-absolute w-100"><button class="btn btn-primary" type="button"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Retrieving from Server...</button></div>'
        );

        
        const xhr = new XMLHttpRequest();
        xhr.withCredentials = true;
        // xhr.addEventListener("readystatechange", function () {
        xhr.onload = function() {
            if (this.readyState === 4) {
                if (this.status === 200) {
                    $('#loader').empty();
                    $('#loader').hide();
                    // console.log(this.responseText);
                    const obj = JSON.parse(this.responseText);
                    var res = obj.data;
                    res = JSON.stringify(res);
                    res = JSON.parse(res);
                    // console.log(res);
                    if (createTable) {
                        JSONtoTable(res, functions);
                    } else {
                        resolve(res);
                    }
                }
                else {
                    $('#table').html('<span class="text-danger">No data received. Check SQL syntax for possible errors.</span>');
                    $('#loader').empty();
                    $('#loader').hide();
                    reject(xhr.statusText);
                }
            }
        };
        xhr.onerror = function() {
            reject(xhr.statusText);
        };
        $('#loader').show();
        $('#table').empty();
        $('#loader').html(
            '<div class="h-100 d-flex align-items-center justify-content-center position-absolute w-100"><button class="btn btn-primary" type="button"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Retrieving from Server...</button></div>'
        );
        xhr.open("POST", "./util/miniAPI.php", true);
        xhr.send(sqlQuery);
    });
}