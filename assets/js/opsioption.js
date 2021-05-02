function opsi() {
    var st = $("#disabledoption").val();

    if (st == "None") {
    document.getElementById("inputku").disabled = false;
    } else {
    document.getElementById("inputku").disabled = true;
    }
    
}