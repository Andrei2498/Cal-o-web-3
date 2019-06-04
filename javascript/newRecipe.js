var i = 1;
var myNode;
var dataList = [];
var umList = [];
var ingredientsCalories = [];
var calorii = 0;
var ingName;

window.onload = function () {
    myNode = document.getElementById("json-find");
    ingName = document.getElementById("findIngredient");
    measure = document.getElementById("measure");
    measure.ReadOnly = true;
    ingName.addEventListener('input', function () {
        console.log(dataList);
        if (dataList.contains(this.value))
            measure.value = umList[this.value];
    });
};


var searchResult = (value) => {
    if (value.length > 2) {
        const URL = document.URL.split("/page")[0] + '/pageCod/phpFile/searchRequest.php';
        console.log(URL);
        console.log(value);

        const request = new XMLHttpRequest();

        request.addEventListener('load', function () {
            if (this.readyState === 4 && this.status === 200) {
                var jsonOptions = JSON.parse(request.responseText);
                console.log(request.responseText);
                dataListCreate(jsonOptions);
            }
            if (request.status === 404) {
                console.log('not found');
            }
        });
        request.open('GET', URL + '?value=' + value, true);
        request.send();
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
        ingredientsCalories[item["nume"]] = item["valoare"];
        umList[item["nume"]] = item["um"];
        i++;
        dataList.push(item["nume"]);
        // Add the <option> element to the <datalist>.
        myNode.appendChild(option);
    });
}


function addNewLine() {
    if (dataList.contains(document.getElementsByName("ingredientName")[0].value)) {
        var tableRef = document.getElementById("ingredientsTable");
        var input = document.getElementById("input");
        var ingredientName = document.getElementsByName("ingredientName")[0];
        var ingredientQuantity = document.getElementsByName("ingredientQuantity")[0];
        var ingredientMeasure = document.getElementsByName("ingredientMeasurement")[0];
        var line = document.createElement('tr');
        var nume = document.createElement('td');
        var quantity = document.createElement('td');
        var measure = document.createElement('td');
        var button = document.createElement('td');
        var buttonDelete = document.createElement('input');
        buttonDelete.type = "submit";
        buttonDelete.value = "delete";
        buttonDelete.onclick = ev => {
            deleteLine();
            return false;
        };
        button.append(buttonDelete);
        var inpNume = document.createElement('input');
        inpNume.value = ingredientName.value;
        inpNume.type = "text";
        inpNume.readOnly = true;
        inpNume.name = "NumeIngredient" + i;
        var inpQuantity = document.createElement('input');
        inpQuantity.value = ingredientQuantity.value;
        inpQuantity.type = "text";
        inpQuantity.readOnly = true;
        inpQuantity.name = "Quantity" + i;
        var inpMeasure = document.createElement('input');
        inpMeasure.value = ingredientMeasure.value;
        inpMeasure.type = "text";
        inpMeasure.readOnly = true;
        inpMeasure.name = "Measure" + i;
        i++;
        nume.append(inpNume);
        quantity.append(inpQuantity);
        measure.append(inpMeasure);
        ingredientName.value = null;
        ingredientQuantity.value = null;
        ingredientMeasure.value = null;
        line.append(nume);
        line.append(quantity);
        line.append(measure);
        line.append(button);
        tableRef.append(line);
        tableRef.append(input);
        calorii = calorii + ingredientsCalories[inpNume.value] * inpQuantity.value;
        updateCalorii();
    }
}

function deleteLine() {
    tableRef = document.getElementById("ingredientsTable");
    currentLine = document.activeElement.parentNode.parentNode;
    if (currentLine.id !== 'input')
        tableRef.removeChild(currentLine);
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