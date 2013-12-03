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
    
    <h3 class="text-danger">Зарегестрироваться</h3>
      <form class="form-horizontal" role="form" method="post">
        <div class="form-group">
          <label  class="col-sm-4 control-label">Фаше Имя:</label>
          <div class="col-sm-8">
            <input type="text" name="name" class="form-control" placeholder="Ваше имя">
          </div>
        </div>

        <div class="form-group">
          <label  class="col-sm-4 control-label">Телефон:</label>
          <div class="col-sm-8">
            <input type="text" name="phone" class="form-control" placeholder="Телефон">
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-4 control-label">Email:</label>
          <div class="col-sm-8">
            <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
          </div>
        </div>
        
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-4 control-label">Пароль:</label>
          <div class="col-sm-8">
            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
          </div>
        </div>
        
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-4 control-label">Повторите пароль:</label>
          <div class="col-sm-8">
            <input type="password" name="password_confirm" class="form-control" id="inputPassword3" placeholder="Password">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Зарегестрировать</button>
          </div>
        </div>

      </form>
    </div>

    <div class="footer">
    <p>&copy; Company 2013</p>
    </div>

  </div>
  </body>
</html>