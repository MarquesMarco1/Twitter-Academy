let userName = []

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        const response = JSON.parse(xhttp.responseText);
        userName = response.map(user => user.at_user_name);
        console.log(userName);
    }
};
xhttp.open("GET", "users.php", true);
xhttp.send();


const resultBox = document.querySelector(".result-box");
const inputBox = document.getElementById("input-box");

inputBox.onkeyup = function () {
    let input = inputBox.value;
    if (input.startsWith('@') || input.includes('@')) {
        let search = input.indexOf('@');
        let arobase = input.substring(search);
        console.log(arobase);
        if (arobase.startsWith('@')) {
            console.log('oui')
        let result = [];
        if (arobase.length) {
            result = userName.filter((keyword) => {
                return keyword.toLowerCase().includes(arobase.toLowerCase())
            });
            console.log(result);
        }
        display(result);
    }}
}

function display(result) {
    const content = result.map((list) => {
        return "<li>" + list + "</li>";
    });

    resultBox.innerHTML = "<ul>" + content + "</ul>";
}