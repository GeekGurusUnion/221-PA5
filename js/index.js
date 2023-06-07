// function formBuilder(res) {
//     console.log(res);
//     var inputFields = Object.keys(res[0]);
//     console.log(inputFields);
//     var container = document.getElementById('form');
//     container.innerHTML = "<div class='col-md-4'><label for='form-select' class='form-label text-warning'>Select type of SQL Query</label><select id='form-select' class='form-select' aria-label='Default select example'><option selected>Select Operation</option><option value='INSERT'>INSERT</option><option value='UPDATE'>UPDATE</option><option value='DELETE'>DELETE</option></select></div>";
//     for (var i = 0; i < inputFields.length; i++) {
//         container.innerHTML += "<div class='col-md-4'><label for='" + inputFields[i] + "' class='form-label'>" + inputFields[i] + "</label><input type='text' class='form-control' id='" + inputFields[i] + "'></div>";
//     }
//     container.innerHTML += "<div class='col-12'><button type='submit' class='btn btn-primary'>QUERY</button></div><div id='table-container' class='table-responsive table-condensed w-100 justify-content-center'>";
//     var sqlQuery = "SELECT * FROM Wine";
//     XMLRequest(sqlQuery, true, false);
// } 

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

// function loadForm() {
//     var table = document.getElementById('table-select');
//     var str = "SELECT * FROM " + table.value;
//     console.log(str);
//     XMLRequest(str, false, false)
//     .then(formBuilder)
//     .catch(function(error) {
//       console.error(error);
//       // Handle the error here
//     });
//     // var inputFields = Object.keys(obj);
//     // console.log(inputFields);
// } 

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

function formBuilder(res, str) {
  console.log(str);
  console.log(res);
  var inputFields = Object.keys(res[0]);
  console.log(inputFields);
  var container = document.getElementById("form");
  container.innerHTML +=
    "<div class='col-md-4'><label for='form-select' class='form-label text-warning'>Select type of SQL Query</label><select id='form-select' class='form-select' onchange='checkType()' aria-label='Default select example'><option selected>Select Operation</option><option value='INSERT'>INSERT</option><option value='UPDATE'>UPDATE</option><option value='DELETE'>DELETE</option></select></div>";
    var type = document.getElementById("table-select").value;
    if (type === "Review"){
      for (var i = 1; i < inputFields.length; i++) {
          container.innerHTML +=
            "<div class='col-md-4'><label for='" +
            inputFields[i] +
            "' class='form-label'>" +
            inputFields[i] +
            "</label><input type='text' class='form-control' id='" +
            inputFields[i] +
            "'></div>";
        }
  }
  else {
    for (var i = 0; i < inputFields.length; i++) {
    container.innerHTML +=
      "<div class='col-md-4'><label for='" +
      inputFields[i] +
      "' class='form-label'>" +
      inputFields[i] +
      "</label><input type='text' class='form-control' id='" +
      inputFields[i] +
      "'></div>";
  }
}

  

  if (type == "User") {
    container.innerHTML +=
      "<div class='col-md-4'><label for='userType' class='form-label'>User type</label><select id='userType' class='form-select' onchange='checkUserType()' aria-label='Default select example'><option value='Manager'>Manager</option><option value='Connoisseur'>Connoisseur</option><option value='General_User' selected>General User</option></select></div>";
    container.innerHTML +=
      "<div class='col-md-4'><label for='Winery_id' class='form-label'>Winery_id</label><input type='text' class='form-control' id='Winery_id'></div>";
    var wid = document.getElementById("Winery_id").parentNode;
    wid.style.display = "none";
  }
  container.innerHTML +=
    "<div class='col-12'><button type='submit' onclick='queryBuilder(event)' class='btn btn-primary'>QUERY</button></div><div id='table-container' class='table-responsive table-condensed w-100 justify-content-center'>";
    XMLRequest(str, true, false);
}

