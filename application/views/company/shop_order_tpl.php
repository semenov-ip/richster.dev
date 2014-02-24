<?php
  $this->load->view('_shared/header');
?>
 <body class="main">
  <div class="container">
    <?php $this->load->view('company/menu/top_menu'); ?>

    <div class="row margin-t-100">

      <div class="col-md-12">

        <div class="jumbotron jumbotron_order">
          <div class="text_a_l font-s-20"><a href="/company/shop_order/">Заказы компании</a></div>
          <table class="table table-striped font_size_16 text_c">
            <tr>
              <td>Номер заказа</td>
              <td>Статус</td>
              <td>Описание статуса</td>
              <td>Покупатель</td>
              <td>Телефон покупателя</td>
              <td>Магазин</td>
              <td>Стоимость</td>
            </tr>
              <?php if(!empty($order)){ foreach ($order as $dataOrderObj) {
                echo "<tr><td>".$dataOrderObj->order_num."</td>";
                echo "<td>".$dataOrderObj->status_name."</td>";
                echo "<td>".$dataOrderObj->description_status_name."</td>";
                echo "<td>".$dataOrderObj->name."</td>";
                echo "<td>".$dataOrderObj->phone."</td>";
                echo "<td>".$dataOrderObj->shop_name."</td>";
                echo "<td>".$dataOrderObj->amount." руб.</td></tr>";
              } }?>
          </table>
        </div>

      </div>
    </div>

    <?php $this->load->view('_shared/footer_phone_tpl'); ?>
  </div>

  <?php $this->load->view('_shared/footer_tpl'); ?>
  </body>
</html>