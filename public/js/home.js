;(function () {
  'use strict';
  var article_list;
  var tag_list;
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
          <span class="tags"></span>
        </div>
      `;
      var tag = div.querySelector(".tags");
      $.post("/a/postag/read?id="+item.id)
        .then(function (res) {
          if (res.success) {
            tag_list = res.data;
            render_tag(tag_list,tag);
            // console.log(res.data);
          }
        })
      el_content.appendChild(div);
    })
  }

  function render_tag(tag_list,el) {
    console.log(tag_list);
    console.log(el);
    el.innerHTML = `<i class="fa fa-tags"></i>`;
    tag_list.forEach(function (item) {
      var a = document.createElement('a');
      a.innerText = item.title;
      el.appendChild(a);
    })
  }
  init();
})();