function checkType() {
  var container = document.getElementById("form");
  var select = document.getElementById("form-select");

  var elements = container.childNodes;

  if (select.value == "DELETE") {
    for (var i = 2; i < elements.length; i++) {
      var el = elements[i];

      var element = el.querySelector(".form-control");

      if (element) {
        el.style.display = "none";
        //   if (element.id != "User_id"){

        //   }
      }
    }

    var type = document.getElementById("table-select").value;

    if (type == "User") {
           var element = document.getElementById("Winery_id").parentNode;
          if (element) {
            element.style.display = "none";
            }
    }

  }else if(select.value == "UPDATE"){
    var type = document.getElementById("table-select").value;

    if (type == "User") {
        var element = document.getElementById("userType").parentNode;
        if (element) {
            element.style.display = "none";
          }
    
          var element = document.getElementById("Winery_id").parentNode;
          if (element) {
            element.style.display = "none";
            }
    }
  } else {
    for (var i = 2; i < elements.length; i++) {
      var el = elements[i];

      var element = el.querySelector(".form-control");

      var type = document.getElementById("table-select").value;

      if (element) {
        if (element.id == "Winery_id" && type == "User")
        {
            el.style.display = "none";
        }else{
            el.style.display = "block";
        }
      }
    }

    var type = document.getElementById("table-select").value;

    if (type == "User") {
        var element = document.getElementById("userType").parentNode;
        if (element) {
            element.style.display = "block";
          }
    }
  }
}

function checkUserType() {
  var select = document.getElementById("userType");
  var type = document.getElementById("form-select").value;

  if (select.value == "Manager" && type != "DELETE") {
    var el = document.getElementById("Winery_id").parentNode;
    el.style.display = "block";
  } else {
    var el = document.getElementById("Winery_id").parentNode;
    el.style.display = "none";
  }
}

async function checkReview(params) {
  var type = document.getElementById("form-select").value;

  var stop = false;

  for (var i = 1; i < params.length; i++) {
    if (params[i] == "User_id") {
      var table = document.getElementById("table-select");
      var str =
        "SELECT * FROM User WHERE " +
        params[i] +
        " = '" +
        document.getElementById(params[i]).value +
        "';";
      await XMLRequest(str, false)
        .then(function (res) {
          if (res == "No results found") {
            stop = true;
          }
        })
        .catch(function (error) {
          console.error(error);
        });
    } else if (params[i] == "Wine_id") {
      var table = document.getElementById("table-select");
      var str =
        "SELECT * FROM Wine WHERE " +
        params[i] +
        " = '" +
        document.getElementById(params[i]).value +
        "';";
      await XMLRequest(str, false)
        .then(function (res) {
          if (res == "No results found") {
            stop = true;
          }
        })
        .catch(function (error) {
          console.error(error);
        });
    }
  }

  return stop;
}

async function checkWine(params) {
  var type = document.getElementById("form-select").value;

  var stop = false;

  for (var i = 1; i < params.length; i++) {
    if (params[i] == "Winery_id") {
      var table = document.getElementById("table-select");
      var str =
        "SELECT * FROM Winery WHERE " +
        params[i] +
        " = '" +
        document.getElementById(params[i]).value +
        "';";
      await XMLRequest(str, false)
        .then(function (res) {
          if (res == "No results found") {
            stop = true;
          }
        })
        .catch(function (error) {
          console.error(error);
        });
    }
  }
  return stop;
}

async function checkWinery() {
  var stop = false;

  var str =
    "SELECT * FROM Winery WHERE Winery_id = '" +
    document.getElementById("Winery_id").value +
    "';";
  await XMLRequest(str, false)
    .then(function (res) {
      if (res == "No results found") {
        stop = true;
      }
    })
    .catch(function (error) {
      console.error(error);
    });

  return stop;
}

async function checkUserid() {
    var stop = false;
  
    var str =
      "SELECT * FROM User WHERE User_id = '" +
      document.getElementById("User_id").value +
      "';";
    await XMLRequest(str, false)
      .then(function (res) {
        if (res == "No results found") {
          stop = true;
        }
      })
      .catch(function (error) {
        console.error(error);
      });
  
    return stop;
  }

async function queryUserType() {
  var type = document.getElementById("form-select").value;
  var select = document.getElementById("userType");

  console.log("in");

  if (type == "INSERT") {
    var str = "";

    if (select.value == "Manager") {
      var stop = await this.checkWinery();
      if (stop) {
        alert("ID does not exists");
        return false;
      } else {
        var uid = document.getElementById("User_id").value;
        var wid = document.getElementById("Winery_id").value;
        str =
          "INSERT INTO " +
          select.value +
          " (User_id, Winery_id) VALUES ('" +
          uid +
          "', '" +
          wid +
          "');";
      }
    }else{
        var uid = document.getElementById("User_id").value;
        str =
          "INSERT INTO " +
          select.value +
          " (User_id) VALUES ('" +
          uid +
          "'" +
          ");";
    }

    console.log(str);

    await XMLRequest(str, false)
      .then()
      .catch(function (error) {
        console.error(error);
      });
  }
  else if (type == "DELETE") {
    var select = document.getElementById("userType");

    var str = "";
    console.log("hello");
    var stop = await this.checkUserid();

    if (stop){
        alert("ID does not exists");
        return false;
    }else{
        var uid = document.getElementById("User_id").value;
        str =
          "DELETE FROM " +
          select.value +
          " WHERE User_id='" +
          uid +
          "'" +
          ";";
    }

    const xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    xhr.onload = async function () {
      if (this.readyState === 4) {
        if (this.status === 200) {
          return true;
        }
      }
    };
    xhr.onerror = function () {
      alert(xhr.statusText);
      return false;
    };
    xhr.open("POST", "./util/miniAPI.php", true);
    var sqlQuery = JSON.stringify({
      "sql": str
  });
    xhr.send(sqlQuery);
  
}

  return false;
}

