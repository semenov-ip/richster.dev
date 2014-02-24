<?php
  $this->load->view('_shared/header');
?>
 <body class="main">
  <div class="container">
    <?php $this->load->view('company/menu/top_menu'); ?>

    <div class="row margin-t-100">

      <div class="col-md-12">

        <div class="jumbotron jumbotron_order">
          <div class="text_a_l font-s-20"><a href="/company/add_shop/">Добавить новый магазин</a></div>
          <form class="form-horizontal" role="form" method="post">

            <div class="form-group">
              <label  class="col-sm-3 control-label">Название магазина: </label>
              <div class="col-sm-4">
                <input type="text" name="shop_name" class="form-control" placeholder="Название магазина">
              </div>
            </div>

            <div class="form-group">
              <label  class="col-sm-3 control-label">Описание: </label>
              <div class="col-sm-4">
                <textarea name="shop_description" class="form-control" rows="3"></textarea>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-12">
                <button type="submit" class="btn btn-default">Добавить</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>

    <?php $this->load->view('_shared/footer_phone_tpl'); ?>
  </div>

  <?php $this->load->view('_shared/footer_tpl'); ?>
  </body>
</html>