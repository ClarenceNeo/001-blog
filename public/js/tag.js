;(function () {
  var url = location.href;
  var id = url.split("?id=")[1];
  // console.log(id);
  var el_content = document.querySelector(".content");
  var el_tag_title = document.querySelector('#tag_title');
  function init() {
    render();
  }

  function render() {
    $.post("/a/cat/read", {id:id})
      .then(function (res) {
        if (res.success) {
          el_tag_title.innerText = "#" + res.data[0].title;
        }
      })
    $.post("/a/postag/read_cat", { id: id })
      .then(function (res) {
        if (res.success) {
          // console.log(res.data);
          render_article(res.data);
        };
      })
  }

  function render_article(list) {
    el_content.innerHTML = "";
    // console.log(list);
    list.forEach(function (item) {
      // console.log(item);
      var div = document.createElement('div');
      div.classList.add("article");
      div.innerHTML = `
        <h2><a class="title" href="/article?id=${item.id}">${item.title}</a></h2>
        <p>${item.content}</p>
        <div class="post_footer">
          <span>${item.create_at}</span>
          <span class="tags"></span>
        </div>
      `;
      var tag = div.querySelector(".tags");
      $.post("/a/postag/read?id=" + item.id)
        .then(function (res) {
          if (res.success) {
            tag_list = res.data;
            render_tag(tag_list, tag);
            // console.log(res.data);
          }
        })
      el_content.appendChild(div);
    })
  }

  function render_tag(tag_list, el) {
    // console.log(tag_list);
    // console.log(el);
    el.innerHTML = `<i class="fa fa-tags"></i>`;
    tag_list.forEach(function (item) {
      var a = document.createElement('a');
      a.innerText = item.title;
      a.href = "/tag?id=" + item.id;
      el.appendChild(a);
    })
  }

  init();
})();