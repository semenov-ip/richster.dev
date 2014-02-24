<?php
  $this->load->view('_shared/header');
?>
<body class="main">

  <div class="container">
    <?php $this->load->view('users/menu/top_menu'); ?>

    <div class="row margin-t-100">
    
      <div class="col-md-5 btn-none">
        
        <div class="jumbotron jumbotron_user">
          <div class="row">
            <div class="col-md-6 text_a_l font-s-20 padding-left-25"><a href="/users/user_settings/">Деньги</a></div>
            <div class="col-md-6 text_a_r"></div>
          </div>
          
          <table class="table font_size_16">
            <tr>
              <td>В сумме</td>
              <td></td>
              <td></td>
            </tr>
            <?php if(!empty($account_user)){ foreach ($account_user as $accountUserObj) {
                echo "<tr><td>".$accountUserObj->account_number."</td>";
                echo "<td>".$accountUserObj->account_balance." руб.</td>";
                echo "<td><a class='grenlink' href='#'>Пополнить</a></td></tr>";
            } }
            ?>
          </table>
        
        </div>

      </div>

      <div class="col-md-7">
        <h2 class="featurette-heading">История операций</h2>
        <table class="table font_size_16 table_settings">
          <?php if(!empty($history_order)){ foreach ($history_order as $dataOrder) { ?>
            <tr>
              <td><?php echo $dataOrder->data_add; ?></td>
              <td><?php echo $dataOrder->description; ?></td>
              <td><?php echo $dataOrder->amount; ?> р.</td>
              <td><?php echo $dataOrder->status_name; ?></td>
            </tr>
          <?php }  } ?>
        </table>
      </div>
    </div>

    <?php $this->load->view('_shared/footer_phone_tpl'); ?>
  </div>

  <?php $this->load->view('_shared/footer_tpl'); ?>
  </body>
</html>
