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
            buildProfile(JSONObject['nume'], JSONObject['prenume'], JSONObject['email'], JSONObject['inaltime'], JSONObject['greutate'], JSONObject['sex']);
            buildUrm(JSONObject['nume'], JSONObject['prenume'], JSONObject['email'], JSONObject['inaltime'], JSONObject['greutate'], JSONObject['sex'], JSONObject['id']);
            setTimeout(1000);
            buildMyRecipe(JSONObject['nume'], JSONObject['prenume'], JSONObject['email'], JSONObject['inaltime'], JSONObject['greutate'], JSONObject['sex'], JSONObject['id']);
        }
    });
    request.open('GET', URL + '?value=' + value, true);

    request.send(data);
}

function buildProfile(nume, prenume, email, inaltime, greutate, sex) {
    var root = document.getElementById("pi");
    var usr = localStorage.getItem("username");
    var newe = document.createElement('img');
    newe.id = "PI";
    if (sex === "masculin") {
        newe.src = "../image/Profil_Baiat.png";
    } else {
        newe.src = "../image/Profil_Fata.png";
    }
    document.getElementById("pi").append(newe);
    var outName = nume + ' ' + prenume;

    document.getElementById("nm").textContent = document.getElementById("nm").textContent + ' ' + outName;
    document.getElementById("em").textContent = document.getElementById("em").textContent + ' ' + email;
    document.getElementById("in").textContent = document.getElementById("in").textContent + ' ' + inaltime + " centimetri";
    document.getElementById("gr").textContent = document.getElementById("gr").textContent + ' ' + greutate + " kilograme";
    document.getElementById("imc").textContent = document.getElementById("imc").textContent + ' ' + (parseInt(greutate) / (parseInt(inaltime) / 100 * parseInt(inaltime) / 100)).toString();
}


// ES6 function type :)
const numberOfRecipe = id => {
    var rezultat;
    const URL = document.URL.split("/page")[0] + "/pageCod/phpFile/profileLoading/loadOtherRecipe.php";
    const data = JSON.stringify({
        msg: id
    });
    const request = new XMLHttpRequest();
    request.addEventListener('load', function () {
        if (this.readyState === 4 && this.status === 200) {
            rezultat = parseInt(this.responseText);
        }
    });

    request.open('GET', URL + '?value=' + id, false );
    request.send(data);

    return rezultat;
};


function buildUrm(nume, prenume, email, inaltime, greutate, sex, id) {
    let numar_retete1 = numberOfRecipe(id);
    var root = document.getElementById("baza");
    if (numar_retete1 > 0) {
        var baseDiv = document.createElement("div");
        baseDiv.id = "ru";
        baseDiv.className = "reteteUrmate";
        root.append(baseDiv);
        var h1 = document.createElement('h1');
        h1.id = "hru";
        h1.textContent = "Retete pe care le-am mancat";
        baseDiv.append(h1);
        allRecipe(id);
    } else {
        var doc = document.createElement("div");
        doc.style.height = "600px";
        doc.style.opacity = "0";
        root.append(doc);
    }
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
    request.open('GET', URL + '?value=' + id, false);
    request.send(data);
}

