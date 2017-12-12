<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php tpl('component/css') ?>
  <link rel="stylesheet" href="css/post.css">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <h2>添加文章</h2>
    <form id="post-form">
      <input type="hidden" name="id">
      <label>
        标题：
        <input type="text" name="title">
      </label>
      <label>
        正文：
        <textarea name="content" rows="10" cols="50"></textarea>
      </label>
      <label>
        Tag：
        <div id="cat-list">
        </div>
      </label>
      <button class="btn btn-primary" type="submit">提交</button>
    </form>
  </div>
  <?php tpl('component/js') ?>
  <script src="js/post.js"></script>
</body>
</html>