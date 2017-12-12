;(function(){
  'use strict';
  var el_cat_list = document.querySelector('#cat-list');
  var el_form = document.querySelector('#post-form');
  function init() {
    render_cat();
    bind_submit();
  }

  function bind_submit() {
    el_form.addEventListener('submit', function (e) {
      e.preventDefault();
      var tag_id = get_form_cat(el_cat_list);
      var row = get_form_value(el_form);
      clear_form(el_form);
      clear_form_cat(el_cat_list);
      // console.log(tag_id);
      // console.log(row);
      $.post("/a/article/add", row)
        .then(function (res) {
          if (res.success) {
            console.log(res);
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

  function clear_form_cat(el) {
    el
      .querySelectorAll('[type=checkbox]')
      .forEach(function (input) {
        input.checked = false;
      });
  }

  function get_form_value(el) {
    var obj = {};
    var list = el.querySelectorAll('[name]');
    list.forEach(function (item) {
      var key = item.name;
      var val = item.value;
      obj[key] = val;
    });
    return obj;
  }

  function get_form_cat(el) {
    var cat = el.querySelectorAll('[type=checkbox]');
    var id_arr = [];
    cat.forEach(function (item) {
      if (item.checked) {
        id_arr.push(item.id);
      }
    })

    return id_arr;
  }

  function render_cat() {
    $.get('/a/cat/read')
      .then(function(res) {
        if(res.success){
          render_cat_list(res.data);
        }
      });
  }

  function render_cat_list(list) {
    el_cat_list.innerHTML = "";
    list.forEach(function(item) {
      var label = document.createElement('label');
      label.innerHTML=`
        <input id="${item.id}" type="checkbox">${item.title}
      `;
      el_cat_list.appendChild(label);
    })
  }

  init();
})();