<?php
  $this->load->view('header');
?>
<body>

  <div class="container">
    <form class="form-signin" method="POST">
      <h2 class="form-signin-heading">Вход в систему</h2>
        <input type="text" name="email" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <input type="submit" class="btn btn-lg btn-primary btn-block" value="Войти">
        <a class="btn btn-lg btn-primary btn-block">Зарегестрироваться</a>
    </form>
  </div>
  
  </body>
</html>