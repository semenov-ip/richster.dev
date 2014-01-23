<?php
  $this->load->view('_shared/header');
?>
  <body>

    <div class="container">
      <div class="header">
        <?php $this->load->view('welcome/menu/top_menu'); ?>
        <h3 class="text-danger">Richster</h3>
      </div>

      <div class="jumbotron">

        <p><a class="btn btn-lg btn-success" href="/welcome/welcome_registartion/" role="button">Зарегестрироваться</a></p>

        <form class="form-signin" method="POST">
          <h2 class="form-signin-heading">Вход в систему</h2>
          <input type="text" name="email" class="form-control" placeholder="Email address" required autofocus>
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <input type="submit" class="btn btn-lg btn-primary btn-block" value="Войти">
        </form>
      
      </div>

      <div class="footer">
        <p>&copy; Company 2013</p>
      </div>

    </div>
  </body>
</html>
