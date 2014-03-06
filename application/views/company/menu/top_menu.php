<div class="header">
  <div class="float_l">
    <a class="logo"></a>
  </div>

  <div class="topmenu_user">
    <a href="/company/company_settings/">ДЕНЬГИ</a>

    <a href="/company/shop_order/">ЗАКАЗЫ</a>

    <a href="/company/qrcode_all_veiws/">QR КОДЫ</a>

    <a href="/company/user_profil/">МОИ ДАННЫЕ</a>

  </div>
  
  <div class="topmenu_name">
    <a data-toggle="popover" data-placement="bottom" data-content="Баланс: <span class='balance-green'><?php echo $totalSumm; ?></span><br /><a href='#'>Пополнить баланс</a><br /><hr class='hr-balance' /><a href='/_shared/log_out/'>Выход</a>" id="userName" title='' href="#"><?php echo $user->name; ?></a>
  </div>

</div>