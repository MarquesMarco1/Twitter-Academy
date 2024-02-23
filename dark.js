function toggleMode() {
    console.log("toggle mode");
    const body = document.body;
    body.classList.toggle('dark-mode');
    if (body.classList.contains('dark-mode')) {
        document.getElementById('mode-toggle').textContent = 'Light Mode';
    } else {
        document.getElementById('mode-toggle').textContent = 'Dark Mode';
    }
}