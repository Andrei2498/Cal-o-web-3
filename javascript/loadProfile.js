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
            loadInformation(JSONObject['inaltime'], JSONObject['greutate']);
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

function buildLine(jsonFile) {
    var result = JSON.parse(jsonFile);
    var root = document.getElementById("baza");
    var q = 0;
    for (var i in result) {
        q = q + 1;
    }
    if (q > 0) {
        var reteUrmateList = document.createElement("div");
        reteUrmateList.id = "bl";
        reteUrmateList.className = "boxLine";
        root.append(reteUrmateList);
        var t = 0;
        for (var i in result) {
            var newBox = document.createElement("div");
            newBox.id = "bx";
            newBox.className = "box" + (t % 2 + 1);
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
}

function buildMyRecipe(nume, prenume, email, inaltime, greutate, sex,id) {
    if(numberOfMyRecipe(id) > 0){
        var root = document.getElementById("baza");
        var baseDiv = document.createElement("div");
        baseDiv.id = "rp";
        baseDiv.className = "retetePuse";
        root.append(baseDiv);
        var h1 = document.createElement('h1');
        h1.id = "hrp";
        h1.textContent = "Retete pe care le-am creat";
        baseDiv.append(h1);
        allMyRecipe(id);
    }
}

function numberOfMyRecipe(id) {
    const URL = document.URL.split("/page")[0] + "/pageCod/phpFile/profileLoading/loadNumberOfMyRecipe.php";
    const data = JSON.stringify({
        msg: id
    });
    var aux = 0;
    const request = new XMLHttpRequest();
    request.addEventListener('load', function () {
        if (this.readyState === 4 && this.status === 200) {
            aux = parseInt(this.responseText);
            // return aux;
        }
    });
    request.open('GET', URL + '?value=' + id, false);
    request.send(data);

    return aux;
}

function allMyRecipe(id) {
    const URL = document.URL.split("/page")[0] + "/pageCod/phpFile/profileLoading/loadAllMyRecipe.php";
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

function loadInformation(inaltime, greutate){
    var root = document.getElementById("lifo");
    if(root !== null){
        var IMC = (greutate)/((inaltime/100) * (inaltime/100));
        var newElement = document.createElement('h4');
        newElement.textContent = "Intervalele IMC";
        newElement.id = "iImc";
        newElement.style.textAlign = "center";
        root.append(newElement);
        var newElement1 = document.createElement('div');
        newElement1.className = "newClass";
        newElement1.id = "nEl";
        root.append(newElement1);
        newElement = document.createElement('div');
        newElement.className = "lineColor";
        newElement.id = "LcL";
        document.getElementById("nEl").append(newElement);
        var newRoot = document.getElementById("LcL");
        var table = document.createElement("table");
        table.id = "tabl";
        // TABLE ROW
        var headLine = document.createElement("tr");

        var thead1 = document.createElement("th");
        var thead2 = document.createElement("th");
        var thead3 = document.createElement("th");
        var thead4 = document.createElement("th");
        var thead5 = document.createElement("th");
        thead1.className = "d1";
        headLine.append(thead1);
        thead2.className = "d2";
        headLine.append(thead2);
        thead3.className = "d3";
        headLine.append(thead3);
        thead4.className = "d4";
        headLine.append(thead4);
        thead5.className = "d5";
        headLine.append(thead5);
        table.append(headLine);
        var nextRow = document.createElement("tr");

        var tcol1 = document.createElement("td");
        var tcol2 = document.createElement("td");
        var tcol3 = document.createElement("td");
        var tcol4 = document.createElement("td");
        var tcol5 = document.createElement("td");
        tcol1.style.textAlign = "left";
        tcol1.textContent = "x";
        tcol2.style.textAlign = "left";
        tcol2.textContent = "18.5";
        tcol3.style.textAlign = "left";
        tcol3.textContent = "25";
        tcol4.style.textAlign = "left";
        tcol4.textContent = "30";
        tcol5.style.textAlign = "left";
        tcol5.innerHTML = "40+ ";
        nextRow.append(tcol1);

        nextRow.append(tcol2);
        nextRow.append(tcol3);
        nextRow.append(tcol4);
        nextRow.append(tcol5);
        table.append(nextRow);

        var lastRow = document.createElement("tr");

        var last1 = document.createElement("td");
        var last2 = document.createElement("td");
        var last3 = document.createElement("td");
        var last4 = document.createElement("td");
        var last5 = document.createElement("td");
        last1.textContent = "Subponderal";
        last1.id = "SP";
        last2.textContent = "Normoponderal";
        last2.id = "NP";
        last3.textContent = "Supraponderal";
        last3.id = "SRP";
        last4.textContent = "Obezitate";
        last4.id = "OBEZ";
        last5.textContent = "Obezitate morbida";
        last5.id = "OM";

        lastRow.append(last1);
        lastRow.append(last2);
        lastRow.append(last3);
        lastRow.append(last4);
        lastRow.append(last5);

        table.append(lastRow);
        newRoot.append(table);

        console.log("Este red: ");
        console.log(IMC);
        console.log("Tipul este: " + typeof IMC);
        if(IMC <= 18.5){
            listGray();
        } else if (IMC > 18.5 && IMC <= 25){
            listGreen();
        } else if (IMC > 25 && IMC <= 30){
            listYellow();
        } else if (IMC > 30 && IMC <= 40){
            listOrange();
        } else if( IMC > 40 ){
            listRed();
        }
    }
}

function listGray() {
    var root = document.getElementById("lifo");
    if(root !== null){
        var resultat = document.createElement("h4");
        resultat.style.color = "black";
        resultat.style.backgroundColor = "gray";
        resultat.style.textAlign = "center";
        resultat.textContent = "Subponderal";
        var text = document.createElement('p');
        text.style.color = "gray";
        text.textContent = "Ai o greutate mai mică decât cea normală pentru înălțimea ta. " +
            "Acest lucru te predispune unor afecțiuni precum osteoporoza, anemia sau infertilitatea. " +
            "Te invităm să discuți cu medicul nutriționist, care va determina dacă ai un metabolism accelerat " +
            "sau o afecțiune care previne asimilarea nutrienților și îți va recomanda metode de creștere corectă în greutate.";
        root.append(resultat);
        root.append(text);
        document.getElementById("SP").style.color = "gray";
    }
}

function listGreen() {
    var root = document.getElementById("lifo");
    if(root !== null){
        var resultat = document.createElement("h4");
        resultat.style.color = "black";
        resultat.style.backgroundColor = "green";
        resultat.style.textAlign = "center";
        resultat.textContent = "Normalponderal";
        var text = document.createElement('p');
        text.style.color = "green";
        text.textContent = "Felicitări! Conform măsurătorilor tale, te încadezi în categoria persoanelor care au o greutate normală. " +
            "Te invităm să discuți cu medicul nutriționist care să te ajute să menții acest stil de viață sănătos, alegând cele mai " +
            "corecte principii alimentare în dieta ta. Tot nutriționistul îți poate recomanda un set de analize pentru o evaluare a " +
            "sănătății tale și o scanare iDXA care să identifice dispoziția kilogramelor tale, compoziția organismului și eventualele " +
            "deficiențe care trebuie compensate.";
        root.append(resultat);
        root.append(text);
        document.getElementById("NP").style.color = "green";
    }
}

function listYellow() {
    var root = document.getElementById("lifo");
    if(root !== null){
        var resultat = document.createElement("h4");
        resultat.style.color = "black";
        resultat.style.backgroundColor = "Yellow";
        resultat.style.textAlign = "center";
        resultat.textContent = "Supraponderal";
        var text = document.createElement('p');
        text.style.color = "yellow";
        text.textContent = "Ai un exces de kilograme față de o greutate normală pentru înălțimea ta. " +
            "Îți recomandăm un plan de investigații complet și o discuție cu medicul nutriționist, " +
            "pentru că dincolo de suprapondere urmează obezitatea. Este mai bine să prevenim decât " +
            "să tratăm. În contextul unor patologii asociate, cum sunt diabetul zaharat, hipertensiunea " +
            "arterială, dislipidemia, infertilitatea, suferințele osteoarticulare, te invităm la seminarul de obezitate.";
        root.append(resultat);
        root.append(text);
        document.getElementById("SRP").style.color = "yellow";
    }
}

function listOrange() {
    var root = document.getElementById("lifo");
    if(root !== null){
        var resultat = document.createElement("h4");
        resultat.style.color = "black";
        resultat.style.backgroundColor = "orange";
        resultat.style.textAlign = "center";
        resultat.textContent = "Obezitate";
        var text = document.createElement('p');
        text.style.color = "orange";
        text.textContent = "Un indice al masei corporale BMI > 30 crește exponențial riscul de complicații și " +
            "patologii asociate, dintre care cele mai grave sunt diabetul zaharat și bolile cardiovasculare. " +
            "Prezența kilogramelor în plus înseamnă multe probleme în plus. Înainte de a trece la grade din " +
            "ce în ce mai avansate de obezitate, îți recomandăm un set de investigații și te invităm la seminarul " +
            "despre chirurgia obezității. Împreună vom identifica o soluție pentru problema ta.";
        root.append(resultat);
        root.append(text);
        document.getElementById("OBEZ").style.color = "orange";
    }
}

function listRed() {
    var root = document.getElementById("lifo");
    if(root !== null){
        var resultat = document.createElement("h4");
        resultat.style.color = "black";
        resultat.style.backgroundColor = "red";
        resultat.style.textAlign = "center";
        resultat.textContent = "Obezitate morbidă";
        var text = document.createElement('p');
        text.style.color = "red";
        text.textContent = "Un indice al masei corporale BMI > 40 limitează funcțiile de bază ale organismului, presum respirația sau mersul." +
        "Mai mult, obezitatea morbidă crește alarmant riscul de diabet zaharat, hipertensiune, apnee în somn, reflux " +
        " gastroesofagial, pietre la vezica biliară, artrită, boli cardiace și cancer. " +
           " Este important să îți faci un set de investigații și să participi la seminarul despre chirurgia obezității. " +
            "Împreună cu medicul chirurg vei putea alege cea mai potrivită intervenție care te va ajuta să duci o viață normală.";
        root.append(resultat);
        root.append(text);
        document.getElementById("OM").style.color = "red";
    }
}

