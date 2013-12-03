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
    
    <h3 class="text-danger">Зарегестрировать компанию</h3>
      <form class="form-horizontal" role="form" method="post">
        <div class="form-group">
          <label  class="col-sm-5 control-label">Название организации: </label>
          <div class="col-sm-7">
            <input type="text" name="name_company" class="form-control" placeholder="Название организации">
          </div>
        </div>

        <div class="form-group">
          <label  class="col-sm-5 control-label">ФИО: </label>
          <div class="col-sm-7">
            <input type="text" name="fio_company" class="form-control" placeholder="ФИО">
          </div>
        </div>

        <div class="form-group">
          <label  class="col-sm-5 control-label">Телефон: </label>
          <div class="col-sm-7">
            <input type="text" name="phone_company" class="form-control" placeholder="Телефон">
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-5 control-label">Email: </label>
          <div class="col-sm-7">
            <input type="email" name="email_company" class="form-control" id="inputEmail3" placeholder="Email">
          </div>
        </div>
        
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-5 control-label">Пароль: </label>
          <div class="col-sm-7">
            <input type="password" name="password_company" class="form-control" id="inputPassword3" placeholder="Password">
          </div>
        </div>
        
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-5 control-label">Повторите пароль: </label>
          <div class="col-sm-7">
            <input type="password" name="password_confirm" class="form-control" id="inputPassword3" placeholder="Password">
          </div>
        </div>

        <div class="form-group">
          <label  class="col-sm-5 control-label">ИНН: </label>
          <div class="col-sm-7">
            <input type="text" name="inn_company" class="form-control" placeholder="ИНН">
          </div>
        </div>

        <div class="form-group">
          <label  class="col-sm-5 control-label">ОГРН: </label>
          <div class="col-sm-7">
            <input type="text" name="ogrn_company" class="form-control" placeholder="ОГРН">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-1 col-sm-12">
            <button type="submit" class="btn btn-default">Зарегестрировать</button>
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