<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php tpl('component/css');?>
  <link rel="stylesheet" href="css/cat.css">
  <title>Tag</title>
</head>
<body>
  <div class="container">
    <h2>Tag</h2>
    <form id="cat-form">
      <input type="hidden" name="id">
      <label>
        标题：
        <input class="form-control" type="text" name="title">
      </label>
      <button class="btn btn-primary" type="submit">提交</button>
    </form>
    <ul id="tag-list">
    </ul>
    <?php tpl('component/js') ?>
    <script src="js/cat.js"></script>
  </div>
</body>
</html>