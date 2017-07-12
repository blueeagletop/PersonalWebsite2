$(function () {
    var allClass = $('.allClass');
    var search = $('.search');
    var bg = $('.bgDiv');
    var downNav = $('.downNav');
    var searchInput = $('.searchInput')
    showNav(allClass, downNav, "allClass");
    showNav(search,searchInput,"search");
    function showNav(btn, navDiv, direction) {
        btn.on('click', function () {
            bg.css({
                display: "block",
                transition: "opacity .5s"
            });
            if (direction == "allClass") {
                navDiv.css({
                    top: "36px",
                    transition: "top 1s"
                });
            }
            if(direction == "search"){
                searchInput.css({
                    top: "38px",
                    transition: "top 1s"
                });
            }
        });
    }
    bg.on('click', function () {
        hideNav();
    });
    function hideNav() {
        downNav.css({
            top: "-40%",
            webkitTransition:"top .5s",
            oTransition:"top .5s",
            mozTransition:"top .5s",
            transition: "top .5s"
        });
        searchInput.css({
            top: "-100px",
            webkitTransition:"top .5s",
            oTransition:"top .5s",
            mozTransition:"top .5s",
            transition: "top .5s"
        });
        bg.css({
            display: "none",
            transition: "display 1s"
        });
    }
});