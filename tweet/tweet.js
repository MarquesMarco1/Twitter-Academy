const txtTweet = document.getElementById('txtTweet');
const txtCountTweet = document.getElementById('txtCountTweet');

txtTweet.addEventListener('input', function () {
    const count = this.value.length;

    if (count > 140) {
        txtCountTweet.textContent = `${count}`;
        txtCountTweet.style.color = 'red'
    } else {
        txtCountTweet.style.color = 'black'
        txtCountTweet.textContent = `${count}`;
    }
});