
var menuButton = document.querySelector(".menu-button");
var container = document.querySelector(".container");
var backdrop = document.querySelector(".backdrop");

menuButton.addEventListener("click", function(){
    container.classList.add("active");
})

menuButton.addEventListener("click", function(){
    container.classList.add("active");
})

backdrop.addEventListener("click", function(){
    container.classList.remove("active");
})