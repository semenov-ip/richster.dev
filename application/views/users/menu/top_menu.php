<div class="header">
  <div class="float_l">
    <a class="logo"></a>
  </div>

  <div class="topmenu_user">
    <a href="/users/user_settings/">ДЕНЬГИ</a>

    <a href="/users/user_history_order/">ЗАКАЗЫ</a>

    <a href="/users/user_costs/">РАСХОДЫ</a>

    <a href="/users/user_profil/">МОИ ДАННЫЕ</a>

  </div>
  
  <div class="topmenu_name">
    <a id="userName" href="#"><?php echo $user->name; ?></a>
  </div>

</div>

<div class="hidden">
  <div id="userNameBlock">
    Баланс: <?php echo $totalSumm; ?> руб.
    <a href="/_shared/log_out/">Выход</a>
  </div>
</div>