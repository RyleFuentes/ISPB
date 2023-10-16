var wrap = document.getElementById("wrapper");
var toggleButton = document.getElementById("menu-toggle");
var logo = document.getElementById("logo");

toggleButton.onclick = function () {
    wrap.classList.toggle("toggled");

    var spans = wrap.querySelectorAll(".item span");
    spans.forEach(function (span) {
        span.classList.toggle("hide-text");
    });

    logo.style.display = wrap.classList.contains("toggled") ? "none" : "block";
};
