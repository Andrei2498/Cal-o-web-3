var i = 1;
var myNode;
var dataList = [];
var umList = [];
var ingredientsCalories = [];
var listaRetete = [];
var calorii = 0;
var ingName;
var dataListRecipe;
var dataListIngredient;
var numarIngrediente=0;
var numartTotalCalorii=0;

window.onload = function () {
    ingName = document.getElementById("findIngredient");
    dataListRecipe = document.getElementById('json-datalist-Recipe');
     dataListIngredient = document.getElementById('json-datalist');
    ingName.addEventListener('input', function () {
        console.log(dataList);
        if (dataList.contains(this.value))
            measure.value = umList[this.value];
    });
};



var searchRecipeResult = (value) => {
    if (value.length > 2) {
        var URL;
        var ok;
        var input = document.getElementById('ajax');
        if (document.activeElement.getAttribute("name") === "recipeName") {
            URL = document.URL.split("/page")[0] + '/pageCod/phpFile/searchRecipeRequest.php';
            ok=0;
        } else if (document.activeElement.getAttribute("name") === "Ingredient") {
            URL = document.URL.split("/page")[0] + '/pageCod/phpFile/searchRequest.php';
            ok=1;
        }
        console.log(URL);
        console.log(value);


        const request = new XMLHttpRequest();

        request.addEventListener('load', function () {
            if (this.readyState === 4 && this.status === 200) {
                console.log(this.responseText);
                var jsonOptions = JSON.parse(this.responseText);
                dataListCreate(jsonOptions , ok);
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
}


function addNewLine() {
    var totalIngrediente=document.getElementById("TotalIngrediente");
    var totalCalorii=document.getElementById("TotalCalorii");
    var ingredientName = document.getElementsByName("Ingredient")[0];
    var ingredientQuantity = document.getElementsByName("Quantity")[0];
    if (!isNaN(ingredientQuantity.value)&&ingredientQuantity.value.length>0&&ingredientsCalories[ingredientName.value]!==undefined) {
        var row = document.createElement('tr');
        var name = document.createElement('td');
        var quantity = document.createElement('td');
        var count = document.createElement('td');
        var buttonE = document.createElement('td');
        var buttonD = document.createElement('td');
        var buttonEdit = document.createElement('input');
        buttonEdit.type = "submit";
        buttonEdit.value = "Edit";
        var buttonDelete = document.createElement('input');
        buttonDelete.type = "submit";
        buttonDelete.value = "Delete";

        buttonE.append(buttonEdit);
        buttonD.append(buttonDelete);
        name.innerText = ingredientName.value;
        quantity.innerText = ingredientQuantity.value;
        count.innerText = calculateCalories(ingredientQuantity.value,ingredientName.value);
        row.appendChild(name);
        row.appendChild(quantity);
        row.appendChild(count);
        row.appendChild(buttonE);
        row.appendChild(buttonD);
        document.getElementById('tabelaIngrediente').appendChild(row);

        buttonDelete.onclick = ev => {
            deleteLine();
            totalIngrediente.innerText=numarIngrediente.toString();
            totalCalorii.innerText=numartTotalCalorii.toString();
            return false;
        };
        buttonEdit.onclick = ev => {
            editLine();
            return false;
        };
        numarIngrediente++;
        numartTotalCalorii+=parseInt(count.innerText);
        totalIngrediente.innerText=numarIngrediente.toString();
        totalCalorii.innerText=numartTotalCalorii.toString();

    }


}


function calculateCalories(quantity,numeIngredient){
    if(quantity<0)
        return 0;
    return (quantity*ingredientsCalories[numeIngredient])/100;

}

function calculateQuantity(calories,numeIngredient)  {
    if(calories<0)
        return 0;
    return((calories*100)/ingredientsCalories[numeIngredient])
}

function editLine() {
    tableRef = document.getElementById("tabelaIngrediente");
    currentLine = document.activeElement.parentNode.parentNode;
    var Quantity = document.createElement('td');
    var Count = document.createElement('td');
    var quantity = document.createElement('input');
    quantity.type = "number";
    var calories = document.createElement('input');
    calories.type = "number";
    Quantity.appendChild(quantity);
    Count.appendChild(calories);
    Quantity.setAttribute("onkeyup",'realTimeQuantityCaloriesConverter(this)');
    Quantity.setAttribute("id","Cantitate");
    Quantity.setAttribute("onkeypress","return event.charCode >= 48");
    Count.setAttribute("onkeyup",'realTimeQuantityCaloriesConverter(this)');
    Count.setAttribute("id","Calorii");
    Count.setAttribute("onkeypress","return event.charCode >= 48");
    currentLine.childNodes.item(1).replaceWith(Quantity);
    currentLine.childNodes.item(2).replaceWith(Count);

    var buttonD = document.createElement('td');
    var buttonDone = document.createElement('input');
    buttonDone.type = "submit";
    buttonDone.value = "Done";
    buttonD.appendChild(buttonDone);
    currentLine.childNodes.item(3).replaceWith(buttonD);

    buttonDone.onclick = ev => {
        if (!(quantity.value === "" || calories.value === "")) {
            quantity.readOnly = true;
            calories.readOnly = true;
            buttonDone.value = "Edit";
            buttonDone.onclick = ev1 => {
                editLine();
            };
        }
        return false;
    }
}


function deleteLine() {
    tableRef = document.getElementById("tabelaIngrediente");
    currentLine = document.activeElement.parentNode.parentNode;
    numarIngrediente--;
    numartTotalCalorii-=parseInt(currentLine.childNodes.item(2).textContent);
    tableRef.removeChild(currentLine);
}


function clearDataList() {
    while (dataListIngredient.firstChild) {
        dataListIngredient.removeChild(dataListIngredient.firstChild);
    }
    while (dataListRecipe.firstChild) {
        dataListRecipe.removeChild(dataListRecipe.firstChild);
    }
}

function dataListCreate(json, ok) {
    clearDataList();
    Object.values(json).forEach(function (item) {
        // Create a new <option> element.
        var option = document.createElement('option');
        // Set the value using the item in the JSON array.

        option.value = item["nume"];
        ingredientsCalories[item["nume"]] = item["valoare"];
        listaRetete[item["denumire"]] = item["id"];
        umList[item["nume"]] = item["um"];
        i++;
        // datalist.push(item["nume"]);
        // Add the <option> elemenst to the <datalist>.
        if(ok === 0)
            dataListRecipe.appendChild(option);
        else
            dataListIngredient.appendChild(option);
    });
}

Array.prototype.contains = function (needle) {
    for (i in this) {
        if (this[i] === needle) return true;
    }
    return false;
};

function length(obj) {
    return Object.keys(obj).length;
}


function handleKeyPress(e){
    var key=e.keyCode || e.which;
    if (key===13){
        var input = document.getElementById('ajax');
        if(listaRetete[input.innerText]!==undefined){
            console.log("Merge");
        }
    }
}

function realTimeQuantityCaloriesConverter(element) {
    var numeProdus=element.parentNode.childNodes.item(0);
    var caloriiCurente =element.parentNode.childNodes.item(2);
    var cantitateCurenta=element.parentNode.childNodes.item(1);
    cantitateCurenta.style.borderColor = "";
    caloriiCurente.style.borderColor = "";

    if(element.getAttribute("id")==="Cantitate"){
        caloriiCurente.firstChild.value= calculateCalories(cantitateCurenta.firstChild.value,numeProdus.innerText);
    }
    else if(element.getAttribute("id")==="Calorii"){
        cantitateCurenta.firstChild.value=calculateQuantity(caloriiCurente.firstChild.value,numeProdus.innerText);
    }

}

