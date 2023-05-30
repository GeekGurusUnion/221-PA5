// var str = "SELECT winery_id, country FROM Winery";
//     XMLRequest(str, false)
//     .then(wineSuggestor)
//     .catch(function(error) {
//       console.error(error);
//       // Handle the error here
//     });

// function wineSuggestor(res) {
//     // wineries = 
//     console.log(res);
// }

// Winery sample array. Database not yet ready.
var wineries = [[1, 'ZAF', 5], [1, 'NAM', 4], [2, 'FRA', 5], [3, 'AGO', 4]];
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
        wineries.sort(sortFunction); 
        
        // var rankings = getSortedKeys(distances);
        console.log(wineries);

        best.innerHTML = '<div class=" border rounded p-4 border-success d-flex justify-content-between"><div><h3>[DB Result]</h3><h5>Located in: ' + wineries[0][1] + '</h5><div class="d-flex gap-2"><div class="mr-2"><span class="badge bg-success">BEST OPTION</span></div><div class="mr-2"><span class="badge bg-warning text-black"><i class="fas fa-star"></i> ' + wineries[0][2] + '</span></div><div><span class="badge bg-secondary">' + Math.round(wineries[0][3]) + 'km away from you</span></div></div></div><div><button class="btn btn-primary" type="submit" onclick="loadForm()">View Winery <i class="fas fa-wine-glass"></i></button></div></div>';

        for (var k = 1; k < wineries.length; k++) {
            other.innerHTML += '<div class="m-2 border rounded p-4 border-secondary d-flex justify-content-between"><div><h5>Robertson Winery</h5><h6>Located in: ' + wineries[k][1] + '</h6><div class="d-flex gap-2"><div class="mr-2"><span class="badge bg-warning text-black"><i class="fas fa-star"></i> ' + wineries[k][2] + '</span></div><div><span class="badge bg-secondary">' + Math.round(wineries[k][3]) + 'km away from you</span></div></div></div><div><button class="btn btn-secondary" type="submit" onclick="loadForm()">View Winery <i class="fas fa-wine-glass"></i></button></div></div>';
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
    if (a[3] === b[3]) {
        return 0;
    }
    else {
        return (a[3] < b[3]) ? -1 : 1;
    }
}