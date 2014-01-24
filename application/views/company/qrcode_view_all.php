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
    
      <h3 class="text-danger">Сгенерированные QR коды</h3>
      <h4>Описание</h4>
      <table class="table table-striped font_size_16">
        <tr>
          <td>Изображение</td>
          <td>Код</td>
          <td>Дата добавления</td>
          <td>Подробнее</td>
        </tr>
        <?php foreach ($qrcode as $dataQrCode) {
          echo '<tr><td><img width=100px src="/'.$dataQrCode->qrcode_img.'"></td>';
          echo '<td><textarea class="form-control" rows="4"><img src="http://'.$_SERVER["HTTP_HOST"].'/'.$dataQrCode->qrcode_img.'"></textarea></td>';
          echo '<td>'.date("d/m/Y", $dataQrCode->data_add).'</td>';
          echo '<td><a href="/qrcode_generator/view/'.$dataQrCode->qrcode_id.'/">Подробнее</a></td></tr>';
        } ?>
      </table>
    </div>

    <div class="footer">
      <p>&copy; Richster 2013</p>
    </div>

  </div>
  </body>
</html>