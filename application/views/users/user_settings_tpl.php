<?php
  $this->load->view('_shared/header');
?>
  <body>

  <div class="container">
    <div class="header">
    <?php $this->load->view('users/menu/top_menu'); ?>
    <h3 class="text-danger">Richster</h3>
    </div>

    <div class="row featurette">
    
      <div class="col-md-6 jumbotron text_left btn-none">
        <h3 class="text-danger">Мои деньги</h3>
        <table class="table font_size_16">
          <tr>
            <td>Тип счета</td>
            <td>Номер счета</td>
            <td>Деньги</td>
          </tr>
          <?php if(!empty($account_user)){ foreach ($account_user as $accountUserObj) {
            echo "<tr><td>".$accountUserObj->account_name."</td>";
            echo "<td>".$accountUserObj->account_number."</td>";
            echo "<td>".$accountUserObj->account_balance." руб.</td></tr>";
          } }
          ?>
        </table>

        <table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>

            <form action="https://rbkmoney.ru/acceptpurchase.aspx" name="pay" method="POST">
              <td width="39%">
                <div align="center">
                  <input type="hidden" name="eshopId" value="2024529">
                  <input type="hidden" name="orderId" value="<?php echo $user->user_id; ?>">
                  <input type="text" name="recipientAmount" value="">
                  <input type="hidden" name="recipientCurrency" value="RUR">
                  <input type="hidden" name="user_email" value="<?php echo $user->email; ?>"> 
                  <input type="hidden" name="successUrl" value="http://richster.ru/users/success_recharge/">
                  <input type="text" name="failUrl" value="http://richster.ru/users/success_recharge/">
                  <input type="hidden" name="preference" value="bankcard">
                  <input type="hidden" name="serviceName" value="Пополнение счета пользователя <?php echo $user->email; ?>">
                  <input type="submit" name="button" value="Пополнить с карты">
                </div>
              </td>
            </form>
          </tr>
        </table>

      </div>

      <div class="col-md-6">
        <h2 class="featurette-heading">История операций</h2>
        <table class="table table-striped font_size_16">
          <?php if(!empty($history_order)){ foreach ($history_order as $dataOrder) { ?>
            <tr>
              <td><?php echo $dataOrder->data_add; ?></td>
              <td>В магазине: <?php echo $dataOrder->shop_name; ?></td>
              <td><?php echo $dataOrder->amount; ?> руб.</td>
              <td><?php echo $dataOrder->status_name; ?></td>
            </tr>
          <?php }  } ?>
        </table>
      </div>
    </div>

    <div class="footer">
      <p>&copy; Richster 2013</p>
    </div>

  </div>
  </body>
</html>
