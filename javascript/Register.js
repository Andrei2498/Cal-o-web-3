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