;(function () {
  'use strict';
  var article_list;
  var el_content = document.querySelector(".content");
  function init() {
    render();
  }
  function render() {
    $.get("/a/article/read")
      .then(function (res) {
        article_list = res.data;
        render_article(article_list);
      })
  }

  function render_article(list) {
    el_content.innerHTML = "";
    // console.log(list);
    list.forEach(function (item) {
      var div = document.createElement('div');
      div.classList.add("article");
      div.innerHTML = `
        <h2><a class="title" href="#">${item.title}</a></h2>
        <p>${item.content}</p>
        <div class="post_footer">
          <span>2017.12.12</span>
          <span class="tags"><i class="fa fa-tags"></i><a href="#">tag1</a> <a href="#">tag2</a></span>
        </div>
      `;
      el_content.appendChild(div);
    })
  }
  init();
})();