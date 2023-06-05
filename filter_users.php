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
   
<h3>Users</h3>   

<div style = 'height:85vh; position:relative'>
    <table id="table-container" class="table-responsive table-condensed" style="width: 78%; height:100%; display: inline-block; border: none"></table>
    <div class = "tab">
        <b class = "title">Search:</b>
        <div class = "tab searchtab">
            <label class = "searchlabel" style = "margin-top:10px">ID:</label>
            <input type="text" id="search0" class = "searchbar" placeholder="Search for an ID">

            <label class = "searchlabel">Email:</label>
            <input type="text" id="search1" class = "searchbar" placeholder="Search for an Email Address">

            <label class = "searchlabel">Password:</label>
            <input type="text" id="search2" class = "searchbar" placeholder="Search for a Password">

            <label class = "searchlabel">First Name:</label>
            <input type="text" id="search3" class = "searchbar" placeholder="Search for a First Name">

            <label class = "searchlabel">Last Name:</label>
            <input type="text" id="search4" class = "searchbar" placeholder="Search for an Last Name">

            <label class = "searchlabel">Street:</label>
            <input type="text" id="search5" class = "searchbar" placeholder="Search for a Street">

            <label class = "searchlabel">Suburb:</label>
            <input type="text" id="search6" class = "searchbar" placeholder="Search for a Suburb">

            <label class = "searchlabel">Province:</label>
            <input type="text" id="search7" class = "searchbar" placeholder="Search for a Province">

            <label class = "searchlabel">Country:</label>
            <input type="text" id="search8" class = "searchbar" placeholder="Search for a Country">

            <div style = "display:flex; justify-content:center">
                <button type="button" onclick = "search()" style = "height: 25px; width:60px; font-size:12px; background-color:#212529; color: #FFC107; margin-top:10px; margin-right:5px">Search</button><br>
                <button type="button" onclick = "reset()" style = "height: 25px; width:60px; font-size:12px; background-color:#212529; color: #FFC107; margin-top:10px; margin-bottom:10px">Reset</button><br>
            </div>
        </div><br>

        <div style = "height: 60%; width:100%">
            <b class = "title">Filters:</b>
            <div class = "tab filtertab">

                <div id="suburbs">
                <label class = "filtertitle">Suburb:</label><br>
                    <div class="dropdown">
                        <input type="text" placeholder="Search for Suburbs" id="in0" class = "searchbar" style="width:95%" onkeyup="suburbFilterFunction()">
                        <div id="suburbDropdown" class="dropdown-content" style="overflow-y:scroll; height:95px"></div>
                    </div>
                </div>

                <div id="provinces">
                    <label class = "filtertitle">Province:</label><br>
                    <div class="dropdown">
                        <input type="text" placeholder="Search for Provinces" id="in1" class = "searchbar" style="width:95%" onkeyup="provinceFilterFunction()">
                        <div id="provinceDropdown" class="dropdown-content" style="overflow-y:scroll; height:95px"></div>
                    </div>
                </div>

                <div id="countries">
                    <label class = "filtertitle">Country:</label><br>
                    <div class="dropdown">
                        <input type="text" placeholder="Search for Countries" id="in2" class = "searchbar" style="width:95%" onkeyup="countryFilterFunction()">
                        <div id="countryDropdown" class="dropdown-content" style="overflow-y:scroll; height:95px"></div>
                    </div>
                </div>

                <div style = "display:flex; justify-content:center">
                <button type="button" onclick = "reset()" style = "height: 25px; width:60px; font-size:12px; background-color:#212529; color: #FFC107; margin-top:8px">Reset</button><br>
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

    function addSuburbs(j)//Function to add all suburbs to filters
    {
        numSuburbs = j.length;
        for(var i = 0; i  <j.length; i++)
        {
            $('#suburbDropdown').append('<div id = "' + j[i].Suburb + '" class = soption><input type="checkbox" style = "margin-left:5px" id="suburb' + i.toString() + '" onclick="filterWines()" value = "' + j[i].Suburb + '"><label for="t' + i.toString() +'" class="filterlabel">' + j[i].Suburb +  '</label></div>')
        }
    }

     function addProvinces(j)//Function to add all provinces to filters
    {
        numProvinces = j.length;
        for(var i = 0; i < j.length; i++)
        {
            $('#provinceDropdown').append('<div id = "' + j[i].Province + '" class = poption><input type="checkbox" style = "margin-left:5px" id="province' + i.toString() + '" onclick="filterWines()" value = "' + j[i].Province + '"><label class="filterlabel">' + j[i].Province + '</label></div>')
        }
    }

    function addCountries(j)//Function to add all countries to filters
    {
        numCountries = j.length;
        for(var i = 0; i < j.length; i++)
        {
            $('#countryDropdown').append('<div id = "' + j[i].Country + '" class = coption><input type="checkbox" style = "margin-left:5px" id="country' + i.toString() + '" onclick="filterWines()" value = "' + j[i].Country + '"><label class="filterlabel">' + j[i].Country + '</label></div>')
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
        for (var i=0; i<9; i++)
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
            for(var j=0; j<9; j++)
            {
                _td[j] = tr[i].getElementsByTagName("td")[j];
            }
            if (_td[0]) 
            {
                for(var j=0; j<9; j++)
                {
                    _tv[j] = _td[j].textContent;
                }
                if (_tv[0].toUpperCase().indexOf(input[0]) > -1 && _tv[1].toUpperCase().indexOf(input[1]) > -1 && _tv[2].toUpperCase().indexOf(input[2]) > -1 && _tv[3].toUpperCase().indexOf(input[3]) > -1 && _tv[4].toUpperCase().indexOf(input[4]) > -1 && _tv[5].toUpperCase().indexOf(input[5]) > -1 && _tv[6].toUpperCase().indexOf(input[6]) > -1 && _tv[7].toUpperCase().indexOf(input[7]) > -1 && _tv[8].toUpperCase().indexOf(input[8]) > -1)
                {
                    tr[i].style.display = "";
                } 
            }       
        }
    }

    function reset()//function implements filter reset button click
    {
        var div = document.getElementById("provinceDropdown");
        var a = div.getElementsByClassName("poption");
        for (var i = 0; i < a.length; i++) 
        {
            a[i].style.display = "";
        }
        div = document.getElementById("suburbDropdown");
        a = div.getElementsByClassName("soption");
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
        for (var i = 0; i<numSuburbs; i++)
        {
            document.getElementById('suburb' + i).checked=false;
        }
        for (var i = 0; i<numProvinces; i++)
        {
            document.getElementById('province' + i).checked=false;
        }
        for (var i = 0; i<numCountries; i++)
        {
            document.getElementById('country' + i).checked=false;
        }

        var table = document.getElementById("myTable");
        var tr = table.getElementsByTagName("tr");
    
        for (var i = 1; i < tr.length; i++) 
        {
            tr[i].style.display = "";
        }
        for (var i=0; i<3; i++)
        {
            document.getElementById('in' +i).value = ''; 
        }
        for (var i=0; i<9; i++)
        {
            document.getElementById('search'+i).value = ''; 
        }
    }

    function provinceFilterFunction() //Function to filter provinces in filter tab
    {
        var input = document.getElementById("in1");
        var filter = input.value.toUpperCase();
        var div = document.getElementById("provinceDropdown");
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

    function suburbFilterFunction() //Function to filter suburbs in filter tab
    {
        var input = document.getElementById("in0");
        var filter = input.value.toUpperCase();
        var div = document.getElementById("suburbDropdown");
        var a = div.getElementsByClassName("soption");
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

    function filterWines() //Function to filter table
    {

        var suburbInput = [], provinceInput = [], countryInput = [], found = [1,1,1];
        var input, _td = [], _tv = [];

        for (var i = 0; i<numSuburbs; i++)//adding checked suburbs
        {
            if(document.getElementById('suburb'+i).checked)
            {
                suburbInput.push(document.getElementById('suburb'+i).value.toUpperCase());
            }
        }

        for (var i = 0; i<numProvinces; i++)//adding checked provinces
        {
            if(document.getElementById('province'+i).checked)
            {
                provinceInput.push(document.getElementById('province'+i).value.toUpperCase());
            }
        }

        for (var i = 0; i<numCountries; i++)//adding checked countries
        {
            if(document.getElementById('country'+i).checked)
            {
                countryInput.push(document.getElementById('country'+i).value.toUpperCase());
            }
        }

        var table = document.getElementById("myTable");
        var tr = table.getElementsByTagName("tr");
    
        for (var i= 1; i<tr.length; i++) 
        {
            tr[i].style.display = "none";
        }


        for (var i = 0; i < tr.length; i++)
        {
            _td[0] = tr[i].getElementsByTagName("td")[6];//SUBURBS
            _td[1] = tr[i].getElementsByTagName("td")[7];//PROVINCES
            _td[2] = tr[i].getElementsByTagName("td")[8];//COUNTRIES

            if (_td[0]) 
            {
                _tv[0] = _td[0].textContent;
                _tv[1] = _td[1].textContent;
                _tv[2] = _td[2].textContent;
                for (var k = 0; k < suburbInput.length; k++)
                {
                    if (_tv[0].toUpperCase().indexOf(suburbInput[k]) <= -1)
                    {
                        found[0] = 0;
                    }  
                    if (_tv[0].toUpperCase().indexOf(suburbInput[k]) > -1)
                    {
                        found[0] = 1;
                        break;
                    } 
                }
                for (var k = 0; k < provinceInput.length; k++)
                {
                    if (_tv[1].toUpperCase().indexOf(provinceInput[k]) <= -1)
                    {
                        found[1] = 0;
                    }  
                    if (_tv[1].toUpperCase().indexOf(provinceInput[k]) > -1)
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
            } 

            if(found[0] == 1 && found[1] == 1 && found[2] == 1)
            {
                tr[i].style.display = "";
            }

            for(var k = 0; k < 5; k++)
            {
                found[k] = 1;
            }
        }
    }

    var numSuburbs, numCountries, numProvinces, numCountries;

    var str = "SELECT User_id AS ID, Email, Password, First_name AS 'First Name', Last_name AS 'Last Name', Street_name AS Street, Suburb, Province, Country FROM User";
    getWineDB(str,convert);

    str = "SELECT Suburb FROM User GROUP BY Suburb ORDER BY Suburb";
    getWineDB(str,addSuburbs);

    str = "SELECT Province FROM User GROUP BY Province ORDER BY Province";
    getWineDB(str,addProvinces);

    str = "SELECT Country FROM User GROUP BY Country ORDER BY Country";
    getWineDB(str,addCountries);

</script>

<?php include "footer.php";?>
