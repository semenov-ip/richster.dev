<?php
  $this->load->view('header');
?>
  <body>

  <div class="container">
    <div class="header">
    <?php $this->load->view('menu/user_top_menu'); ?>
    <h3 class="text-danger">Richster</h3>
    </div>

    <div class="row featurette">
    
      <div class="col-md-6 jumbotron text_left btn-none">
        <h3 class="text-danger">Мои деньги</h3>
        <table class="table font_size_16">
          <tr>
            <td>Тип счета</td>
            <td>Номер счета</td>
            <td>Деньги</td>
          </tr>
          <tr>
            <td>Ричстер руб</td>
            <td><?php echo $user->phone; ?></td>
            <td>0 руб.</td>
          </tr>
          <?php if(!empty($account_user)){ foreach ($account_user as $accountUserObj) {
            echo "<tr><td>".$accountUserObj->account_name."</td>";
            echo "<td>".$accountUserObj->account_number."</td>";
            echo "<td>".$accountUserObj->account_balance." руб.</td></tr>";
          } }
          ?>
        </table>
        <a href="/add_account_user/" class="btn btn-success btn-sm">Добавить</a>
      </div>

      <div class="col-md-6">
        <h2 class="featurette-heading">История операций</h2>
        <table class="table table-striped font_size_16">
        <tr>
          <td>1.01.2013</td>
          <td>Покупка в магазине</td>
          <td>1000 руб.</td>
        </tr>
        </table>
      </div>
    </div>

    <div class="footer">
      <p>&copy; Richster 2013</p>
    </div>

  </div>
  </body>
</html>
