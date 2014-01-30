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
        <h2 class="featurette-heading">Статус операции</h2>
        <div class="alert alert-success"><?php echo $status; ?></div>
      </div>
    </div>

    <div class="footer">
      <p>&copy; Richster 2013</p>
    </div>

  </div>
  </body>
</html>
