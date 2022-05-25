// JavaScript source code

var buildingname = sessionStorage.getItem("buildingname");
var block = sessionStorage.getItem("block");
var road = sessionStorage.getItem("road");
var postalcode = sessionStorage.getItem("postalcode");

console.log(buildingname);
console.log(block);
console.log(postalcode);
console.log(road);

if (buildingname == "null") {
    location = block +  road +  postalcode;
}
else {
    location = block + road + buildingname + postalcode;
}

$.post("DenronFolder/checkinprocess.php?p=add", { location: location })
    .done(function (data) {
        alert("Data Loaded: " + data);
    });