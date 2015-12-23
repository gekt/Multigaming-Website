var points = loadPoints();

$(document).ready(function(){
    $("#tab1").hover(function(){
        document.getElementById("tab1").src = 'img/slider_bouton/s1c.png';
    }, function(){
        if ($("#tab1").attr('class') == 'selected') {
        } else {
            document.getElementById("tab1").src = 'img/slider_bouton/s1nb.png';
        }
    });
    $("#tab2").hover(function(){
        document.getElementById("tab2").src = 'img/slider_bouton/s2c.png';
    }, function(){
        if ($("#tab2").attr('class') == 'selected') {
        } else {
            document.getElementById("tab2").src = 'img/slider_bouton/s2nb.png';
        }
    });
    $("#tab3").hover(function(){
        document.getElementById("tab3").src = 'img/slider_bouton/s3c.png';
    }, function(){
        if ($("#tab3").attr('class') == 'selected') {
        } else {
            document.getElementById("tab3").src = 'img/slider_bouton/s3nb.png';
        }
    });
    $("#tab4").hover(function(){
        document.getElementById("tab4").src = 'img/slider_bouton/s4c.png';
    }, function(){
        if ($("#tab4").attr('class') == 'selected') {
        } else {
            document.getElementById("tab4").src = 'img/slider_bouton/s4nb.png';
        }
    });
    $("#bouton_toggle").click(function(){
        if ($('#inscription_toggle').css('display') == 'none') {
            $('#inscription_toggle').toggle("blind", 750);
        }
        else {
            $('#inscription_toggle').toggle("blind", 750);
        }
    });
    showPoints();
});

function showPoints() {
    setInterval(function() {
        $('.points_number').text(loadPoints());
        $('.points_number_popup_send').text(loadPoints() + " points");
        if (loadPoints() <= 1) {
            $('.points_number_popup_send').text(loadPoints() + " point");
        }
        else {
            $('.points_number_popup_send').text(loadPoints() + " points");
        }
    }, 1000);
};

function loadPoints() {
    $.get("include/getPoints.php", function(data) {
        points = data;
    });
    return points;
};

function selectTab(num) {
    if ($("#box" + num).attr('class') == "infobox enabled") {
        document.getElementById("tab" + num).className = "";
        document.getElementById("box" + num).className = "infobox";
        document.getElementById("tab" + num).src = 'img/slider_bouton/s' + num + 'nb.png';
        $('#box' + num).effect("drop", 200);
        setTimeout( function() {
            $('#bloc_central').effect("fade", 100);
        }, 500);
    }
    else {
        for (var i=1; i <= 4; i++) {
            $('#box' + i).hide();
            document.getElementById("tab" + i).className = "";
            document.getElementById("box" + i).className = "infobox";
            document.getElementById("tab" + i).src = 'img/slider_bouton/s' + i + 'nb.png';
        }
        $('#bloc_central').hide();
        $('#box' + num).effect("fade", 500);
        document.getElementById("tab" + num).className = "selected";
        document.getElementById("box" + num).className = "infobox enabled";
        document.getElementById("tab" + num).src = 'img/slider_bouton/s' + num + 'c.png';
    }
};

$(document).on('mouseover mousedown', 'a, img', function() {
    return false;
});