function JSONtoTable(obj) {
    let container = $('#table-container');

    $('#table').remove();
    let table = $('<table>');
    table.addClass('table-condensed');
    table.addClass('table');
    table.attr('id', 'table');
    table.addClass('table-dark');
    console.log(obj);
    var columns = Object.keys(obj[0]);
    console.log(columns);

    let thead = $("<thead>");
    $(thead).addClass('thead-light');
    $(thead).addClass('text-warning');
    let tr = $("<tr>");
    for (var i = 0; i < columns.length; i++) {
        let th = $("<th>");
        th.text(columns[i]);
        tr.append(th);
    }
    thead.append(tr);

    table.append(thead);

    let tbody = $("<tbody>");
    $.each(obj, function(i, item){
        let tr = $("<tr>");
        let vals = Object.values(item);
        console.log(vals);
        $.each(vals, (i, elem) => {
            let td = $("<td>");
            td.text(elem); // Set the value as the text of the table cell
            tr.append(td); // Append the table cell to the table row
            });
        table.append(tr);
    });

    table.append(tbody);

    container.append(table);
}

function XMLRequest(q) {
    var sqlQuery = JSON.stringify({
        "sql": q
    });


    const xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            // document.getElementById("result").innerHTML = this.responseText;
            $('#loader').empty();
            $('#loader').hide();
            console.log(this.responseText);
            const obj = JSON.parse(this.responseText);
            var res = obj.data;
            res = JSON.stringify(res);
            res = JSON.parse(res);
            console.log(res);
            JSONtoTable(res);
        }
    });
    $('#loader').show();
    $('#loader').html(
        '<div class="h-100 d-flex align-items-center justify-content-center position-absolute w-100"><button class="btn btn-primary" type="button"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading Results...</button></div>'
    );
    // document.getElementById('loader').style.display = "block";
    xhr.open("POST", "./util/miniAPI.php", true);
    xhr.send(sqlQuery);
}