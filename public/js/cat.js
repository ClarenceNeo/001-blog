;(function(){
  'use strict';
  var el_form = document.querySelector('#cat-form');
  var el_tag_list = document.querySelector('#tag-list');
  var tag_list;
  // console.log(el_form);
  function init(){
    render();
    bind_submit();
    // console.log(el_tag_list);
  }

  function bind_submit() {
    el_form.addEventListener('submit', function (e) {
      e.preventDefault();
      var data = get_form_value(el_form);
      clear_form(el_form);
      $.post("/a/cat/add",data)
        .then(function(res){
          if (res.success) {
            render();
          }
        })
    })
  }

  function clear_form(el) {
    el
      .querySelectorAll('[name]')
      .forEach(function (input) {
        input.value = '';
      });
  }

  function get_form_value(el){
    var obj = {};
    var list = el.querySelectorAll('[name]');
    list.forEach(function (item) {
      var key = item.name;
      var val = item.value;
      obj[key] = val;
    });
    return obj;
  }

  function render(){
    el_tag_list.innerHTML = '';
    $.get("/a/cat/read", function(res) {
      if (res.success) {
        tag_list = res.data;
        tag_list.forEach(function(item) {
          var li = document.createElement('li');
          li.classList.add("tag-item");
          li.innerHTML = `
            <a>${item.title}</a>
          `;
          el_tag_list.appendChild(li);
        })
      }
    })
  }

  init();
})();