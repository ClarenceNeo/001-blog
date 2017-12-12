;(function () {
  'use strict';
  var el_form = document.querySelector('#login');
  // console.log(el_form);

  el_form.addEventListener('submit', function (e) {
    e.preventDefault();
    var username = el_form.querySelector('.username').value;
    var password = el_form.querySelector('.password').value;
    // console.log(username, password)
    $.post('a/admin/login?username=' + username + '&password=' + password)
      .then(function (res) {
        if (res.success) {
          window.location.href = 'http://localhost:1234/';
        }
      })
  })
})();