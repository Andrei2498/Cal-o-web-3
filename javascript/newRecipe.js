var dataList = []; // lista cu ingredientele cu lista ingredientelor din bd care au fost descoperite.
var ingredientsCalories = []; // lista cu numarul de calorii pentru ingredientele din dataList
var idIngrediente = [];

var i;
var calorii ;// numarul de calorii ce este afisat pentru reteta(initial este 0).


var ingName;
var ingQu;

var tableRef;

var input;

var errorMsg;

const requestURL = document.URL.split("/page")[0] + '/pageCod/phpFile/searchRequest.php';
window.onload = function () {
    myNode = document.getElementById("json-find");
    ingName = document.getElementById("findIngredient");
    tableRef = document.getElementById("ingredientsTable");
    input = document.getElementById("input");
    ingQu = document.getElementsByName("ingredientQuantity")[0];
    errorMsg = document.getElementsByTagName("h3")[0];
    i=0;
    calorii = 0;
};

var checkValue = (value) => {
    if (value < 1 && value !== "") {
        document.activeElement.parentNode.style.borderColor = "red";
    } else
        document.activeElement.parentNode.style.borderColor = "black";

};
var searchResult = (value) => {
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

function clearDataList() {
    while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
    }
}

function dataListCreate(json) {
    clearDataList();
    Object.values(json).forEach(function (item) {
        // Create a new <option> element.
        var option = document.createElement('option');
        // Set the value using the item in the JSON array.

        option.value = item["nume"];
        idIngrediente[item["nume"]] = item["id"];
        ingredientsCalories[item["nume"]] = item["valoare"];
        dataList.push(item["nume"]);
        // Add the <option> element to the <datalist>.
        myNode.appendChild(option);
    });
}


function addNewLine() {
    if (dataList.contains(ingName.value)) {

        i++;
        var line = document.createElement('tr');
        var nume = document.createElement('td');
        var quantity = document.createElement('td');
        var button = document.createElement('td');

        var buttonDelete = document.createElement('input');

        buttonDelete.type = "submit";
        buttonDelete.value = "delete";
        buttonDelete.onclick = ev => {
            deleteLine();
            return false;
        };

        button.append(buttonDelete);

        nume.innerText = ingName.value;
        quantity.innerText = ingQu.value;

        line.append(nume);
        line.append(quantity);
        line.append(button);

        tableRef.append(line);
        tableRef.append(input);

        calorii = calorii + ingredientsCalories[ingName.value] * ingQu.value / 100;

        ingName.value = null;
        ingQu.value = null;

        updateCalorii();
    }
}

function deleteLine() {
    i--;
    tableRef = document.getElementById("ingredientsTable");
    currentLine = document.activeElement.parentNode.parentNode;
    if (currentLine.id !== 'input') {
        calorii = calorii - ingredientsCalories[currentLine.childNodes.item(0).textContent] * currentLine.childNodes.item(1).textContent / 100;
        updateCalorii();
        tableRef.removeChild(currentLine);
    }
}

Array.prototype.contains = function (needle) {
    for (i in this) {
        if (this[i] === needle) return true;
    }
    return false;
};

function updateCalorii() {
    var p = document.getElementById("calorii");
    text = p.innerText.split(':')[0];
    p.innerText = text + ": " + calorii;
}

function addRecipeButton() {
    if (i === 0) {
        errorMsg.innerText = "Reteta nu are nici un ingredient";
        return false;
    }
    if (document.getElementsByName("RecipeName")[0].value === "") {
        errorMsg.innerText = "Reteta nu are alocata un nume";
        document.getElementsByName("RecipeName")[0].style.borderColor = "red";
        return false;
    }
    var array = [];
    var recipeName = document.getElementsByName("RecipeName")[0].value;
    array[i++] = {recipeName: recipeName, calorii:calorii};
    tableRef.childNodes.forEach(function (child) {
        if (child.id !== "input" && child.nodeName === "TR") {
            idProdus = idIngrediente[child.childNodes[0].textContent];
            cantitateProdus = child.childNodes[1].textContent;
            array[i++] = {idProdus:idProdus , cantitateProdus: cantitateProdus};
        }
    });
    var json = JSON.stringify(array);
    httpRequest(json, "POST");
    alert("The Recipe has been added !!");
    console.log(i);
    return false;
}


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
                        console.log(request.responseText);
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
        var params = "addRecipe=" + arg;
        request.open(method, requestURL,  false);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send(params);
    } else {
        request.open('GET', requestURL + '?value=' + arg, true);
        request.send();
    }

}

