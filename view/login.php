<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php tpl('component/css') ?>
  <title>登录</title>
</head>
<body>
  <div class="container">
    <form id="login">
      <div class="form-group">
        <label for="exampleInputEmail1">User</label>
        <input type="text" class="form-control username" id="exampleInputEmail1" placeholder="name">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control password" id="exampleInputPassword1" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-default">登录</button>
    </form>
  </div>
  <?php tpl('component/js') ?>
  <script src="js/login.js"></script>
</body>
</html>