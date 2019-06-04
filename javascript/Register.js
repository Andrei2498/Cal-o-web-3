var searchResult = (value) => {
    const URL = document.URL.split("/page")[0] + "/pageCod/phpFile/RegisterFunctions/usernameSearch.php";
    const data = JSON.stringify({
        msg: value
    });

    const request = new XMLHttpRequest();

    request.addEventListener('load', function () {
        if (this.readyState === 4 && this.status === 200) {
            if(parseInt(this.responseText.valueOf()) > 0){
                errorMessage();
                document.getElementById("nm").style.borderBottomColor = "red";
            } else {
                deleteErrorMessage();
                document.getElementById("nm").style.borderBottomColor = "green";
            }
        }
        if (request.status === 404) {
            deleteErrorMessage();
        }
        if(value.length === 0){
            document.getElementById("nm").style.borderBottomColor = "";
        }
    });
    request.open('GET', URL+'?value=' + value, true);
    request.send(data);

};

function errorMessage() {
    if(document.getElementById("temp") == null){
        var root = document.getElementById("errorMessages");
        var outMessage = document.createElement('h3');
        outMessage.id = "temp";
        outMessage.textContent = "Acest username este deja folosit";
        root.append(outMessage);
    }
}

function deleteErrorMessage() {
    var root = document.getElementById("temp");
    if(root != null){
        root.parentNode.removeChild(root);
    }
}

function submitRegisetr(){
    var ok = true;
    var ok1 = true;
    deleteAllInput();
    if(document.getElementById('fm').value === ""){
        completeAllInput();
        ok = false;
    }
    if(document.getElementById('lm').value === ""){
        completeAllInput();
        ok = false;
    }
    if(document.getElementById('em').value === ""){
        completeAllInput();
        ok = false;
    }
    if(document.getElementById('nm').value === ""){
        completeAllInput();
        ok = false;
    }
    if(document.getElementById('pw').value === ""){
        completeAllInput();
        ok = false;
    }
    if(document.getElementById('re-pw').value === ""){
        completeAllInput();
        ok = false;
    }
    if(!document.getElementById("terms").checked){
        document.getElementById("terms").style.borderBottomColor = "red";
        ok1 = false;
        alert("Acceptati termenii si conditiile pentru a continua.");
    }
    var pass = document.getElementById("pw").value;
    var repass = document.getElementById("re-pw").value;
    if(pass === repass){
        var root = document.getElementById("not-same-pass");
        if(root != null){
            root.parentNode.removeChild(root);
        }
    } else {
        passError();
        ok = false;
    }
    ok = testPassword();
    if(ok1 === true && ok === true){
        return ok;
    } else {
        return false;
    }
}

function completeAllInput() {
    if(document.getElementById("complete-all") == null){
        var root = document.getElementById("errorMessages");
        var outMessage = document.createElement('h3');
        outMessage.id = "complete-all";
        outMessage.textContent = "Completati toate camputile";
        root.append(outMessage);
    }
}

function deleteAllInput() {
    if(document.getElementById("complete-all") != null){
        var root = document.getElementById("complete-all");
        if(root != null){
            root.parentNode.removeChild(root);
        }
    }
}

function testPassword() {
    var pass = document.getElementById("pw").value;
    var repass = document.getElementById("re-pw").value;
    if(document.getElementById("re-pw").value.length === 0){
        document.getElementById("re-pw").style.borderBottomColor = "";
        return false;
    }
    if(pass === repass){
        document.getElementById("pw").style.borderBottomColor = "green";
        document.getElementById("re-pw").style.borderBottomColor = "green";
        return true;
    } else {
        document.getElementById("pw").style.borderBottomColor = "red";
        document.getElementById("re-pw").style.borderBottomColor = "red";
        return false;
    }
}

function passError() {
    if(document.getElementById("not-same-pass") == null){
        var root = document.getElementById("errorMessages");
        var outMessage = document.createElement('h3');
        outMessage.id = "not-same-pass";
        outMessage.textContent = "Parolele difera";
        root.append(outMessage);
    }
}

function testNume(values,ids) {
    if(values.length > 0){
        var skpip = false;
        if(values[0] !== values[0].toUpperCase()){
            document.getElementById(ids).style.borderBottomColor = "red";
            skip = true;
            createNameError("Numele trebuie sa inceapa cu litera mare");
        } else {
            document.getElementById(ids).style.borderBottomColor = "green";
            deleteNameError();
        }
        var aux = values[values.length - 1];
        if(aux.toLowerCase().match(/[a-z]/)){
            if(skip === false){
                document.getElementById(ids).style.borderBottomColor = "green";
            }
        } else {
            document.getElementById(ids).style.borderBottomColor = "red";
            createNameError("Introduceti doar litere");
        }
    } else if(values.length === 0){
        document.getElementById(ids).style.borderBottomColor = "";
    }
}

function createNameError(errName){
    var err = document.getElementById("name-error");
    if(err === null){
        var outMessage = document.createElement('h3');
        outMessage.id = "name-error";
        outMessage.textContent = errName;
        document.getElementById("errorMessages").append(outMessage);
    }
}

function deleteNameError() {
    if(document.getElementById("name-error") != null){
        var root = document.getElementById("name-error");
        if(root != null){
            root.parentNode.removeChild(root);
        }
    }
}

function dinamicPassTest(valoare){
    var change = document.getElementById("pw");
    if(valoare.length === 0){
        change.style.borderBottomColor = "";
    } else if(valoare.length >0 && valoare.length < 8){
        change.style.borderBottomColor = "#ff4d4d";
    } else if (valoare.length >= 8 && valoare.length < 13 ){
        change.style.borderBottomColor = "yellow";
    } else {
        change.style.borderBottomColor = "green";
    }
}