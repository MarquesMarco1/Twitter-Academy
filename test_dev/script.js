let result = []

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const response = JSON.parse(xhttp.responseText);
           console.log(response);
        }
    };
    xhttp.open("GET", "users.php", true);
    xhttp.send();

    const resultBox = document.querySelector(".result-box");
    const inputBox = document.getElementById("input-box");

inputBox.onkeyup = function () {
    let input = inputBox.value;
    if (input.length) {



    }}
