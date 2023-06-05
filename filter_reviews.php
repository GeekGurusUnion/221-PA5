<?php include "header.php";?>
<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
<style>
    .dropdown-content::-webkit-scrollbar 
    { 
        width: 0 !important 
    }

    #table-container::-webkit-scrollbar 
    { 
        width: 0 !important 
    }

    table, th, td 
    {
        border: 1px solid gray;
        border-collapse: separate; 
        border-spacing: 0;
    }

    td, th 
    {
        padding: 10px;
    }

    td
    {
    height:50px;
    }

    table
    {
        width: 100%;
    }

    .tab
    {
        float: right; 
        width: 20%; 
        height: 100%; 
        margin-right:0; 
        position: -webkit-sticky;
        position: sticky;
    }

    th
    {
        position: -webkit-sticky;
        position: sticky;
        top: 0px;
        background-color: #212529;
        border-bottom: 4px solid gray;
    }

    .filtertab
    {
        background-color: #363D44; 
        width:100%;
        height:95%;
        margin-right:0; 
        padding-left: 10px;
        overflow-y:scroll;
    }

    .searchtab
    {
        background-color: #363D44; 
        width : 100%; 
        height: 32%;
        margin-bottom: 5px;
        padding-left: 10px;
        overflow-y:scroll;
    }

    .searchbar
    {
        height: 20px;
        width: 60%;
        font-size: 10px;
    }

    .searchlabel
    {
        height: 20px;
        width: 28%;
        font-size: 12px;
        text-align: right;
        margin-right: 5px;
    }

    .filterlabel
    {
        height: 20px;
        font-size: 12px;
        margin-left: 5px;
    }

    .title
    {
        height: 3%;
        width: 100%;
        padding-left: 5px;
        background-color: #212529;
    }

    .filtertitle
    {
        font-size: 12px;
        font-weight: bold;
        color: #FFC107;
        margin-top:10px;
    }

    .dropdown-content 
    {
        display: block;
        background-color: #464F58;
        width:95%;
    }
</style>
   
<h3>Reviews</h3>   

<div style = 'height:85vh; position:relative'>
    <table id="table-container" class="table-responsive table-condensed" style="width: 78%; height:100%; display: inline-block; border: none"></table>
    <div class = "tab">
        <b class = "title">Search:</b>
        <div class = "tab searchtab">
            <label class = "searchlabel" style = "margin-top:10px">Review ID:</label>
            <input type="text" id="search0" class = "searchbar" placeholder="Search for a Review ID">

            <label class = "searchlabel">Review Type:</label>
            <input type="text" id="search1" class = "searchbar" placeholder="Search for a Review Type">

            <label class = "searchlabel">User ID:</label>
            <input type="text" id="search2" class = "searchbar" placeholder="Search for a User ID">

            <label class = "searchlabel">User:</label>
            <input type="text" id="search3" class = "searchbar" placeholder="Search for a User">

            <label class = "searchlabel">Wine ID:</label>
            <input type="text" id="search4" class = "searchbar" placeholder="Search for a Wine ID">

            <label class = "searchlabel">Wine:</label>
            <input type="text" id="search5" class = "searchbar" placeholder="Search for a Wine">

            <label class = "searchlabel">Rating:</label>
            <input type="text" id="search6" class = "searchbar" placeholder="Search for a Rating">

            <div style = "display:flex; justify-content:center">
            <button type="button" onclick = "search()" style = "height: 25px; width:60px; font-size:12px; background-color:#212529; color: #FFC107; margin-top:10px; margin-right:5px">Search</button><br>
                <button type="button" onclick = "reset()" style = "height: 25px; width:60px; font-size:12px; background-color:#212529; color: #FFC107; margin-top:10px; margin-bottom:10px">Reset</button><br>
            </div>
        </div><br>

        <div style = "height: 60%; width:100%">
            <b class = "title">Filters:</b>
            <div class = "tab filtertab">

                <div id="RType">
                    <label class = "filtertitle" style = "margin-bottom:7px">Review Type:</label><br>
                    <div class="dropdown dropdown-content">
                    <input type="checkbox" id="review1" onclick="filterWines()" value = "General" style = "margin-left:8px">
                    <label class="filterlabel">General</label><br>
                    <input type="checkbox" id="review2" onclick="filterWines()" value = "Critic" style = "margin-left:8px">
                    <label class="filterlabel">Critic</label>
                    </div>
                </div>

                <div id="wine">
                <label class = "filtertitle">Wine:</label><br>
                    <div class="dropdown">
                        <input type="text" placeholder="Search for Wines" id="in0" class = "searchbar" style="width:95%" onkeyup="wineFilterFunction()">
                        <div id="wineDropdown" class="dropdown-content" style="overflow-y:scroll; height:220px"></div>
                    </div>
                </div>

                <div id="rating">
                    <label class = "filtertitle" style = "margin-bottom:7px">Rating:</label><br>
                    <div class="dropdown-content" style = "height:95px">
                        <div>
                            <label class="searchlabel">Min:</label>
                            <input type="text" class = "searchbar" id="rating1" placeholder="Minimum Rating" style="margin-top: 10px">
                        </div>
                        <div>
                            <label class="searchlabel">Max:</label>
                            <input type="text" class = "searchbar" id="rating2" placeholder="Maximum Rating">
                        </div>
                        <div style = "text-align:center"><button type="button" onclick = "filterWines()" style = "height: 20px; font-size:10px; background-color:#212529; color:white; margin:10px;">Apply</button></div>
                    </div>
                </div>

                <div style = "display:flex; justify-content:center">
                    <button type="button" onclick = "reset()" style = "height: 25px; width:60px; font-size:12px; background-color:#212529; color: #FFC107; margin-top:10px">Reset</button><br>
                </div>
                <div style="height:20px"></div>
            </div> 
        </div>
    </div>
