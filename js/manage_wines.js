document.addEventListener("DOMContentLoaded", function() {
    var table = document.querySelector("#table");
    var changes = {};
  
    function attachButtonListener() {
      var button = document.getElementById("confirmBtn");
      table = document.querySelector("#table");
  
      if (button) {
        if (table) {
          table.addEventListener("input", function(event) {
            var row = event.target.closest("tr");
            var User_id = row.cells[0].textContent;
            var changedData = event.target.textContent;
            var column = table.rows[0].cells[event.target.cellIndex].textContent;
  
            var key = User_id + "_" + column;
            changes[key] = changedData;
  
            console.log("Latest change for " + key + ": " + changedData);
          });
        }
  
        console.log("Button + table is loaded");
        button.addEventListener("click", function(event) {
          console.log("Button clicked");
          for (var key in changes) {
            var User_id = key.split("_")[0];
            var column = key.split("_").slice(1).join("_");
            var changedData = changes[key];
  
            var query =
              "UPDATE Wine SET " +
              column +
              " = '" +
              changedData +
              "' WHERE Wine_id = " +
              User_id;
  
            console.log(query + ":query");
          }
  
          if (Object.keys(changes).length === 0) {
            console.log("No changes recorded");
          }
          XMLRequest(query,false,false);
          location.reload();
        });
      } else {
        setTimeout(attachButtonListener, 1000); // Retry after a delay if the button is not available
      }
    }
  
    attachButtonListener();
  });
  