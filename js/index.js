$(document).ready(function(){
    $("#bouton_toggle").click(function(){
        if ($('#inscription_toggle').css('display') == 'none') {
            $('#inscription_toggle').toggle("fade", 1000);
        }
        else {
            $('#inscription_toggle').toggle("drop", 300);
        }
    });
});

function selectTab(num) {
    for (var i=1; i <= 4; i++) {
        document.getElementById("tab" + i).className = "";
        document.getElementById("box" + i).className = "infobox";
    }
    document.getElementById("tab" + num).className = "selected";
    document.getElementById("box" + num).className = "infobox enabled";
}
