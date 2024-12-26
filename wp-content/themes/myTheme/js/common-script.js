const targetElemnts = document.querySelectorAll(".fadeIn, .fadeInUp, .fadeInDown, .fadeInRight, .fadeInLeft");
const adjustmentValue = 0.7;

window.addEventListener("scroll", function () {
  const currentScroll = window.scrollY;
  targetElemnts.forEach(target => {
    const targetPosition = target.getBoundingClientRect().top + currentScroll;
    if (currentScroll > targetPosition - window.innerHeight * adjustmentValue) {
      target.classList.add("js-actived");
    }
  });
});