async function queryBuilder(event) {
  event.preventDefault();
  var container = document.getElementById("form");

  var elements = container.childNodes;

  var params = [];

  var type = document.getElementById("form-select").value;
  var table = document.getElementById("table-select").value;
  var qry = "";

  if (type == "INSERT") {
    qry = "INSERT INTO " + table + "(";

    for (var i = 0; i < elements.length; i++) {
      var element = elements[i].querySelector(".form-control");

      if (element) {
        if (table == "User" && element.id == "Winery_id"){
            continue;
        }else{
            if (element.value != "") {
                params.push(element.id);
            } else {
              alert("Please fill in field: " + element.id);
              return;
            }
        }
      }
    }

    var stop = false;
    var table = document.getElementById("table-select");
    var str =
      "SELECT * FROM " +
      table.value +
      " WHERE " +
      params[0] +
      " = " +
      document.getElementById(params[0]).value +
      ";";
    await XMLRequest(str, false)
      .then(function (res) {
        if (res != "No results found") {
          alert("ID all ready exists");
          stop = true;
          return;
        }
      })
      .catch(function (error) {
        console.error(error);
      });

    if (stop) {
      return;
    }

    if (table.value == "Review") {
      stop = await this.checkReview(params);

      if (stop) {
        return;
      }
    }

    if (table.value == "Wine") {
      stop = await this.checkWine(params);

      if (stop) {
        return;
      }
    }

    // if (table.value == "User"){
    //     stop = await this.queryUserType();

    //     if (stop) {
    //       return;
    //     }
    // }

    for (var i = 0; i < params.length; i++) {
      if (document.getElementById(params[i]).value != "") {
        if (i < params.length - 1) {
          qry += params[i] + ",";
        } else {
          qry += params[i];
        }
      }
    }

    qry += ") VALUES (";

    for (var i = 0; i < params.length; i++) {
      if (params[i] != "") {
        if (i < params.length - 1) {
          qry += "'" + document.getElementById(params[i]).value + "'" + ",";
        } else {
          qry += "'" + document.getElementById(params[i]).value + "'";
        }
      }
    }

    qry += ");";
  } else if (type == "UPDATE") {
    qry = "UPDATE " + table + " SET ";

    for (var i = 0; i < elements.length; i++) {
      var element = elements[i].querySelector(".form-control");

      if (element) {
        if (element.value != "") {
          params.push(element.id);
        } else {
          if (i == 1) {
            alert("Please fill in field: " + element.id);
            return;
          }
        }
      }
    }

    var stop = false;
    var table = document.getElementById("table-select");
    var str =
      "SELECT * FROM " +
      table.value +
      " WHERE " +
      params[0] +
      " = " +
      document.getElementById(params[0]).value +
      ";";
    await XMLRequest(str, false)
      .then(function (res) {
        if (res == "No results found") {
          alert("ID does not exists");
          stop = true;
          return;
        }
      })
      .catch(function (error) {
        console.error(error);
      });

    if (stop) {
      return;
    }

    if (table.value == "Review") {
      stop = await this.checkReview(params);

      if (stop) {
        alert("ID does not exists");
        return;
      }
    }

    if (table.value == "Wine") {
      stop = await this.checkWine(params);

      if (stop) {
        return;
      }
    }

    for (var i = 0; i < params.length; i++) {
      if (document.getElementById(params[i]).value != "" && i != 0) {
        if (i < params.length - 1) {
          qry +=
            params[i] +
            " = '" +
            document.getElementById(params[i]).value +
            "',";
        } else {
          qry +=
            params[i] + " = '" + document.getElementById(params[i]).value + "'";
        }
      }
    }

    qry +=
      " WHERE " +
      params[0] +
      " = '" +
      document.getElementById(params[0]).value +
      "';";
  } else if (type == "DELETE") {
    qry = "DELETE FROM " + table + " WHERE ";

    for (var i = 0; i < elements.length; i++) {
      var element = elements[i].querySelector(".form-control");

      if (element) {
        if (element.value != "") {
          params.push(element.id);
        } else {
          if (i == 1) {
            alert("Please fill in field: " + element.id);
            return;
          }
        }
      }
    }

    var stop = false;

    var table = document.getElementById("table-select").value;

    if (table == "User") {
        stop = await queryUserType();
  
        if (stop) {
          return;
        }
    }

    var table = document.getElementById("table-select");
    var str =
      "SELECT * FROM " +
      table.value +
      " WHERE " +
      params[0] +
      " = " +
      document.getElementById(params[0]).value +
      ";";
    await XMLRequest(str, false)
      .then(function (res) {
        if (res == "No results found") {
          alert("ID does not exists");
          stop = true;
          return;
        }
      })
      .catch(function (error) {
        console.error(error);
      });

    if (stop) {
      return;
    }

    for (var i = 0; i < params.length; i++) {
      if (document.getElementById(params[i]).value != "") {
        if (i < params.length - 1) {
          qry +=
            params[i] +
            " = '" +
            document.getElementById(params[i]).value +
            "',";
        } else {
          qry +=
            params[i] + " = '" + document.getElementById(params[i]).value + "'";
        }
      }
    }

    qry += ";";
  }

  console.log(qry);

 

  const xhr = new XMLHttpRequest();
  xhr.withCredentials = true;
  // xhr.addEventListener("readystatechange", function () {
  xhr.onload = async function () {
    if (this.readyState === 4) {
      if (this.status === 200) {
        console.log("done");

        var container = document.getElementById("form");
        var table = document.getElementById("table-select").value;
        var type = document.getElementById("form-select").value;
        if (table == "User" && type == "INSERT") {
          stop = await queryUserType();
      
          if (stop) {
            return;
          }
        }

          container.submit();
      }
    }
  };
  xhr.onerror = function () {
    alert(xhr.statusText);
  };
  xhr.open("POST", "./util/miniAPI.php", true);
  var sqlQuery = JSON.stringify({
    "sql": qry
});
  xhr.send(sqlQuery);


  //   XMLRequest(qry, false)
  //     .then(async function (){
  //         console.log("done");

  //         container = document.getElementById("form");
  //         table = document.getElementById("table-select").value;
  //         if (table.value == "User"){
  //             stop = await this.queryUserType();

  //             if (stop) {
  //               return;
  //             }
  //         }
  //     })
  //     .catch(function (error) {
  //       alert(error);
  //       // Handle the error here
  //     });
}

