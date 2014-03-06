<?php
  $this->load->view('_shared/header');
?>
 <body class="main">
  <div class="container">
    <?php $this->load->view('company/menu/top_menu'); ?>

    <div class="row margin-t-100">

      <div class="col-md-12">

        <div class="jumbotron jumbotron_order">
          <div class="text_a_l font-s-20"><a href="/company/qrcode_all_veiws/">Сгенерированные QR коды</a></div>
          <table class="table table-striped font_size_16 text_c">
            <tr>
              <td>Изображение</td>
              <td>Код</td>
              <td>Дата добавления</td>
              <td>Подробнее</td>
            </tr>
          <?php 
          if( !empty($qrcode) ){
              foreach ($qrcode as $dataQrCode) {
                echo '<tr><td><img width=100px src="/'.$dataQrCode->qrcode_img.'"></td>';
                echo '<td><textarea class="form-control" rows="4"><img src="http://'.$_SERVER["HTTP_HOST"].'/'.$dataQrCode->qrcode_img.'"></textarea></td>';
                echo '<td>'.date("d/m/Y", $dataQrCode->data_add).'</td>';
                echo '<td><a href="/company/qrcode_generator/view/'.$dataQrCode->qrcode_id.'/">Подробнее</a></td></tr>';
              }
            } ?>
          </table>
        </div>

      </div>
    </div>

    <?php $this->load->view('_shared/footer_phone_tpl'); ?>
  </div>

  <?php $this->load->view('_shared/footer_tpl'); ?>
  </body>
</html>