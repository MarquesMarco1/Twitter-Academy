let hashtagName = []

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        const response = JSON.parse(xhttp.responseText);
        hashtagName = response.map(hashtag_list => hashtag_list.hashtag);
        console.log(hashtagName);
    }
};
xhttp.open("GET", "hashtag.php", true);
xhttp.send();


const resultBox = document.querySelector(".result-box");
const inputBox = document.getElementById("input-box");

inputBox.onkeyup = function () {
    let input = inputBox.value;
    if (input.startsWith('#')) {
        let search = input.indexOf('#');
        let arobase = input.substring(search);
        console.log(arobase);
        if (arobase.startsWith('#')) {
            console.log('oui')
            let result = [];
            if (arobase.length) {
                result = hashtagName.filter((keyword) => {
                    return keyword.toLowerCase().includes(arobase.toLowerCase())
                });
                console.log(result);

            }
            display(result);


        }
    } else if (input.includes('#')) {
        let search = input.indexOf('#');
        let arobase = input.substring(search);
        console.log(arobase);
        if (arobase.startsWith('#')) {
            console.log('oui')
            let result = [];
            if (arobase.length) {
                result = hashtagName.filter((keyword) => {
                    return keyword.toLowerCase().includes(arobase.toLowerCase())
                });
                console.log(result);

            }
            display(result);
        }
    } else {
        resultBox.innerHTML = "";
    }
}

function display(result) {
    let input = inputBox.value;
    if (input.startsWith('#') || input.includes('#')) {
        const content = result.map((list) => {
            return "<li onclick=header(this)>" + list + "</li>";
        }).join('');

        resultBox.innerHTML = "<ul>" + content + "</ul>";
    }
}

function header(list) {
var hashtag = list.innerHTML.substring(1);
window.location.href = "tweet/hashtag.php?hashtag=" + encodeURIComponent(hashtag);
} 