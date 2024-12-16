const searchformWrapper = document.querySelector(".header__searchform-wrapper");
const searchButton = document.querySelector(".header__search-button");
const searchButtonIcon = document.querySelector(".header__search-button-icon");
const hamburgerMenuButton = document.querySelector(".header__hamburger-menu-button");

searchButton.addEventListener("click", function(){
  searchformWrapper.classList.toggle("js-actived");
  searchButtonIcon.classList.toggle("js-actived");
});

hamburgerMenuButton.addEventListener("click", function(){

});