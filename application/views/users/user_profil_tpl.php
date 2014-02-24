<?php
  $this->load->view('_shared/header');
?>
<body class="main">

  <div class="container">
    <?php $this->load->view('users/menu/top_menu'); ?>


    <div class="row margin-t-100">

      <div class="col-md-12">

        <div class="jumbotron jumbotron_order">
          <div class="text_a_l font-s-20"><a href="/users/user_profil/">Мои данные</a></div>
          <table class="table font_size_16 text_left">
            <tr>
              <td width="20%">ФИО</td>
              <td><?php echo $user->name; ?></td>
            </tr>
            <tr>
              <td>Телефон</td>
              <td><?php echo $user->phone; ?></td>
            </tr>
            <tr>
              <td>Адрес доставки</td>
              <td> - </td>
            </tr>
            <tr>
              <td>Индекс</td>
              <td> - </td>
            </tr>
          </table>
          <div class="text_a_r"><a href="#">Редактировать данные</a></div>
        </div>
      </div>

    </div>

    <?php $this->load->view('_shared/footer_phone_tpl'); ?>
  </div>

  <?php $this->load->view('_shared/footer_tpl'); ?>
  
  </body>
</html>