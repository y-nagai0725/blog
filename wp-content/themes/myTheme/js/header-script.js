//検索フォーム
const searchformWrapper = document.querySelector(".header__searchform-wrapper");

//検索ボタン
const searchButton = document.querySelector(".header__search-button");

//検索ボタンアイコン
const searchButtonIcon = document.querySelector(".header__search-button-icon");

//ハンバーガーメニューボタン
const hamburgerMenuButton = document.querySelector(".header__hamburger-menu-button");

//画面全体マスク
const mask = document.querySelector(".header__mask");

//spナビゲーションメニュー
const navSpWrapper = document.querySelector(".header__nav-sp-wrapper");

//閉じるボタン
const closeButton = document.querySelector(".header__close-button");

//トップへ戻るボタン
const topBackButton = document.querySelector(".header__top-back-button");

//検索ボタンクリック時処理
searchButton.addEventListener("click", function () {
  searchformWrapper.classList.toggle("js-actived");
  searchButtonIcon.classList.toggle("js-actived");
});

//ハンバーガーメニューボタンクリック時処理
hamburgerMenuButton.addEventListener("click", function () {
  mask.classList.add("js-actived");
  navSpWrapper.classList.add("js-actived");
});

//閉じるボタンクリック時処理
closeButton.addEventListener("click", function () {
  mask.classList.remove("js-actived");
  navSpWrapper.classList.remove("js-actived");
});

//PCサイズへ画面リサイズ時にspのナビゲーションメニューを閉じる
window.addEventListener("resize", function () {
  if (mask.classList.contains("js-actived") && window.innerWidth >= 1024) {
    mask.classList.remove("js-actived");
    navSpWrapper.classList.remove("js-actived");
  }
});

//トップへ戻るボタンクリック時処理
topBackButton.addEventListener("click", function () {
  window.scroll({
    "behavior": "smooth",
    top: 0,
  });
});

//スクロール時にトップへ戻るボタン表示・非表示処理
window.addEventListener("scroll", function () {
  if (window.scrollY >= 150) {
    topBackButton.classList.add("js-actived");
  } else {
    topBackButton.classList.remove("js-actived");
  }
});