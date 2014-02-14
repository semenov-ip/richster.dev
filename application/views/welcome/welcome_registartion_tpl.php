<?php
  $this->load->view('_shared/header');
?>
 <body class="main">

  <div class="container">
    
    <?php $this->load->view('welcome/header_menu_tpl'); ?>

    <div class="row margin-t-100">

      <div class="col-md-12">
        <div class="jumbotron jumbotron_reg">
          <div class="row">
            <div class="col-md-6 text_a_l">Создать аккаунт</div>
            <div class="col-md-6 text_a_r">или <a href="/">войти</a></div>
          </div>

          <div class="row">
            <form class="form-horizontal" role="form" method="post">
              <div class="form-group">
                <div class="col-md-10 col-md-offset-1">
                  <input type="text" name="name" class="form-control" placeholder="Ваше имя">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-10 col-md-offset-1">
                  <input type="text" name="phone" class="form-control" placeholder="Телефон">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-10 col-md-offset-1">
                  <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Адрес электронной почты">
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-md-10 col-md-offset-1">
                  <select class="form-control" name="type_user">
                    <option value="users">Пользователя</option>
                    <option value="company">Магазин</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-10 col-md-offset-1">
                  <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Пароль">
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-md-10 col-md-offset-1">
                  <input type="password" name="password_confirm" class="form-control" id="inputPassword3" placeholder="Повторите пароль">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-10">
                  <label>
                    <input type="checkbox" checked="checked" disabled="disabled"> Я принимаю <a href="#">условия регистрации</a>
                  </label>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-5 col-md-offset-7">
                  <div class="button_entry"><a href="javascript:void(0);" onclick="formSubmit(this);">Регистрация</a></div>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>

    </div>
    <?php $this->load->view('welcome/footer_phone_tpl'); ?>
  </div>

  <?php $this->load->view('welcome/footer_tpl'); ?>

  </body>
</html>