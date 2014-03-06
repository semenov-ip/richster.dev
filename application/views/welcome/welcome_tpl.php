<?php
  $this->load->view('_shared/header');
?>
  <body>
  
  <div class="main">
    <div class="container">
      <?php $this->load->view('welcome/menu/top_menu'); ?>
        <div class="row margin-t-100 margin-b-80">
          <div class="col-md-7 title_tempale margin-t-25">
            <p>Ричстер позволяет делать заказы и оплачивать покупки в любом месте в любое время с телефона одним кликом!</p>
            <p>Теперь покупать, делать заказы и контролировать финансы проще и безопастнее.</p>
            <div class="button_downlad">
              <a href="#">Скачать Richster</a>
            </div>
          </div>

          <div class="col-md-4  col-sm-offset-1">

            <div class="jumbotron jumbotron_authorization">
              <div class="row">
                <div class="col-md-3 text_a_l">Войти</div>
                <div class="col-md-9 text_a_r">или <a href="/welcome/welcome_registartion/"> создать аккаунт</a></div>
              </div>
              <div class="row">

              <form class="form-horizontal" method="POST">
              <?php if($error){ echo '<div class="error_msg alert '.$error['class'].'">'.$error['text'].'</div>'; } ?>
                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="email" name="email" class="form-control" placeholder="Адрес электронной почты">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="password" name="password" class="form-control" placeholder="Пароль">
                  </div>
                </div>

                <div class="form-group float_l margin-l-15">
                  <label>
                    <input type="checkbox"> Запомнить
                  </label>
                </div>

                <div class="form-group float_r">
                  <div class="col-sm-6">
                    <div class="button_entry"><a href="javascript:void(0);" onclick="formSubmit(this);">Войти</a></div>
                  </div>
                </div>

              </form>
              </div>
              <div class="row password_remember">
                <div class="col-md-9 text_a_l" style="margin-top: -16px;"><a href="#">Забыли пароль?</a></div>
                <div class="col-md-3 text_a_r">&nbsp;</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="white_bacground">
      <div class="container">

        <div class="row">
          <div class="arrow">
            <img src="/images/arrow_index.png" alt="">
          </div>
        </div>

        <div class="row margin-t-50 margin-bottom-50">
          <div class="col-md-1"></div>
          <div class="col-md-5">
            <div class="cow">* Вы сможетет купить эту корову одним кликом</div>
            <br />
            <img width="440" src="/images/cow.png" />
          </div>
          <div class="col-md-1">
          </div>
           <div class="col-md-5 title_tempale">
            <img width="210" src="/images/phone_cow.png" />
          </div>
        </div>

        <div class="row">
          <div class="arrow_down">
            <img src="/images/arrow_index_down.png" alt="">
          </div>
        </div>
      </div>
    </div>


    <div class="main">
      <div class="container">
        <div class="row margin-t-50">
          <div class="col-md-7 title_shop">
            <h3>ДЛЯ МАГАЗИНОВ</h3>
            <ul class="templae_shop">
              <li>Продовайте свои товары или услуги с любых носителей</li>
              <li>Забудьте про корзину! Увеличте конверсию в 10 раз</li>
              <li>Теперь любые изображения способны продовать</li>
              <li>Лояльность покупателей теперь дело техники</li>
              <li>Ваши покупатели могут даже не заходить на Ваш сайт</li>
            </ul>

            <div class="button">
              <a href="/welcome/welcome_registartion/">Зарегестрировать магазин</a>
            </div>
          </div>
          <div class="col-md-6">
          </div>
        </div>
        <?php $this->load->view('_shared/footer_phone_tpl'); ?>
      </div>
    </div>
<?php $this->load->view('_shared/footer_tpl'); ?>
</body>
</html>