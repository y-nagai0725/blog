//サイドバーにある目次
const sidebarContentsTable = document.querySelector(".sidebar__contents-table");

//記事メイン部分
const article = document.querySelector(".article__main");

//
const headerHeightPc = 90;
const headerHeightSp = 60;

//見出し位置リスト
let headingPositionList = [];

//現在アクティブな目次項目
let activedContentsTableItemIndex = 0;

function createSidebarContentsTable() {
  const headingList = article.querySelectorAll("h2, h3");
  headingList.forEach((heading, index) => {
    headingPositionList.push(heading.getBoundingClientRect().top + window.scrollY);
    const tag = heading.tagName;
    const title = heading.textContent;
    const li = document.createElement("li");
    li.className = "type-" + tag;
    if (index === 0) {
      li.classList.add("js-actived");
    }

    let href;
    if (heading.getAttribute("id")) {
      href = "#" + heading.getAttribute("id");
    } else {
      heading.setAttribute("id", "heading-" + index);
      href = "#heading-" + index;
    }

    const a = document.createElement("a");
    a.setAttribute("href", href);
    a.textContent = title;
    li.appendChild(a);
    sidebarContentsTable.appendChild(li);
  });
}

createSidebarContentsTable();

window.addEventListener("scroll", function () {
  const currentScrollPosition = window.scrollY;
  const adjustmentPositionValue = window.innerWidth >= 1024 ? headerHeightPc : headerHeightSp;
  for (let i = 0; i < headingPositionList.length; i++) {
    if (i === headingPositionList.length - 1) {
      activateContentsTableItem(i);
      activedContentsTableItemIndex = i;
      break;
    }

    const headingPosition = headingPositionList[i] - adjustmentPositionValue;
    const nextHeadingPosition = headingPositionList[i + 1] - adjustmentPositionValue;
    if (headingPosition <= currentScrollPosition && currentScrollPosition < nextHeadingPosition) {
      activateContentsTableItem(i);
      activedContentsTableItemIndex = i;
      break;
    }
  }
});

window.addEventListener("resize", function(){
  setHeadingPositionList();
});

function setHeadingPositionList() {
  headingPositionList = [];
  const headingList = article.querySelectorAll("h2, h3");
  headingList.forEach(heading => {
    headingPositionList.push(heading.getBoundingClientRect().top + window.scrollY);
  });
}

function activateContentsTableItem(targetIndex) {
  //目次項目
  const list = sidebarContentsTable.children;

  //非アクティブにする
  list[activedContentsTableItemIndex].classList.remove("js-actived");

  //アクティブにする
  list[targetIndex].classList.add("js-actived");
}