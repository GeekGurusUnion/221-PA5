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
        overflow-y:scroll;
        padding-left: 10px;
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
   
<h3>Wines</h3>   

<div style = 'height:85vh; position:relative'>
    <table id="table-container" class="table-responsive table-condensed" style="width: 78%; height:100%; display: inline-block; border: none"></table>
    <div class = "tab">
        <b class = "title">Search:</b>
        <div class = "tab searchtab">
            <label class = "searchlabel" style = "margin-top:10px">ID:</label>
            <input type="text" id="search0" class = "searchbar" placeholder="Search for an ID">
            <label class = "searchlabel">Name:</label>
            <input type="text" id="search1" class = "searchbar" placeholder="Search for a Name">
            <label class = "searchlabel">Year:</label>
            <input type="text" id="search2" class = "searchbar" placeholder="Search for a Year">
            <label class = "searchlabel">Type:</label>
            <input type="text" id="search3" class = "searchbar" placeholder="Search for a Type">
            <label class = "searchlabel">Producer:</label>
            <input type="text" id="search4" class = "searchbar" placeholder="Search for a Producer">
            <label class = "searchlabel">Country:</label>
            <input type="text" id="search5" class = "searchbar" placeholder="Search for a Country">
            <label class = "searchlabel">Alcohol:</label>
            <input type="text" id="search6" class = "searchbar" placeholder="Search for an Alcohol %">
            <label class = "searchlabel">Price:</label>
            <input type="text" id="search7" class = "searchbar" placeholder="Search for a Price">
            <label class = "searchlabel">Rating:</label>
            <input type="text" id="search8" class = "searchbar" placeholder="Search for a Rating">
            <label class = "searchlabel">Winery:</label>
            <input type="text" id="search9" class = "searchbar" placeholder="Search for a Winery">
            <div style = "display:flex; justify-content:center">
            <button type="button" onclick = "search()" style = "height: 25px; width:60px; font-size:12px; background-color:#212529; color: #FFC107; margin-top:10px; margin-right:5px">Search</button><br>
                <button type="button" onclick = "reset()" style = "height: 25px; width:60px; font-size:12px; background-color:#212529; color: #FFC107; margin-top:10px; margin-bottom:10px">Reset</button><br>
            </div>
        </div><br>

        <div style = "height: 60%; width:100%">
            <b class = "title">Filters:</b>
            <div class = "tab filtertab">

                <div id="types">
                <label class = "filtertitle">Type:</label><br>
                    <div class="dropdown">
                        <input type="text" placeholder="Search for Wine Types" id="in0" class = "searchbar" style="width:95%" onkeyup="typeFilterFunction()">
                        <div id="typeDropdown" class="dropdown-content" style="overflow-y:scroll; height:95px"></div>
                    </div>
                </div>

                <div id="producers">
                    <label class = "filtertitle">Producer:</label><br>
                    <div class="dropdown">
                        <input type="text" placeholder="Search for Producers" id="in1" class = "searchbar" style="width:95%" onkeyup="producerFilterFunction()">
                        <div id="producerDropdown" class="dropdown-content" style="overflow-y:scroll; height:95px"></div>
                    </div>
                </div>

                <div id="countries">
                    <label class = "filtertitle">Country:</label><br>
                    <div class="dropdown">
                        <input type="text" placeholder="Search for Countries" id="in2" class = "searchbar" style="width:95%" onkeyup="countryFilterFunction()">
                        <div id="countryDropdown" class="dropdown-content" style="overflow-y:scroll; height:95px"></div>
                    </div>
                </div>

                <div id="wineries">
                    <label class = "filtertitle">Wineries:</label><br>
                    <div class="dropdown">
                        <input type="text" placeholder="Search for Winery" id="in3" class = "searchbar" style="width:95%" onkeyup="wineryFilterFunction()">
                        <div id="wineryDropdown" class="dropdown-content" style="overflow-y:scroll; height:95px"></div>
                    </div>
                </div>

                <div id="price">
                    <label class = "filtertitle">Price:</label><br>
                    <div class="dropdown-content" style = "height:95px">
                        <div>
                            <label class="searchlabel">Min:</label>
                            <input type="text" class = "searchbar" id="price1" placeholder="Minimum Price" style="margin-top: 10px">
                        </div>
                        <div>
                            <label class="searchlabel">Max:</label>
                            <input type="text" class = "searchbar" id="price2" placeholder="Maximum Price" >
                        </div>
                        <div style = "text-align:center"><button type="button" onclick = "filterWines()" style = "height: 20px; font-size:10px; background-color:#212529; color:white; margin:10px;">Apply</button></div>
                    </div>
                </div>

                <div id="alcohol">
                    <label class = "filtertitle">Alcohol %:</label><br>
                    <div class="dropdown-content" style = "height:95px">
                        <div>
                            <label class="searchlabel">Min:</label>
                            <input type="text" class = "searchbar" id="alcohol1" placeholder="Minimum Percentage" style="margin-top: 10px">
                        </div>
                        <div>
                            <label class="searchlabel">Max:</label>
                            <input type="text" class = "searchbar" id="alcohol2" placeholder="Maximum Percentage">
                        </div>
                        <div style = "text-align:center"><button type="button" onclick = "filterWines()" style = "height: 20px; font-size:10px; background-color:#212529; color:white; margin:10px;">Apply</button></div>
                    </div>
                </div>

                <div id="rating">
                    <label class = "filtertitle">Rating:</label><br>
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

                <div id="year">
                    <label class = "filtertitle">Age:</label><br>
                    <div class="dropdown-content" style = "height:95px">
                        <div>
                            <label class="searchlabel">Min:</label>
                            <input type="text" class = "searchbar" id="age1" placeholder="Minimum Age" style="margin-top: 10px">
                        </div>
                        <div>
                            <label class="searchlabel">Max:</label>
                            <input type="text" class = "searchbar" id="age2" placeholder="Maximum Age">
                        </div>
                        <div style = "text-align:center"><button type="button" onclick = "filterWines()" style = "height: 20px; font-size:10px; background-color:#212529; color:white; margin:10px;">Apply</button></div>
                    </div>
                </div>

                <div style = "display:flex; justify-content:center">
                    <button type="button" onclick = "reset()" style = "height: 25px; width:60px; font-size:12px; background-color:#212529; color: #FFC107; margin-top:20px">Reset</button><br>
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

    function addTypes(j)//Function to add all wine types to filters
    {
        numTypes = j.length;
        for(var i = 0; i  <j.length; i++)
        {
            $('#typeDropdown').append('<div id = "' + j[i].Type + '" class = toption style = "border-bottom:1px solid #212529"><input type="checkbox" style = "margin-left:5px" id="type' + i.toString() + '" onclick="filterWines()" value = "' + j[i].Type + '"><label for="t' + i.toString() +'" class="filterlabel">' + j[i].Type +  '</label></div>')
        }
    }

    function addProducers(j)//Function to add all producers to filters
    {
        numProducers = j.length;
        for(var i = 0; i < j.length; i++)
        {
            $('#producerDropdown').append('<div id = "' + j[i].Producer + '" class = poption style = "border-bottom:1px solid #212529"><input type="checkbox" style = "margin-left:5px" id="producer' + i.toString() + '" onclick="filterWines()" value = "' + j[i].Producer + '"><label class="filterlabel">' + j[i].Producer + '</label></div>')
        }
    }

    function addCountries(j)//Function to add all countries to filters
    {
        numCountries = j.length;
        for(var i = 0; i < j.length; i++)
        {
            $('#countryDropdown').append('<div id = "' + j[i].Country_of_Origin + '" class = coption style = "border-bottom:1px solid #212529"><input type="checkbox" style = "margin-left:5px" id="country' + i.toString() + '" onclick="filterWines()" value = "' + j[i].Country_of_Origin + '"><label class="filterlabel">' + j[i].Country_of_Origin + '</label></div>')
        }
    }

    function addWineries(j)//Function to add all wineries to filters
    {
        numWineries = j.length;
        for(var i = 0; i < j.length; i++)
        {
            $('#wineryDropdown').append('<div id = "' + j[i].Name + '" class = wioption style = "border-bottom:1px solid #212529"><input type="checkbox" style = "margin-left:5px" id="winery' + i.toString() + '" onclick="filterWines()" value = "' + j[i].Name + '"><label class="filterlabel">' + j[i].Name + '</label></div>')
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
                if (n==0)//If sorting by first row, IDs need to be cast to int
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
        for (var i=0; i<10; i++)
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
            for(var j=0; j<10; j++)
            {
                _td[j] = tr[i].getElementsByTagName("td")[j];
            }
            if (_td[0]) 
            {
                for(var j=0; j<10; j++)
                {
                    _tv[j] = _td[j].textContent;
                }
                if (_tv[0].toUpperCase().indexOf(input[0]) > -1 && _tv[1].toUpperCase().indexOf(input[1]) > -1 && _tv[2].toUpperCase().indexOf(input[2]) > -1 && _tv[3].toUpperCase().indexOf(input[3]) > -1 && _tv[4].toUpperCase().indexOf(input[4]) > -1 && _tv[5].toUpperCase().indexOf(input[5]) > -1 && _tv[6].toUpperCase().indexOf(input[6]) > -1 && _tv[7].toUpperCase().indexOf(input[7]) > -1 && _tv[8].toUpperCase().indexOf(input[8]) > -1 && _tv[9].toUpperCase().indexOf(input[9]) > -1)
                {
                    tr[i].style.display = "";
                } 
            }       
        }
    }

    function reset()//function implements filter reset button click
    {
        var div = document.getElementById("producerDropdown");
        var a = div.getElementsByClassName("poption");
        for (var i = 0; i < a.length; i++) 
        {
            a[i].style.display = "";
        }
        div = document.getElementById("typeDropdown");
        a = div.getElementsByClassName("toption");
        for (var i = 0; i < a.length; i++) 
        {
            a[i].style.display = "";
        }
        div = document.getElementById("countryDropdown");
        a = div.getElementsByClassName("coption");
        for (var i = 0; i < a.length; i++) 
        {
            a[i].style.display = "";
        }
        div = document.getElementById("wineryDropdown");
        a = div.getElementsByClassName("wioption");
        for (var i = 0; i < a.length; i++) 
        {
            a[i].style.display = "";
        }

        for (var i = 0; i<numTypes; i++)
        {
            document.getElementById('type' + i).checked=false;
        }
        for (var i = 0; i<numProducers; i++)
        {
            document.getElementById('producer' + i).checked=false;
        }
        for (var i = 0; i<numCountries; i++)
        {
            document.getElementById('country' + i).checked=false;
        }
        for (var i = 0; i<numWineries; i++)
        {
            document.getElementById('winery' + i).checked=false;
        }

        document.getElementById('price1').value = "";
        document.getElementById('price2').value = "";
        document.getElementById('alcohol1').value = "";
        document.getElementById('alcohol2').value = "";
        document.getElementById('rating1').value = "";
        document.getElementById('rating2').value = "";
        document.getElementById('age1').value = "";
        document.getElementById('age2').value = "";

        var table = document.getElementById("myTable");
        var tr = table.getElementsByTagName("tr");
    
        for (var i = 1; i < tr.length; i++) 
        {
            tr[i].style.display = "";
        }
        for (var i=0; i<4; i++)
        {
            document.getElementById('in' +i).value = ''; 
        }
        for (var i=0; i<10; i++)
        {
            document.getElementById('search'+i).value = ''; 
        }
    }

    function producerFilterFunction() //Function to filter producers in filter tab
    {
        var input = document.getElementById("in1");
        var filter = input.value.toUpperCase();
        var div = document.getElementById("producerDropdown");
        var a = div.getElementsByClassName("poption");
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

    function typeFilterFunction() //Function to filter wine types in filter tab
    {
        var input = document.getElementById("in0");
        var filter = input.value.toUpperCase();
        var div = document.getElementById("typeDropdown");
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

    function countryFilterFunction() //Function to filter countries in filter tab
    {
        var input = document.getElementById("in2");
        var filter = input.value.toUpperCase();
        var div = document.getElementById("countryDropdown");
        var a = div.getElementsByClassName("coption");
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

    function wineryFilterFunction() //Function to filter wineries in filter tab
    {
        var input = document.getElementById("in3");
        var filter = input.value.toUpperCase();
        var div = document.getElementById("wineryDropdown");
        var a = div.getElementsByClassName("wioption");
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

        var typeInput = [], producerInput = [], countryInput = [], wineryInput = [], minPrice, maxPrice, minAlcohol, maxAlcohol, minRating, maxRating, minAge, maxAge, found = [1,1,1,1,1,1,1,1];
        const d = new Date();
        let year = d.getFullYear();
        var input, _td = [], _tv = [], show;

        for (var i = 0; i<numTypes; i++)//adding checked types
        {
            if(document.getElementById('type'+i).checked)
            {
                typeInput.push(document.getElementById('type'+i).value.toUpperCase());
            }
        }

        for (var i = 0; i<numProducers; i++)//adding checked producers
        {
            if(document.getElementById('producer'+i).checked)
            {
                producerInput.push(document.getElementById('producer'+i).value.toUpperCase());
            }
        }

        for (var i = 0; i<numCountries; i++)//adding checked countries
        {
            if(document.getElementById('country'+i).checked)
            {
                countryInput.push(document.getElementById('country'+i).value.toUpperCase());
            }
        }

        for (var i = 0; i<numWineries; i++)//adding checked wineries
        {
            if(document.getElementById('winery'+i).checked)
            {
                wineryInput.push(document.getElementById('winery'+i).value.toUpperCase());
            }
        }

        minPrice = document.getElementById('price1').value;
        maxPrice = document.getElementById('price2').value;
        minAlcohol = document.getElementById('alcohol1').value.toUpperCase();
        maxAlcohol = document.getElementById('alcohol2').value.toUpperCase();
        minRating = document.getElementById('rating1').value.toUpperCase();
        maxRating = document.getElementById('rating2').value.toUpperCase();
        minAge = document.getElementById('age1').value.toUpperCase();
        maxAge = document.getElementById('age2').value.toUpperCase();

        if (parseInt(maxPrice) < parseInt(minPrice))
        {
            alert("Please enter valid Price Minimum and Maximum.");
            document.getElementById('price1').value = "";
            document.getElementById('price2').value = "";
            filterWines();
            return;
        }

        if (parseInt(maxAlcohol) < parseInt(minAlcohol))
        {
            alert("Please enter valid Alcohol Minimum and Maximum.");
            document.getElementById('alcohol1').value = "";
            document.getElementById('alcohol2').value = "";
            filterWines();
            return;
        }

        if (parseInt(maxRating) < parseInt(minRating))
        {
            alert("Please enter valid Rating Minimum and Maximum.");
            document.getElementById('rating1').value = "";
            document.getElementById('rating2').value = "";
            filterWines();
            return;
        }

        if (parseInt(maxAge) < parseInt(minAge))
        {
            alert("Please enter valid Age Minimum and Maximum.");
            document.getElementById('age1').value = "";
            document.getElementById('age2').value = "";
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
            _td[0] = tr[i].getElementsByTagName("td")[3];//TYPES
            _td[1] = tr[i].getElementsByTagName("td")[4];//PROD
            _td[2] = tr[i].getElementsByTagName("td")[5];//COUNTRIES
            _td[3] = tr[i].getElementsByTagName("td")[9];//WINERIES
            _td[4] = tr[i].getElementsByTagName("td")[7];//PRICE
            _td[5] = tr[i].getElementsByTagName("td")[6];//ALCOHOL
            _td[6] = tr[i].getElementsByTagName("td")[8];//RATING
            _td[7] = tr[i].getElementsByTagName("td")[2];//AGE/YEAR

            if (_td[0]) 
            {
                _tv[0] = _td[0].textContent;
                _tv[1] = _td[1].textContent;
                _tv[2] = _td[2].textContent;
                _tv[3] = _td[3].textContent;
                _tv[4] = _td[4].textContent;
                _tv[5] = _td[5].textContent;
                _tv[6] = _td[6].textContent;
                _tv[7] = _td[7].textContent;
                for (var k = 0; k < typeInput.length; k++)
                {
                    if (_tv[0].toUpperCase().indexOf(typeInput[k]) <= -1)
                    {
                        found[0] = 0;
                    }  
                    if (_tv[0].toUpperCase().indexOf(typeInput[k]) > -1)
                    {
                        found[0] = 1;
                        break;
                    } 
                }
                for (var k = 0; k < producerInput.length; k++)
                {
                    if (_tv[1].toUpperCase().indexOf(producerInput[k]) <= -1)
                    {
                        found[1] = 0;
                    }  
                    if (_tv[1].toUpperCase().indexOf(producerInput[k]) > -1)
                    {
                        found[1] = 1;
                        break;
                    } 
                }
                for (var k = 0; k < countryInput.length; k++)
                {
                    if (_tv[2].toUpperCase().indexOf(countryInput[k]) <= -1)
                    {
                        found[2] = 0;
                    }  
                    if (_tv[2].toUpperCase().indexOf(countryInput[k]) > -1)
                    {
                        found[2] = 1;
                        break;
                    } 
                }
                for (var k = 0; k < wineryInput.length; k++)
                {
                    if (_tv[3].toUpperCase().indexOf(wineryInput[k]) <= -1)
                    {
                        found[3] = 0;
                    }  
                    if (_tv[3].toUpperCase().indexOf(wineryInput[k]) > -1)
                    {
                        found[3] = 1;
                        break;
                    }  
                }

                if (parseInt(_tv[4]) < parseInt(minPrice) || parseInt(_tv[4]) > parseInt(maxPrice))
                {
                    found[4] = 0;
                }
                else
                {
                    found[4] = 1;
                }

                if (parseFloat(_tv[5]) < parseFloat(minAlcohol) || parseFloat(_tv[5]) > parseFloat(maxAlcohol))
                {
                    found[5] = 0;
                }
                else
                {
                    found[5] = 1;
                }

                if (parseInt(_tv[6]) < parseInt(minRating) || parseInt(_tv[6]) > parseInt(maxRating))
                {
                    found[6] = 0;
                }
                else
                {
                    found[6] = 1;
                }

                if ((parseInt(year) - parseInt(_tv[7])) < (parseInt(minAge)) || (parseInt(year) - parseInt(_tv[7])) > (parseInt(maxAge)))
                {
                    found[7] = 0;
                }
                else
                {
                    found[7] = 1;
                }
            } 

            if(found[0] == 1 && found[1] == 1 && found[2] == 1 && found[3] == 1 && found[4] == 1 && found[5] == 1 && found[6] == 1 && found[7] == 1)
            {
                tr[i].style.display = "";
            }

            for(var k = 0; k < 8; k++)
            {
                found[k] = 1;
            }
        }
    }

    var numTypes = 0, numProducers = 0, numCountries = 0, numWineries = 0, numWines = 0;

    var str = "SELECT Wine.Wine_id AS ID, Wine.Name, Wine.year AS Year, Wine.Type, Wine.Producer, Wine.Country_of_Origin AS Country, Wine.AlcoholPer AS 'Alcohol %', Wine.Price, Wine.Rating, Winery.Name AS Winery FROM Wine INNER JOIN Winery ON Wine.Winery_id=Winery.Winery_id";
    getWineDB(str,convert);

    str = "SELECT Type FROM Wine GROUP BY Type ORDER BY Type";
    getWineDB(str,addTypes);

    str = "SELECT Producer FROM Wine GROUP BY Producer ORDER BY Producer";
    getWineDB(str,addProducers);

    str = "SELECT Country_of_Origin FROM Wine GROUP BY Country_of_Origin ORDER BY Country_of_Origin";
    getWineDB(str,addCountries);

    str = "SELECT Name FROM Winery WHERE Winery_id IN (SELECT Winery_id FROM Wine) GROUP BY Name ORDER BY Name";
    getWineDB(str,addWineries);
</script>

<?php include "footer.php";?>
