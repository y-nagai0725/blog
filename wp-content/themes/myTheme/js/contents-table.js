//サイドバーにある目次
const sidebarContentsTable = document.querySelector(".sidebar__contents-table");

//記事メイン部分
const article = document.querySelector(".article__main");

function createSidebarContentsTable() {
  const headingList = article.querySelectorAll("h2, h3");
  headingList.forEach((heading, index) => {
    const tag = heading.tagName;
    const title = heading.textContent;
    const li = document.createElement("li");
    li.className = "type-" + tag;

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