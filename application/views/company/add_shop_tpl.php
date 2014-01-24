<?php
  $this->load->view('_shared/header');
?>
 <body>
  <div class="container">
    <div class="header">
      <?php $this->load->view('company/menu/top_menu'); ?>
      <h3 class="text-danger">Richster</h3>
    </div>

    <div class="jumbotron">
    
    <h3 class="text-danger">Добавить новый магазин</h3>
      <form class="form-horizontal" role="form" method="post">

        <div class="form-group">
          <label  class="col-sm-5 control-label">Название магазина: </label>
          <div class="col-sm-7">
            <input type="text" name="shop_name" class="form-control" placeholder="Название магазина">
          </div>
        </div>

        <div class="form-group">
          <label  class="col-sm-5 control-label">Описание: </label>
          <div class="col-sm-7">
            <textarea name="shop_description" class="form-control" rows="3"></textarea>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-1 col-sm-12">
            <button type="submit" class="btn btn-default">Добавить</button>
          </div>
        </div>

      </form>
    </div>

    <div class="footer">
      <p>&copy; Richster 2013</p>
    </div>

  </div>
  </body>
</html>