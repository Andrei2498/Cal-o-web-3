function loadImageProfile() {
    const URL = document.URL.split("/page")[0] + "/pageCod/phpFile/loadProfileInfo.php";
    value = localStorage.getItem("username");
    const data = JSON.stringify({
        msg: value
    });
    const request = new XMLHttpRequest();

    request.addEventListener('load', function () {
        if (this.readyState === 4 && this.status === 200) {
            var JSONObject = JSON.parse(this.responseText);
            buildProfile(JSONObject['nume'],JSONObject['prenume'],JSONObject['email'],JSONObject['inaltime'],JSONObject['greutate'],JSONObject['sex']);
            buildUrm(JSONObject['nume'],JSONObject['prenume'],JSONObject['email'],JSONObject['inaltime'],JSONObject['greutate'],JSONObject['sex'],JSONObject['id']);
        }
    });
    request.open('GET', URL+'?value=' + value, true);
    request.send(data);

}

function buildProfile(nume,prenume,email,inaltime,greutate,sex) {
    var root = document.getElementById("pi");
    var usr = localStorage.getItem("username");
    var newe = document.createElement('img');
    newe.id = "PI";
    if(sex === "masculin"){
        newe.src = "../image/Profil_Baiat.png";
    } else {
        console.log(sex);
        newe.src = "../image/Profil_Fata.png";
    }
    document.getElementById("pi").append(newe);
    var outName = nume + ' ' + prenume;

    document.getElementById("nm").textContent =  document.getElementById("nm").textContent + ' ' + outName;
    document.getElementById("em").textContent = document.getElementById("em").textContent + ' ' + email;
    document.getElementById("in").textContent = document.getElementById("in").textContent + ' ' + inaltime + " centimetri";
    document.getElementById("gr").textContent = document.getElementById("gr").textContent + ' ' + greutate + " kilograme";
    document.getElementById("imc").textContent = document.getElementById("imc").textContent + ' ' + (parseInt(greutate) / (parseInt(inaltime)/100 * parseInt(inaltime)/100)).toString();
}

function buildUrm(nume,prenume,email,inaltime,greutate,sex,id){
    if(numberOfRecipe(id) !== 0){
        var baseDiv = document.createElement("div");
        baseDiv.id = "ru";
        baseDiv.className = "reteteUrmate";
        var root = document.getElementById("baza");
        root.append(baseDiv);
        var h1 = document.createElement('h1');
        h1.id = "hru";
        h1.textContent = "Retete pe care le-am urmat";
        baseDiv.append(h1);
    }
    allRecipe(id);
}

function numberOfRecipe(id) {
    const URL = document.URL.split("/page")[0] + "/pageCod/phpFile/profileLoading/loadOtherRecipe.php";
    const data = JSON.stringify({
        msg: id
    });
    const request = new XMLHttpRequest();
    request.addEventListener('load', function () {
        if (this.readyState === 4 && this.status === 200) {
            var aux = parseInt(this.responseText);
            return aux;
        }
    });
    request.open('GET', URL+'?value=' + id, true);
    request.send(data);
}

function allRecipe(id) {
    const URL = document.URL.split("/page")[0] + "/pageCod/phpFile/profileLoading/loadAllOtherRecipe.php";
    const data = JSON.stringify({
        msg: id
    });
    const request = new XMLHttpRequest();
    request.addEventListener('load', function () {
        if (this.readyState === 4 && this.status === 200) {
            buildLine(this.responseText);
        }
    });
    request.open('GET', URL+'?value=' + id, true);
    request.send(data);
}

function buildLine(jsonFile) {
    var nume;
    var valoare;
    var data;
    // console.log(jsonFile);
    var root = document.getElementById("baza");
    var reteUrmateList = document.createElement("div");
    reteUrmateList.id = "bl";
    reteUrmateList.className = "boxLine";
    root.append(reteUrmateList);

    var t = 0;
    var result = JSON.parse(jsonFile);
    for(var i in result){
        var newBox = document.createElement("div");
        newBox.id = "bx";
        newBox.className = "box" + (t % 2 + 1);
        console.log(newBox.className);
        var nameBox = document.createElement("h1");
        nameBox.textContent = result[i]['nume'];
        var value = document.createElement("h2");
        value.textContent = result[i]['valoare'] + " calorii";
        var dateC = document.createElement("h2");
        dateC.textContent = result[i]['data'];
        newBox.append(nameBox);
        newBox.append(value);
        newBox.append(dateC);
        reteUrmateList.append(newBox);
        t = t + 1;
    }
}