document.addEventListener("DOMContentLoaded", function () {
  const targetElemnts = document.querySelectorAll(".fadeIn, .fadeInUp, .fadeInDown, .fadeInRight, .fadeInLeft");
  const adjustmentValue = 0.7;

  //スクロール時に対象にクラス付与
  window.addEventListener("scroll", function () {
    const currentScroll = window.scrollY;
    targetElemnts.forEach(target => {
      const targetPosition = target.getBoundingClientRect().top + currentScroll;
      if (currentScroll > targetPosition - window.innerHeight * adjustmentValue) {
        target.classList.add("js-actived");
      }
    });
  });

  //ハッシュ付きリンク遷移時にヘッダー分ずらす
  if (location.hash) {
    const headerHeight = document.querySelector(".header").offsetHeight;
    setTimeout(() => {
      window.scrollBy(0, -headerHeight);
    }, 100);
  }
});