</div>

<script>
    //FUNCTIONS
    function getWineDB(st, callback)//Function to get data from DB
    {
        var sqlQuery = JSON.stringify({
            "sql": str
        });
        var res;
        var json;

        $('#loader').removeClass('d-none');
        $('#loader').html(
            '<div class="h-100 d-flex align-items-center justify-content-center position-absolute w-100"><button class="btn btn-primary" type="button"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Retrieving from Server...</button></div>'
        );

        const xhr = new XMLHttpRequest();
        xhr.withCredentials = true;
        xhr.onload = function() {
            if (this.readyState === 4) {
                if (this.status === 200) {
                    $('#loader').empty();
                    $('#loader').hide();
                    const obj = JSON.parse(this.responseText);
                    res = obj.data;
                    res = JSON.stringify(res);
                    res = JSON.parse(res);
                    json = JSON.parse(xhr.responseText).data;
                    callback(json);
                }
            }
        };
        $('#loader').show();
        $('#loader').html(
            '<div class="h-100 d-flex align-items-center justify-content-center position-absolute w-100"><button class="btn btn-primary" type="button"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Retrieving from Server...</button></div>'
        );
        xhr.open("POST", "./util/miniAPI.php", true);
        xhr.send(sqlQuery);   
    }

    function convert(jsonData) //Function to convert JSON data to table
    {
        let container = document.getElementById("table-container");
        let table = document.createElement("table");
        let cols = Object.keys(jsonData[0]);
        table.setAttribute('id', 'myTable');
         
        let thead = document.createElement("thead");
        let tr = document.createElement("tr");
         
        var i = 0;
        cols.forEach((item) => {
            let th = document.createElement("th");
            th.innerText = item;
            th.id = 'th' + i;
            th.classList.add('thead-light');
            th.classList.add('text-warning');
            th.setAttribute('onclick', 'sortTable('+i+');');
            i = i+1;
            tr.appendChild(th);
        });
        thead.appendChild(tr)
        table.append(tr)
         
        jsonData.forEach((item) => {
            let tr = document.createElement("tr");
            let vals = Object.values(item);
            
            vals.forEach((elem) => {
                let td = document.createElement("td");
                td.innerText = elem;
                tr.appendChild(td);
            });
            table.appendChild(tr);
        });
        container.appendChild(table)
    }

    function addWines(j)//Function to add all wine types to filters
    {
        numWines = j.length;
        for(var i = 0; i  <j.length; i++)
        {
            $('#wineDropdown').append('<div id = "' + j[i].Name + '" class = toption style = "border-bottom:1px solid #212529"><input type="checkbox" style = "margin-left:5px" id="wine' + i.toString() + '" onclick="filterWines()" value = "' + j[i].Name + '"><label for="t' + i.toString() +'" class="filterlabel" style = "width:90%">' + j[i].Name +  '</label></div>')
        }
    }

    function sortTable(n)//Function to sort table by header when it is clicked
    {
        var i, shouldSwitch, switchcount = 0;
        var table = document.getElementById("myTable");
        var switching = true;
        var dir = "asc"; 
        while (switching) {
            switching = false;
            var rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) 
            {
                shouldSwitch = false;
                var x = rows[i].getElementsByTagName("TD")[n];
                var y = rows[i + 1].getElementsByTagName("TD")[n];
                if (n==0 || n==2 || n==4)//If sorting by first row, IDs need to be cast to int
                {
                    if (dir == "asc") 
                    {
                        if (parseInt(x.innerHTML) > parseInt(y.innerHTML)) 
                        {
                            shouldSwitch = true;
                            break;
                        }
                    } 
                    else if (dir == "desc") 
                    {
                        if (parseInt(x.innerHTML) < parseInt(y.innerHTML)) 
                        {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                else
                {
                    if (dir == "asc") 
                    {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) 
                        {
                            shouldSwitch = true;
                            break;
                        }
                    } 
                    else if (dir == "desc") 
                    {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) 
                        {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
            }
            if (shouldSwitch) 
            {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount ++;      
            } 
            else 
            {
                if (switchcount == 0 && dir == "asc") 
                {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }

    function search()//Function to implement search feature
    {
        var input = [];
        var _td = [];
        var _tv = [];
        for (var i=0; i<7; i++)
        {
            input[i] = document.getElementById("search"+i).value.toUpperCase();
        }

        var table = document.getElementById("myTable");
        var tr = table.getElementsByTagName("tr");
    
        for (var i=1; i<tr.length; i++) 
        {
            tr[i].style.display = "none";
        }
    
        for (var i = 0; i < tr.length; i++) 
        {
            for(var j=0; j<7; j++)
            {
                _td[j] = tr[i].getElementsByTagName("td")[j];
            }
            if (_td[0]) 
            {
                for(var j=0; j<7; j++)
                {
                    _tv[j] = _td[j].textContent;
                }
                if (_tv[0].toUpperCase().indexOf(input[0]) > -1 && _tv[1].toUpperCase().indexOf(input[1]) > -1 && _tv[2].toUpperCase().indexOf(input[2]) > -1 && _tv[3].toUpperCase().indexOf(input[3]) > -1 && _tv[4].toUpperCase().indexOf(input[4]) > -1 && _tv[5].toUpperCase().indexOf(input[5]) > -1 && _tv[6].toUpperCase().indexOf(input[6]) > -1)
                {
                    tr[i].style.display = "";
                } 
            }       
        }
    }

    function reset()//function implements filter reset button click
    {
        var div = document.getElementById("wineDropdown");
        var a = div.getElementsByClassName("toption");
        for (var i = 0; i < a.length; i++) 
        {
            a[i].style.display = "";
        }

        for (var i = 0; i<numWines; i++)
        {
            document.getElementById('wine' + i).checked=false;
        }

        document.getElementById('review1').checked=false;
        document.getElementById('review2').checked=false;

        document.getElementById('rating1').value = "";
        document.getElementById('rating2').value = "";

        var table = document.getElementById("myTable");
        var tr = table.getElementsByTagName("tr");
    
        for (var i = 1; i < tr.length; i++) 
        {
            tr[i].style.display = "";
        }
        for (var i=0; i<1; i++)
        {
            document.getElementById('in' +i).value = ''; 
        }
        for (var i=0; i<7; i++)
        {
            document.getElementById('search'+i).value = ''; 
        }
    }

    function wineFilterFunction() //Function to filter wines  in filter tab
    {
        var input = document.getElementById("in0");
        var filter = input.value.toUpperCase();
        var div = document.getElementById("wineDropdown");
        var a = div.getElementsByClassName("toption");
        for (var i = 0; i < a.length; i++) 
        {
            txtValue = a[i].textContent;
            if (txtValue.toUpperCase().indexOf(filter) > -1) 
            {
                a[i].style.display = "";
            } 
            else 
            {
                a[i].style.display = "none";
            }
        }
    }

    function filterWines() //Function to filter table
    {

        var reviewInput = [], wineInput = [], minRating, maxRating, found = [1,1,1];
        var input, _td = [], _tv = [], show;

        for (var i = 0; i<numWines; i++)//adding checked wines
        {
            if(document.getElementById('wine'+i).checked)
            {
                wineInput.push(document.getElementById('wine'+i).value.toUpperCase());
            }
        }

        if(document.getElementById('review1').checked)
        {
            reviewInput.push("GENERAL");
        }

        if(document.getElementById('review2').checked)
        {
            reviewInput.push("CRITIC");
        }

        minRating = document.getElementById('rating1').value.toUpperCase();
        maxRating = document.getElementById('rating2').value.toUpperCase();

        if (parseFloat(maxRating) < parseFloat(minRating))
        {
            alert("Please enter valid Rating Minimum and Maximum.");
            document.getElementById('rating1').value = "";
            document.getElementById('rating2').value = "";
            filterWines();
            return;
        }

        var table = document.getElementById("myTable");
        var tr = table.getElementsByTagName("tr");
    
        for (var i= 1; i<tr.length; i++) 
        {
            tr[i].style.display = "none";
        }


        for (var i = 0; i < tr.length; i++)
        {
            _td[0] = tr[i].getElementsByTagName("td")[1];//TYPES
            _td[1] = tr[i].getElementsByTagName("td")[5];//WINES
            _td[2] = tr[i].getElementsByTagName("td")[6];//Rating
            if (_td[0]) 
            {
                _tv[0] = _td[0].textContent;
                _tv[1] = _td[1].textContent;
                _tv[2] = _td[2].textContent;
                for (var k = 0; k < reviewInput.length; k++)
                {
                    if (_tv[0].toUpperCase().indexOf(reviewInput[k]) <= -1)
                    {
                        found[0] = 0;
                    }  
                    if (_tv[0].toUpperCase().indexOf(reviewInput[k]) > -1)
                    {
                        found[0] = 1;
                        break;
                    } 
                }
                for (var k = 0; k < wineInput.length; k++)
                {
                    if (_tv[1].toUpperCase().indexOf(wineInput[k]) <= -1)
                    {
                        found[1] = 0;
                    }  
                    if (_tv[1].toUpperCase().indexOf(wineInput[k]) > -1)
                    {
                        found[1] = 1;
                        break;
                    } 
                }

                if (parseFloat(_tv[2]) < parseFloat(minRating) || parseFloat(_tv[2]) > parseFloat(maxRating))
                {
                    found[2] = 0;
                }
                else
                {
                    found[2] = 1;
                }
            } 

            if(found[0] == 1 && found[1] == 1 && found[2] == 1)
            {
                tr[i].style.display = "";
            }

            for(var k = 0; k < 3; k++)
            {
                found[k] = 1;
            }
        }
    }

    var numWines;

    var str = "SELECT Review.Write_id AS 'Review ID', Review.Review_type AS 'Review Type', User.User_id AS 'User ID', concat(User.First_name, ' ', User.Last_name) AS User, Wine.Wine_id AS 'Wine ID', Wine.Name AS Wine, Review.Rating FROM Review LEFT JOIN User ON Review.User_id=User.User_id LEFT JOIN Wine ON Review.Wine_id=Wine.Wine_id";
    getWineDB(str,convert);

    str = "SELECT Name FROM Wine WHERE Winery_id IN (SELECT Wine_id FROM Review) GROUP BY Name ORDER BY Name";
    
    getWineDB(str,addWines);
</script>

<?php include "footer.php";?>