function filterBuilder(res) {
  // console.log(res);
  var inputFields = Object.keys(res[0]);
  // console.log(inputFields);
  var container = document.getElementById("filter-select");
  $("#filter-select").prop("disabled", false);
  $("#filter-select").removeClass("bg-secondary");
  for (var i = 0; i < inputFields.length; i++) {
    container.innerHTML +=
      "<option value='" + inputFields[i] + "'>" + inputFields[i] + "</option>";
  }
}

function loadForm() {
  this.clearForm();
  var table = document.getElementById("table-select");
  var str = "SELECT * FROM " + table.value;
  XMLRequest(str, false)
    .then(function(response) {
      formBuilder(response, str);
    })
    .catch(function (error) {
      console.error(error);
      // Handle the error here
    });
  // var inputFields = Object.keys(obj);
  // console.log(inputFields);
}

function clearForm() {
  var container = document.getElementById("form");

  var elements = container.childNodes;

  for (var i = elements.length - 1; i >= 0; i--) {
    var el = elements[i];
    container.removeChild(el);
  }
}

function loadAttributes() {
  var table = document.getElementById("table-select");
  var str = "SELECT * FROM " + table.value;
  XMLRequest(str, false)
    .then(filterBuilder)
    .catch(function (error) {
      console.error(error);
      // Handle the error here
    });
}

function loadList() {
  var table = document.getElementById("table-select");
  var filter = document.getElementById("filter-select");
  var order = document.querySelector('input[name="order-by"]:checked').value;
  var str =
    "SELECT * FROM " + table.value + " ORDER BY " + filter.value + " " + order;
  console.log(str);
  $("#filter").html(
    "<div class='d-flex'>SQL query successfully sent to server:<br>" +
      str +
      '</div><button type="button" class="btn btn-success btn-sm" onclick="window.location.reload();"><i class="fa fa-refresh"></i> Refresh</button>'
  );
  $("#filter").addClass("monospace");
  $("#filter").addClass("text-success");
  XMLRequest(str, false)
    .then(JSONtoTable)
    .catch(function (error) {
      console.error(error);
      // Handle the error here
    });
}
