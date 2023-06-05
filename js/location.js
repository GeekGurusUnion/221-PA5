var str = "SELECT Winery.name, Winery.country, Wine.rating FROM Winery INNER JOIN (SELECT Winery_id, AVG(rating) AS rating FROM Wine GROUP BY Winery_id) as Wine ON Winery.Winery_id = Wine.Winery_id;";
    XMLRequest(str, false)
    .then(wineSuggestor)
    .catch(function(error) {
      console.error(error);
      // Handle the error here
    });

let wineriesObj = [];
let wineries = Array();
function wineSuggestor(res) {
    wineriesObj = res;
    console.log(res);
    for (var i = 0; i < wineriesObj.length; i++) {
        var obj = wineriesObj[i];
        var values = [];
    
        for (var key in obj) {
            if (obj.hasOwnProperty(key)) {
                values.push(obj[key]);
            }
        }
    
        wineries.push(values);
        }
      
    // console.log(arrayOfArrays);
    console.log(wineries);
}

// Winery sample array. Database not yet ready.

// var wineries = [['ZAF', 5], ['NAM', 4], ['FRA', 5], ['AGO', 4], ['AGO', 6]];
var distances = Array();

// window.onload(function() {
//     loadDistances();
// });

function assignData(data) {
    // console.log(v);
    let array = csvToArray(data);
    console.log(array[0].length);
    // console.log(array[0][1])
    var input = document.getElementById('input-country-code');
    // var input = "ZAF";
    // console.log(input.value)
    var best = document.getElementById('best-location');
    var other = document.getElementById('other-locations');
    best.innerHTML = '';
    other.innerHTML = '';

    if (input != null || input.value != null || input.value != '') {
        var i = 1;
        var to = array[0].length;
        console.log(to);
        for (i = 1; i < to; i++) {
            // console.log(i);
            // console.log(array[0][i])
            if (array[0][i] === input.value) {
                console.log('found');
                break;
            }
        }

        for (var k = 0; k < wineries.length; k++) {
            for (var j = 1; j < to; j++) {
                if (wineries[k][1] === array[j][0]) {
                    wineries[k][3] = array[j][i]
                }
            }
        }
        console.log(wineries);
        wineries.sort(sortFunction); 
        
        // var rankings = getSortedKeys(distances);
        console.log(wineries);

        best.innerHTML = '<div class=" border rounded p-4 border-success d-flex justify-content-between"><div><h3>' + wineries[0][0] + '</h3><h5>Located in: ' + wineries[0][1] + '</h5><div class="d-flex gap-2"><div class="mr-2"><span class="badge bg-success">BEST OPTION</span></div><div class="mr-2"><span class="badge bg-warning text-black"><i class="fas fa-star"></i> ' + parseFloat(wineries[0][2]).toFixed(1) + '</span></div><div><span class="badge bg-secondary">' + Math.round(wineries[0][3]) + 'km away from you</span></div></div></div><div><button class="btn btn-primary" type="submit" onclick="loadForm()">View Winery <i class="fas fa-wine-glass"></i></button></div></div>';

        for (var k = 1; k < wineries.length; k++) {
            other.innerHTML += '<div class="m-2 border rounded p-4 border-secondary d-flex justify-content-between"><div><h5>' + wineries[k][0] + '</h5><h6>Located in: ' + wineries[k][1] + '</h6><div class="d-flex gap-2"><div class="mr-2"><span class="badge bg-warning text-black"><i class="fas fa-star"></i> ' + parseFloat(wineries[k][2]).toFixed(1) + '</span></div><div><span class="badge bg-secondary">' + Math.round(wineries[k][3]) + 'km away from you</span></div></div></div><div><button class="btn btn-secondary" type="submit" onclick="loadForm()">View Winery <i class="fas fa-wine-glass"></i></button></div></div>';
        }


    }
}

function loadDistances() {
    fetch('../PA5/util/distances.csv')
        .then(response => response.text())
        .then(text => assignData(text));
}

function csvToArray(csv) {
    const rows = csv.split('\n');
    const result = [];
  
    for (const row of rows) {
      const values = row.split(',');
      result.push(values);
    }
  
    return result;
}

function sortFunction(a, b) {
    console.log("Comparing " + a[3] + " with " + b[3]);
    console.log("Comparing " + a[2] + " with " + b[2]);
    var result = parseFloat(a[3]) - parseFloat(b[3]);
    if (result !== 0) {
        return result;
    }
    
    // If the fourth field is equal, sort by the third field (index 2)
    return parseFloat(b[2]) - parseFloat(a[2]);
}