<?php
  $this->load->view('_shared/header');
?>
 <body>
  <div class="container">
    <div class="header">
      <?php $this->load->view('company/menu/top_menu'); ?>
      <h3 class="text-danger">Richster</h3>
    </div>

    <div class="jumbotron">
    
      <h3 class="text-danger">Заказы компании</h3>
      <table class="table table-bordered font_size_16">
      <tr>
        <td>Статус</td>
        <td>Описание статуса</td>
        <td>Покупатель</td>
        <td>Телефон покупателя</td>
        <td>Магазин</td>
        <td>Стоимость</td>
      </tr>
      <?php if(!empty($order)){ foreach ($order as $dataOrderObj) {
        echo "<tr><td>".$dataOrderObj->status_name."</td>";
        echo "<td>".$dataOrderObj->description_status_name."</td>";
        echo "<td>".$dataOrderObj->name."</td>";
        echo "<td>".$dataOrderObj->phone."</td>";
        echo "<td>".$dataOrderObj->shop_name."</td>";
        echo "<td>".$dataOrderObj->amount." руб.</td></tr>";
      } }?>
      </table>
    </div>

    <div class="footer">
      <p>&copy; Richster 2013</p>
    </div>

  </div>
  </body>
</html>