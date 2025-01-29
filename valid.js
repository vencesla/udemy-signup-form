var name = "admir_626@gamil.com";
/**
 * email cabnot start from any number
 * email cannot start from any special char
 */

var pattren = /^[a-z]+$/i;
if(pattren.test(name)) {
    alert("valid value");
}else {
    alert("invalid value");
}
