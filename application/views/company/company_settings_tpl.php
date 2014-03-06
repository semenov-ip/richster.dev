<?php
  $this->load->view('_shared/header');
?>
<body class="main">

  <div class="container">
    <?php $this->load->view('company/menu/top_menu'); ?>

    <div class="row margin-t-100">
    
      <div class="col-md-5 btn-none">
        
        <div class="jumbotron jumbotron_user">
          <div class="row">
            <div class="col-md-6 text_a_l font-s-20 padding-left-25"><a href="/company/company_settings/">Деньги</a></div>
            <div class="col-md-6 text_a_r"></div>
          </div>
          
          <table class="table font_size_16">
            <tr>
              <td>В сумме</td>
              <td><?php echo $totalSumm; ?></td>
              <td></td>
            </tr>
            <?php 
              if(!empty($account_company)){ foreach ($account_company as $accountCompanyObj) {
                echo "<tr><td>".$accountCompanyObj->purse_number."</td>";
                echo "<td>".$accountCompanyObj->count_money."</td></tr>";
              } }
            ?>
          </table>
        
        </div>

      </div>

      <div class="col-md-7">
        <h2 class="featurette-heading">Мои магазины</h2>
        <table class="table font_size_16 table_settings">
          <tr>
            <td>Название магазина</td>
            <td>Описание</td>
            <td>Сформировать</td>
          </tr>
          <?php 
            if(!empty($company_shop)){ foreach ($company_shop as $companyShopObj){
              echo "<tr><td>".$companyShopObj->shop_name."</td>";
              echo "<td>".$companyShopObj->shop_description."</td>";
              echo "<td align=center><a class='grenlink' href='/company/qrcode_generator/index/".$companyShopObj->shop_id."/'>QR</a></td></tr>";
          } }?>
        </table>
        <a href="/company/add_shop/" class="btn btn-success btn-sm">Добавить магазин</a>
      </div>
    </div>

    <?php $this->load->view('_shared/footer_phone_tpl'); ?>
  </div>
  <?php $this->load->view('_shared/footer_tpl'); ?>
  </body>
</html>