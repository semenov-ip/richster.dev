<?php
  $this->load->view('header');
?>
 <body>
  <div class="container">
    <div class="header">
      <?php $this->load->view('menu/company_top_menu'); ?>
      <h3 class="text-danger">Richster</h3>
    </div>

    <div class="jumbotron">
    
    <h3 class="text-danger">Добавить QR код</h3>
      <form class="form-horizontal" role="form" method="post">

        <div class="form-group">
          <label  class="col-sm-5 control-label">Сумма: </label>
          <div class="col-sm-7">
            <input type="text" name="amount" class="form-control" placeholder="Сумма">
          </div>
        </div>

        <div class="form-group">
          <label  class="col-sm-5 control-label">Описание транзакции: </label>
          <div class="col-sm-7">
            <input type="text" name="description" class="form-control" placeholder="Описание транзакции">
          </div>
        </div>

        <div class="form-group">
          <label  class="col-sm-5 control-label">Номер заказа: </label>
          <div class="col-sm-7">
            <input type="text" name="order_id" class="form-control" placeholder="Номер заказа">
          </div>
        </div>

        <div class="form-group">
          <label  class="col-sm-5 control-label">Размер: </label>
          <div class="col-sm-7">
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