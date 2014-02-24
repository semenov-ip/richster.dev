

<a href="#" id="blob" class="btn large primary" rel="popover">hover for popover</a>


<script>
var img = '<img src="https://si0.twimg.com/a/1339639284/images/three_circles/twitter-bird-white-on-blue.png" />';

$("#blob").popover({ title: 'Look! A bird!', content: img, html:true });​​​
</script>






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
    <a id="userName" href="#"><?php echo $user->name; ?></a>
  </div>

</div>

<div class="hidden">
  <div id="userNameBlock">
    Баланс: <?php echo $totalSumm; ?> руб.
    <a href="/_shared/log_out/">Выход</a>
  </div>
</div>