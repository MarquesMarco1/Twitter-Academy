const input = document.getElementById("myInput")
input.onkeydown = myFunction
function myFunction(e) {
if (e.key == "#") {
console.log("hastag");

} else if (e.key == "@") {
console.log("arobase");
} else {
console.log("rien");
}
}