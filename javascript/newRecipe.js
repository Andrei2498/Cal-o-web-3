var i = 1;
var searchResult = (value) => {
    const URL = document.URL.split("/page")[0]+'/pageCod/phpFile/searchRequest.php';
    console.log(URL);
    console.log(value);
    const data = JSON.stringify({
        msg: value
    });

    const request = new XMLHttpRequest();

    request.addEventListener('load', function () {
        if (this.readyState === 4 && this.status === 200) {
            console.log(this.responseText);
        }
        if (request.status === 404) {
            console.log('not found');
        }
    });
    request.open('GET', URL+'?value=' + value, true);
    request.send(data);

}

function addNewLine() {

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
}

function deleteLine() {
    tableRef = document.getElementById("ingredientsTable");
    currentLine = document.activeElement.parentNode.parentNode;
    tableRef.removeChild(currentLine);
}

