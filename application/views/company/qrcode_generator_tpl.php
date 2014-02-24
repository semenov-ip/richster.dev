<?php
  $this->load->view('_shared/header');
?>
 <body class="main">
  <div class="container">
    <?php $this->load->view('company/menu/top_menu'); ?>

    <div class="row margin-t-100">

      <div class="col-md-12">

        <div class="jumbotron jumbotron_order">
          <h3 class="text-danger">Добавить QR код</h3>
          <form class="form-horizontal" role="form" method="post">

        <div class="form-group">
          <label  class="col-sm-3 control-label">Сумма: </label>
          <div class="col-sm-4">
            <input type="text" name="amount" class="form-control" placeholder="Сумма">
          </div>
        </div>

        <div class="form-group">
          <label  class="col-sm-3 control-label">Описание транзакции: </label>
          <div class="col-sm-4">
            <input type="text" name="description" class="form-control" placeholder="Описание транзакции">
          </div>
        </div>

        <div class="form-group">
          <label  class="col-sm-3 control-label">Номер заказа: </label>
          <div class="col-sm-4">
            <input type="text" name="order_num" class="form-control" placeholder="Номер заказа">
          </div>
        </div>

        <div class="form-group">
          <label  class="col-sm-3 control-label">Размер: </label>
          <div class="col-sm-4">
            <select class="form-control" name="size">
              <?php 
                for($i=1;$i<=10;$i++){
                  echo '<option value="'.$i.'"'.(($i==3)?' selected':'').'>'.$i.'</option>';
                }
              ?>
            </select>
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