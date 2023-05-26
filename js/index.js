function formBuilder(res) {
    console.log(res);
    var inputFields = Object.keys(res[0]);
    console.log(inputFields);
    var container = document.getElementById('form');
    container.innerHTML += "<div class='col-md-4'><label for='form-select' class='form-label text-warning'>Select type of SQL Query</label><select id='form-select' class='form-select' aria-label='Default select example'><option selected>Select Operation</option><option value='INSERT'>INSERT</option><option value='UPDATE'>UPDATE</option><option value='DELETE'>DELETE</option></select></div>";
    for (var i = 0; i < inputFields.length; i++) {
        container.innerHTML += "<div class='col-md-4'><label for='" + inputFields[i] + "' class='form-label'>" + inputFields[i] + "</label><input type='text' class='form-control' id='" + inputFields[i] + "'></div>";
    }
    container.innerHTML += "<div class='col-12'><button type='submit' class='btn btn-primary'>QUERY</button></div>";
} 

function loadForm() {
    var table = document.getElementById('table-select');
    var str = "SELECT * FROM " + table.value;
    XMLRequest(str, false)
    .then(formBuilder)
    .catch(function(error) {
      console.error(error);
      // Handle the error here
    });
    // var inputFields = Object.keys(obj);
    // console.log(inputFields);
} 