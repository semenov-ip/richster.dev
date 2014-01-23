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

      <div class="col-md-12">
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
