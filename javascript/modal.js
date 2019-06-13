var modal;
var btn;
var span;
var table;
var input;
var i;
var myNode;
var dataList = [];
var caloriesList = [];
var recipesId = [];
const requestURL = document.URL.split("/page")[0] + '/pageCod/phpFile/addFollowedRecipes.php';
const requestURL2 = document.URL.split("/page")[0] + '/pageCod/phpFile/searchRecipeRequest.php';
window.onload = function () {
    i = 0;
    // modal = document.getElementById("myModal");
    // btn = document.getElementById("myBtn");
    // btn.onclick = function () {
    //     modal.style.display = "block";
    // };
    table = document.getElementsByTagName("table")[0];
    input = document.getElementById("inputt");
    myNode = document.getElementById("recipeList");
};

function add() {
    if (dataList.contains(document.getElementById("recipeInput").value)) {
        i++;
        var rec = document.getElementById("recipeInput");

        var recipeName = document.createElement("td");
        var recipeCalories = document.createElement("td");
        var recipeAction = document.createElement("td");
        recipeName.textContent = rec.value;
        rec.value = "";
        recipeCalories.textContent = caloriesList[recipeName.textContent];
        var deleteButton = document.createElement("input");
        deleteButton.type = "submit";
        deleteButton.value = "Delete";
        deleteButton.onclick = ev => {
            deleteLine();
            return false;
        };
        recipeAction.append(deleteButton);
        var linie = document.createElement("tr");
        linie.append(recipeName);
        linie.append(recipeCalories);
        linie.append(recipeAction);
        table.append(linie);
        table.append(input);
    }
}

function deleteLine() {
    i--;
    table.removeChild(document.activeElement.parentNode.parentNode);
}

var checkRecipe = (value) => {
    if (!dataList.contains(value)) {
        document.activeElement.parentNode.style.borderColor = "red";
    } else {
        document.activeElement.parentNode.style.borderColor = "black";
    }
    if (value.length > 2) {
        httpRequest(value, "GET");
    } else {
        clearDataList();
    }
};

function httpRequest(arg, method) {
    const request = new XMLHttpRequest();
    request.addEventListener('load', function () {
            switch (method) {
                case "POST":
                    if (this.readyState === 4 && this.status === 200) {
                        console.log(request.responseText);
                    }
                    break;
                case "GET":
                    if (this.readyState === 4 && this.status === 200) {

                        var jsonOptions = JSON.parse(request.responseText);
                        dataListCreate(jsonOptions);
                    }
                    if (request.status === 404) {
                        console.log('not found');
                    }
                    break;
            }
        }
    );
    if (method === "POST") {
        var params = "addFollowedRecipes=" + arg;
        request.open(method, requestURL, false);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send(params);
    } else {
        request.open('GET', requestURL2 + '?value=' + arg, true);
        request.send();
    }
}

function dataListCreate(json) {
    clearDataList();
    Object.values(json).forEach(function (item) {
        // Create a new <option> element.
        var option = document.createElement('option');
        // Set the value using the item in the JSON array.

        option.value = item["denumire"];
        caloriesList[item["denumire"]] = item["calorii"];
        dataList.push(item["denumire"]);
        recipesId[item["denumire"]] = item["id"];
        // Add the <option> element to the <datalist>.
        myNode.appendChild(option);
    });
}

function clearDataList() {
    while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
    }
}

Array.prototype.contains = function (needle) {
    for (p in this) {
        if (this[p] === needle) return true;
    }
    return false;
};

function submitRecipes(){
    if(i===0){
        alert("Nici o reteta nu a fost adaugata!");
    }
    var array = [];
    k=0;
    table.childNodes.forEach( function (line) {
        if(line.id !== input.id && line.nodeName==="TR"){
            array[k]=recipesId[line.firstChild.textContent];
            k++;
        }
    });
    var json = JSON.stringify(array);
    httpRequest(json,"POST");
    return true;
}