<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php tpl('component/css') ?>
  <title>Document</title>
</head>
<body>
  <div class="container">
    <h2>添加文章</h2>
    <form id="product-form">
      <input type="hidden" name="id">
      <label>
        标题：
        <input class="form-control" type="text" name="title">
      </label>
      <label>
        正文：
        <input class="form-control" type="text" name="content">
      </label>
      <label>
        Tag：
        <select class="form-control" name="cat_id" id="cat-selector">
        </select>
      </label>
      <button class="btn btn-primary" type="submit">提交</button>
    </form>
  </div>
</body>
</html>