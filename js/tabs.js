$(document).ready(function(){
    $("ul#tabs li").click(function(e){
        if (!$(this).hasClass("active")) {
            var tabNum = $(this).index();
            var nthChild = tabNum+1;
            $("ul#tabs li.active").removeClass("active");
            $(this).addClass("active");
            $("ul#tab li.active").removeClass("active");
            $("ul#tab li:nth-child("+nthChild+")").addClass("active");
        }
    });

    $("ul#tabs-badge li").click(function(e){
        if (!$(this).hasClass("active")) {
            var tabNum = $(this).index();
            var nthChild = tabNum+1;
            $("ul#tabs-badge li.active").removeClass("active");
            $(this).addClass("active");
            $("ul#tab-badge li.active").removeClass("active");
            $("ul#tab-badge li:nth-child("+nthChild+")").addClass("active");
        }
    });
});