;(function () {
  'use strict';
  var url = location.href;
  var id = url.split("?id=")[1];
  // console.log(id);
  var el_wrapper = document.querySelector('.wrapper');
  function init() {
    render();
  }

  function render() {
    $.post("/a/article/read", {id: id})
      .then(function (res) {
        if(res.success){
          render_article(res.data[0]);
        };
      })
  }

  function render_article(data) {
    var div = document.createElement('div');
    div.add
    div.innerHTML=`
      <h2>${data.title}</h2>
      <p>${data.content}</p>
    `;
    console.log(data);
    el_wrapper.appendChild(div);
  }

  init();
})();