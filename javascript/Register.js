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
            } else {
                deleteErrorMessage();
            }
        }
        if (request.status === 404) {
            deleteErrorMessage();
        }
    });
    request.open('GET', URL+'?value=' + value, true);
    request.send(data);

}

function errorMessage() {
    var root = document.getElementById("errorMessages");
    var outMessage = document.createElement('h3');
    outMessage.id = "temp";
    outMessage.textContent = "Acest username este deja folosit";
    root.append(outMessage);
}

function deleteErrorMessage() {
    var root = document.getElementById("temp");
    if(root != null){
        root.parentNode.removeChild(root);
    }

}