function showMaxDiffValue(value) {
    $("#diff-label > b").html(value);
}

function showMaxCostValue(value) {
    $("#cost-label > b").html(value);
}

function showMaxPeopleValue(value) {
    $("#people-label > b").html(value);
}

function showMaxKcalValue(value) {
    $("#kcal-label > b").html(value);
}

function changeDiff() {
    let value = $("#diff-box").html() == "Min" ? "Max" : "Min"; 
    $("#diff-box").html(value);
    $("#diff-label").html(value +  $("#diff-label").html().substring(3));
}

function changeCost() {
    let value = $("#cost-box").html() == "Min" ? "Max" : "Min"; 
    $("#cost-box").html(value);
    $("#cost-label").html(value +  $("#cost-label").html().substring(3));
}

function changePeople() {
    let value = $("#people-box").html() == "Min" ? "Max" : "Min"; 
    $("#people-box").html(value);
    $("#people-label").html(value +  $("#people-label").html().substring(3));
}

function changeKcal() {
    let value = $("#kcal-box").html() == "Min" ? "Max" : "Min"; 
    $("#kcal-box").html(value);
    $("#kcal-label").html(value +  $("#kcal-label").html().substring(3));
}