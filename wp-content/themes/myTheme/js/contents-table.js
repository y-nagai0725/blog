//サイドバーにある目次
const sidebarContentsTable = document.querySelector(".sidebar__contents-table");

//記事メイン部分
const article = document.querySelector(".article__main");

//見出し位置リスト
let headingPositionList = [];

//現在アクティブな目次項目
let activedContentsTableItemIndex = 0;

function createArticleContentsTable() {
  const headingList = article.querySelectorAll("h2, h3");
  const firstH2Element = article.querySelector("h2");
  const contentsTable = document.createElement("ul");
  contentsTable.className = "contents-table";
  let tempH3Ul;
  let tempH2Li;

  headingList.forEach((heading, index) => {
    const tag = heading.tagName;
    const title = heading.textContent;

    const li = document.createElement("li");
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

    if (tag === "H2") {
      li.className = "h2-list-item";

      if (tempH3Ul) {
        tempH2Li.appendChild(tempH3Ul);
        tempH3Ul = null;
      }

      tempH2Li = li;
      contentsTable.appendChild(tempH2Li);

    } else if (tag === "H3") {
      li.className = "h3-list-item";

      if (!tempH3Ul) {
        tempH3Ul = document.createElement("ul");
        tempH3Ul.className = "h3-list";
      }

      tempH3Ul.appendChild(li);

      if (index === headingList.length - 1) {
        tempH2Li.appendChild(tempH3Ul);
        contentsTable.appendChild(tempH2Li);
      }
    }
  });

  const contentsTableWrapperElement = document.createElement("div");
  contentsTableWrapperElement.className = "contents-table-wrapper";
  const titleElement = document.createElement("span");
  titleElement.className = "title";
  titleElement.textContent = "目次";
  contentsTableWrapperElement.appendChild(titleElement);
  contentsTableWrapperElement.appendChild(contentsTable);
  article.insertBefore(contentsTableWrapperElement, firstH2Element);
}

function createSidebarContentsTable() {
  const headingList = article.querySelectorAll("h2, h3");
  headingList.forEach((heading, index) => {
    headingPositionList.push(Math.floor(heading.getBoundingClientRect().top) + window.scrollY);
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

function setLinkClickEvent() {
  document.querySelectorAll("a[href^='#']").forEach(link => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const targetId = this.getAttribute("href");
      const target = document.querySelector(targetId);
      const targetPosition = target.getBoundingClientRect().top + window.scrollY;
      const headerHeight = document.querySelector(".header").offsetHeight;

      window.scroll({
        behavior: "smooth",
        top: targetPosition - headerHeight,
      })
    });
  });
}

/**
 * 目次対象の見出しの位置を保持する
 */
function setHeadingPositionList() {
  //既存のリストを削除
  headingPositionList = [];

  //目次対象の見出しの位置を取得、リストへ保持
  const headingList = article.querySelectorAll("h2, h3");
  headingList.forEach(heading => {
    headingPositionList.push(Math.floor(heading.getBoundingClientRect().top) + window.scrollY);
  });
}

function scrollSidebarContentsTable(targetIndex) {
  let totalGapValue = 0;
  let totalItemHeight = 0;
  let totalScrollValue = 0;

  const listElements = sidebarContentsTable.querySelectorAll("li");
  for (i = 0; i < targetIndex; i++) {
    const listHeight = listElements[i].offsetHeight;
    totalItemHeight += listHeight;
  }

  const styles = window.getComputedStyle(sidebarContentsTable, "");
  const setGapValue = Number(styles.getPropertyValue("gap").replace(/px/g, ""));
  for (i = 0; i < targetIndex; i++) {
    totalGapValue += setGapValue;
  }

  totalScrollValue = totalItemHeight + totalGapValue;
  sidebarContentsTable.scrollTop = totalScrollValue;
}

/**
 * 目次項目をアクティブにする
 *
 * @param {Number} targetIndex 対象のインデックス
 */
function activateContentsTableItem(targetIndex) {
  //目次項目
  const list = sidebarContentsTable.children;

  //非アクティブにする
  list[activedContentsTableItemIndex].classList.remove("js-actived");

  //アクティブにする
  list[targetIndex].classList.add("js-actived");

  //アクティブの項目へスクロール
  scrollSidebarContentsTable(targetIndex);
}

window.addEventListener("scroll", function () {
  const currentScrollPosition = window.scrollY;
  const headerHeight = document.querySelector(".header").offsetHeight;
  const adjustmentPositionValue = headerHeight;
  for (let i = 0; i < headingPositionList.length; i++) {
    if (i === headingPositionList.length - 1) {
      activateContentsTableItem(i);
      activedContentsTableItemIndex = i;
      break;
    }

    const headingPosition = headingPositionList[i] - adjustmentPositionValue;
    const nextHeadingPosition = headingPositionList[i + 1] - adjustmentPositionValue;
    if (currentScrollPosition < headingPosition) {
      activateContentsTableItem(0);
      activedContentsTableItemIndex = 0;
      break;
    } else if (headingPosition <= currentScrollPosition && currentScrollPosition < nextHeadingPosition) {
      activateContentsTableItem(i);
      activedContentsTableItemIndex = i;
      break;
    }
  }
});

window.addEventListener("resize", function () {
  setHeadingPositionList();
});

//記事内の目次作成
createArticleContentsTable();

//サイドバーの目次作成
createSidebarContentsTable();

//リンククリック時イベント処理設定
setLinkClickEvent();