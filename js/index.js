function formBuilder(res) {
    console.log(res);
    var inputFields = Object.keys(res[0]);
    console.log(inputFields);
    var container = document.getElementById('form');
    container.innerHTML = "<div class='col-md-4'><label for='form-select' class='form-label text-warning'>Select type of SQL Query</label><select id='form-select' class='form-select' aria-label='Default select example'><option selected>Select Operation</option><option value='INSERT'>INSERT</option><option value='UPDATE'>UPDATE</option><option value='DELETE'>DELETE</option></select></div>";
    for (var i = 0; i < inputFields.length; i++) {
        container.innerHTML += "<div class='col-md-4'><label for='" + inputFields[i] + "' class='form-label'>" + inputFields[i] + "</label><input type='text' class='form-control' id='" + inputFields[i] + "'></div>";
    }
    container.innerHTML += "<div class='col-12'><button type='submit' class='btn btn-primary'>QUERY</button></div>";
} 

function filterBuilder(res) {
    // console.log(res);
    var inputFields = Object.keys(res[0]);
    // console.log(inputFields);
    var container = document.getElementById('filter-select');
    $('#filter-select').prop('disabled', false);
    $('#filter-select').removeClass('bg-secondary');
    for (var i = 0; i < inputFields.length; i++) {
        container.innerHTML += "<option value='" + inputFields[i] + "'>" + inputFields[i] + "</option>";
    }
} 

function loadForm() {
    var table = document.getElementById('table-select');
    var str = "SELECT * FROM " + table.value;
    XMLRequest(str, false, false)
    .then(formBuilder)
    .catch(function(error) {
      console.error(error);
      // Handle the error here
    });
    // var inputFields = Object.keys(obj);
    // console.log(inputFields);
} 

function loadAttributes() {
    var table = document.getElementById('table-select');
    var str = "SELECT * FROM " + table.value;
    XMLRequest(str, false)
    .then(filterBuilder)
    .catch(function(error) {
      console.error(error);
      // Handle the error here
    });
}

function loadList() {
    var table = document.getElementById('table-select');
    var filter = document.getElementById('filter-select');
    var order = document.querySelector('input[name="order-by"]:checked').value;
    var str = "SELECT * FROM " + table.value + " ORDER BY " + filter.value + " " + order;
    console.log(str);
    $('#filter').html("<div class='d-flex'>SQL query successfully sent to server:<br>" + str + '</div><button type="button" class="btn btn-success btn-sm" onclick="window.location.reload();"><i class="fa fa-refresh"></i> Refresh</button>');
    $('#filter').addClass('monospace');
    $('#filter').addClass('text-success');
    XMLRequest(str, false)
    .then(JSONtoTable)
    .catch(function(error) {
      console.error(error);
      // Handle the error here
    });
}