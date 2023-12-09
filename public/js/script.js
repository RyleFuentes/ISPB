$(document).ready(function () {
    var wrap = $("#wrapper");
    var sidebarwrapper = $("#sidebar-wrapper");
    var toggleButton = $("#menu-toggle");
    var logo = $("#logo");

    var isToggled = localStorage.getItem("sidebarToggled") === "true";
    if (isToggled) {
        setSidebarState(true);
    } else {
        setSidebarState(false);
    }

    toggleButton.click(function (e) {
        e.preventDefault();
        wrap.toggleClass("toggled");
        var isToggled = wrap.hasClass("toggled");
        setSidebarState(isToggled);
        localStorage.setItem("sidebarToggled", isToggled);
    });

    function setSidebarState(isToggled) {
        if (isToggled) {
            wrap.find(".item span").addClass("hide-text");
            wrap.find(".item")
                .addClass("text-center")
                .removeClass("text-start");
            sidebarwrapper.css("width", "5rem");
            logo.css("display", "none");
        } else {
            wrap.find(".item span").removeClass("hide-text");
            wrap.find(".item")
                .removeClass("text-center")
                .addClass("text-start");
            logo.css("display", "block");
            sidebarwrapper.css("width", "16.25rem");
        }
    }
});

document.addEventListener("DOMContentLoaded", function () {
    var today = new Date().toISOString().split("T")[0];
    document.getElementById("exp_date").min = today;
});

