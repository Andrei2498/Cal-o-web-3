
function sendData() {
    var ok = false;
    var ok1 = false;
    var ok2 = false;
    var ok3 = false;
    if(document.getElementById("in").value === ""){
        document.getElementById("in").style.borderBottomColor = "red";
        checkError();
    }
    if(document.getElementById("gr").value === ""){
        document.getElementById("gr").style.borderBottomColor = "red";
        checkError();
    }
    if(document.getElementById("vr").value === ""){
        document.getElementById("vr").style.borderBottomColor = "red";
        checkError();
    }
    if(document.getElementById("sx").value === ""){
        document.getElementById("sx").style.borderBottomColor = "red";
        checkError();
    }
    ok = heightPeople();
    ok1 = wheitPeople();
    ok2 = age();
    ok3 = gen();
    if(ok3 === true && ok1 === true && ok2 === true && ok === true){
        return true;
    } else {
        return false;
    }
}

function checkError(){
    var sends = document.getElementById("end-err");
    if(sends == null){
        var out = document.createElement("h3");
        out.id = "end-err";
        out.textContent = "Introduceti toate datele";
        document.getElementById("errorMessages").append(out);
        document.getElementById("in").style.borderBottomColor = "red";
        return false;
    }
}

function heightPeople(){
    var x = document.getElementById("in").value;
    deleteAmessage();
    if (isNaN(x) || x < 15 || x > 200) {
        document.getElementById("in").style.borderBottomColor = "red";
        numberError("Inaltime incorecta");
        if(x.length === 0){
            deleteAmessage();
            document.getElementById("in").style.borderBottomColor = "";
        }
        return false;
    } else {
        document.getElementById("in").style.borderBottomColor = "green";
        return true;
    }
}

function age(){
    var x = document.getElementById("vr").value;
    deleteAmessage();
    if (isNaN(x) || x < 1 || x > 130) {
        document.getElementById("vr").style.borderBottomColor = "red";
        numberError("Varsta este incorecta");
        if(x.length === 0){
            deleteAmessage();
            document.getElementById("vr").style.borderBottomColor = "";
        }
        return false;
    } else {
        document.getElementById("vr").style.borderBottomColor = "green";
        return true;
    }
}

function wheitPeople() {
    var x = document.getElementById("gr").value;
    deleteAmessage();
    if (isNaN(x) || x < 15 || x > 200) {
        document.getElementById("gr").style.borderBottomColor = "red";
        numberError("Greutatea este incorecta");
        if(x.length === 0){
            deleteAmessage();
            document.getElementById("gr").style.borderBottomColor = "";
        }
        return false;
    } else {
        document.getElementById("gr").style.borderBottomColor = "green";
        return true;
    }
}

function gen(){
    var x = document.getElementById("sx").value;
    dellGenErr();
    if(x === "masculin" || x === "feminin"){
        document.getElementById("sx").style.borderBottomColor = "green";
        dellGenErr();
        return true;
    } else {
        document.getElementById("sx").style.borderBottomColor = "red";
        genErr();
        if(x.length === 0){
            document.getElementById("sx").style.borderBottomColor = "";
        }
        return false;
    }
}

function genErr(){
    var x = document.getElementById("sx-err");
    if(x == null){
        var root = document.getElementById("errorMessages");
        var out = document.createElement('h3');
        out.id = "sx-err";
        out.textContent = "Introduceeti doar masculin/feminin";
        root.append(out);
    }
}

function dellGenErr(){
    if(document.getElementById("sx-err") != null){
        var root = document.getElementById("sx-err");
        root.parentNode.removeChild(root);
    }
}

function numberError(mesaj){
    var err = document.getElementById("num-neg");
    if(err === null){
        var outMessage = document.createElement('h3');
        outMessage.id = "num-neg";
        outMessage.textContent = mesaj;
        document.getElementById("errorMessages").append(outMessage);
    }
}

function deleteAmessage() {
    if(document.getElementById("num-neg") != null){
        var root = document.getElementById("num-neg");
        if(root != null){
            root.parentNode.removeChild(root);
        }
    }
}