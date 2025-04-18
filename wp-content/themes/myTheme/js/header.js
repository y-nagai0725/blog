document.addEventListener("DOMContentLoaded", function () {
  //検索フォーム
  const searchformWrapper = document.querySelector(".header__searchform-wrapper");

  //検索ボタン
  const searchButton = document.querySelector(".header__search-button");

  //検索ボタンアイコン
  const searchButtonIcon = document.querySelector(".header__search-button-icon");

  //ハンバーガーメニューボタン
  const hamburgerMenuButton = document.querySelector(".header__hamburger-menu-button");

  //カテゴリーwrapper
  const categoryWrapper = document.querySelector(".header__category-wrapper");

  //画面全体マスク
  const mask = document.querySelector(".header__mask");

  //spナビゲーションメニュー
  const navSpWrapper = document.querySelector(".header__nav-sp-wrapper");

  //閉じるボタン
  const closeButton = document.querySelector(".header__close-button");

  //目次
  const contentsTableWrapper = document.querySelector(".sidebar__contents-table-wrapper");

  //目次閉じるボタン
  const contentsTableCloseButton = document.querySelector(".sidebar__close-button");

  //global-button
  const globalButtonWrapper = document.querySelector(".global-button");

  //目次ボタン
  const contentsTableButton = document.querySelector(".global-button__contents-table-button");

  //トップへ戻るボタン
  const topBackButton = document.querySelector(".global-button__top-back-button");

  //スクロール禁止
  function noScroll(e) {
    e.preventDefault();
  }

  //検索ボタンクリック時処理
  searchButton.addEventListener("click", function () {
    searchformWrapper.classList.toggle("js-actived");
    searchButtonIcon.classList.toggle("js-actived");
  });

  //ハンバーガーメニューボタンクリック時処理
  hamburgerMenuButton.addEventListener("click", function () {
    mask.classList.add("js-actived");
    navSpWrapper.classList.add("js-actived");

    document.addEventListener('touchmove', noScroll, { passive: false });
    document.addEventListener('wheel', noScroll, { passive: false });
  });

  //閉じるボタンクリック時処理
  closeButton.addEventListener("click", function () {
    mask.classList.remove("js-actived");
    navSpWrapper.classList.remove("js-actived");

    document.removeEventListener('touchmove', noScroll);
    document.removeEventListener('wheel', noScroll);
  });

  //PCサイズへ画面リサイズ時にspのナビゲーションメニューを閉じる
  window.addEventListener("resize", function () {
    if (window.innerWidth >= 1024) {
      mask.classList.remove("js-actived");
      navSpWrapper.classList.remove("js-actived");
      contentsTableWrapper.classList.remove("js-actived");

      document.removeEventListener('touchmove', noScroll);
      document.removeEventListener('wheel', noScroll);
    }
  });

  //目次ボタンクリック時処理
  contentsTableButton.addEventListener("click", function () {
    if (!contentsTableWrapper.classList.contains("js-actived")) {
      contentsTableWrapper.classList.add("js-actived");
    }
  });

  //目次閉じるボタンクリック時処理
  contentsTableCloseButton.addEventListener("click", function () {
    contentsTableWrapper.classList.remove("js-actived");
  });

  //トップへ戻るボタンクリック時処理
  topBackButton.addEventListener("click", function () {
    window.scroll({
      "behavior": "smooth",
      top: 0,
    });
  });

  //スクロール時にトップへ戻るボタンと目次ボタン表示・非表示処理
  window.addEventListener("scroll", function () {
    if (window.scrollY >= 150) {
      globalButtonWrapper.classList.add("js-actived");
    } else {
      globalButtonWrapper.classList.remove("js-actived");
    }
  });

  //カテゴリーWrapperタップ時にメニュー表示
  categoryWrapper.addEventListener("touchstart", function () {
    categoryWrapper.classList.toggle("js-clicked");
  });
  categoryWrapper.addEventListener("mouseleave", function () {
    categoryWrapper.classList.remove("js-clicked");
  });
});