<?php
  $this->load->view('header');
?>
 <body>
  <div class="container">
    <div class="header">
      <?php $this->load->view('menu/company_top_menu'); ?>
      <h3 class="text-danger">Richster</h3>
    </div>

    <div class="jumbotron">
    
      <h3 class="text-danger">Вы добавили следующий QR код</h3>
      <img src="/<?php echo $qrcode->qrcode_img; ?>">
      <div class="alert alert-success new-style">
        Для того что бы вставить данный код себе на сайт, скопируйте следующий код:
        <textarea class="form-control"><img src="http://<?php echo $_SERVER["HTTP_HOST"]; ?>/<?php echo $qrcode->qrcode_img; ?>"></textarea>
      </div>
      <h4>Описание</h4>
      <table class="table table-striped font_size_16">
        <tr>
          <td>Стоимость</td>
          <td>Описание</td>
          <td>Номер заказа</td>
          <td>Дата добавления</td>
        </tr>
        <tr>
          <td><?php echo $qrcode->amount; ?> руб.</td>
          <td><?php echo $qrcode->description; ?></td>
          <td><?php echo $qrcode->order_num; ?></td>
          <td><?php echo date("d/m/Y", $qrcode->data_add); ?></td>
          </td>
        </tr>
      </table>
    </div>

    <div class="footer">
      <p>&copy; Richster 2013</p>
    </div>

  </div>
  </body>
</html>