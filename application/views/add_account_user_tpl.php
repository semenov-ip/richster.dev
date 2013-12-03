<?php
  $this->load->view('header');
?>
 <body>
  <div class="container">
    <div class="header">
      <?php $this->load->view('menu/top_menu'); ?>
      <h3 class="text-danger">Richster</h3>
    </div>

    <div class="jumbotron">
    
    <h3 class="text-danger">Добавить новый счет</h3>
      <form class="form-horizontal" role="form" method="post">

        <div class="form-group">
          <label  class="col-sm-5 control-label">Тип счета: </label>
          <div class="col-sm-7">
            <select name="account_type_id" class="form-control">
              <option value="0">Выберите тип счета</option>
              <?php foreach ($account_type as $dataAccountTypeObj) {
                echo '<option value="'.$dataAccountTypeObj->account_type_id.'">'.$dataAccountTypeObj->account_type_name.'</option>';
              } ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label  class="col-sm-5 control-label">Название счета: </label>
          <div class="col-sm-7">
            <input type="text" name="account_name" class="form-control" placeholder="Название счета">
          </div>
        </div>

        <div class="form-group">
          <label  class="col-sm-5 control-label">Номер карты: </label>
          <div class="col-sm-7">
            <input type="text" name="account_number" class="form-control" placeholder="Номер карты">
          </div>
        </div>

        <div class="form-group">
          <label  class="col-sm-5 control-label">CVS код: </label>
          <div class="col-sm-7">
            <input type="text" class="form-control" placeholder="CVS код">
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