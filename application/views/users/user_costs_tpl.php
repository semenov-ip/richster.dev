<?php
  $this->load->view('_shared/header');
?>
<body class="main">

  <div class="container">
    <?php $this->load->view('users/menu/top_menu'); ?>


    <div class="row margin-t-100">
    
      <div class="col-md-12">
        
        <div class="jumbotron jumbotron_order">
          <div class="text_a_l font-s-20"><a href="/users/user_history_order/">Заказы</a></div>
          <table class="table table-striped font_size_16 text_c">
            <tr>
              <td>Дата и время</td>
              <td>Магазин</td>
              <td>Товары</td>
              <td>Сумма</td>
              <td>Состояние</td>
              <td>Статус</td>
            </tr>
            <?php if(!empty($history_order)){ foreach ($history_order as $dataOrder) { ?>
              <tr>
                <td><?php echo $dataOrder->data_add; ?></td>
                <td><?php echo $dataOrder->shop_name; ?></td>
                <td><?php echo $dataOrder->description; ?> руб.</td>
                <td><?php echo $dataOrder->amount; ?></td>
                <td>холд</td>
                <td><?php echo $dataOrder->status_name; ?></td>
              </tr>
            <?php }  } ?>
          </table>
        </div>
        

      </div>
    </div>

    <?php $this->load->view('_shared/footer_phone_tpl'); ?>
  </div>

  <?php $this->load->view('_shared/footer_tpl'); ?>
  
  </body>
</html>