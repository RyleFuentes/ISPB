var el = document.getElementById("wrapper");
var toggleButton = document.getElementById("menu-toggle");
var logo = document.getElementById("logo"); 

toggleButton.onclick = function () {
    el.classList.toggle("toggled");
    
    var spans = el.querySelectorAll('.item span');
    spans.forEach(function (span) {
        span.classList.toggle("hide-text");
    });
    
    logo.style.display = (el.classList.contains("toggled")) ? "none" : "block";
};
