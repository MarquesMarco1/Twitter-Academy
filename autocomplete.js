let hashtagName = []

var xhttpHashtag = new XMLHttpRequest();
xhttpHashtag.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        const responseHashtag = JSON.parse(xhttpHashtag.responseText);
        hashtagName = responseHashtag.map(hashtag_list => hashtag_list.hashtag);
        console.log(hashtagName);
    }
};
xhttpHashtag.open("GET", "mysql/fetch_hashtag.php", true);
xhttpHashtag.send();


const boxResult = document.querySelector(".box-result");
const boxInput = document.getElementById("SearchBar");

boxInput.onkeyup = function () {
    let inputSearch = boxInput.value;
    if (inputSearch.startsWith('#')) {
        let searchHashtag = inputSearch.indexOf('#');
        let hashtag = inputSearch.substring(searchHashtag);
        console.log(hashtag);
        if (hashtag.startsWith('#')) {
            console.log('oui1')
            let result = [];
            if (hashtag.length) {
                result = hashtagName.filter((keyword) => {
                    return keyword.toLowerCase().includes(hashtag.toLowerCase())
                });
                console.log(result);

            }
            displayHashtag(result);


        }
    }
    else if (inputSearch.includes('#')) {
        let searchHashtag = inputSearch.indexOf('#');
        let hashtag = inputSearch.substring(searchHashtag);
        console.log(hashtag);
        if (hashtag.startsWith('#')) {
            console.log('oui2')
            let result = [];
            if (hashtag.length) {
                result = hashtagName.filter((keyword) => {
                    return keyword.toLowerCase().includes(hashtag.toLowerCase())
                });
                console.log(result);

            }
            displayHashtag(result);
        }
    }
    else {
        boxResult.innerHTML = "";
    }
}

function displayHashtag(result) {
    let inputSearch = boxInput.value;
    if (inputSearch.startsWith('#') || inputSearch.includes('#')) {
        const content = result.map((list) => {
            return "<li onclick=completeHashtag(this)>" + list + "</li>";
        }).join('');

        boxResult.innerHTML = "<ul>" + content + "</ul>";
    }
}

function completeHashtag(list) {
    boxInput.value = boxInput.value.replace("#", "") + list.innerHTML;
    boxResult.innerHTML = '';
}