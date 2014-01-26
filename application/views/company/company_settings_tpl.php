<?php
  $this->load->view('_shared/header');
?>
  <body>

  <div class="container">
    <div class="header">
    <?php $this->load->view('company/menu/top_menu'); ?>
    <h3 class="text-danger">Richster</h3>
    </div>

    <div class="row featurette">
    
      <div class="col-md-5 jumbotron text_left btn-none">
        <h3 class="text-danger">Мои деньги</h3>
        <table class="table font_size_16">
          <tr>
            <td>Тип счета</td>
            <td>Номер счета</td>
            <td>Деньги</td>
          </tr>
          <?php if(!empty($account_company)){ foreach ($account_company as $accountCompanyObj) {
            echo "<tr><td>".$accountCompanyObj->account_company_name."</td>";
            echo "<td>".$accountCompanyObj->account_company_number."</td>";
            echo "<td>".$accountCompanyObj->account_company_balance." руб.</td></tr>";
          } }
          ?>
        </table>

          
<form action="https://rbkmoney.ru/acceptpurchase.aspx" method="POST">
<input type="hidden" name="eshopId" value="2000000">
<input type="hidden" name="recipientAmount" value="10">
<input type="hidden" name="recipientCurrency" value="RUR">
<input type="hidden" name="orderId" value="111">
<input type="hidden" name="user_email" value="email@email.com">
<input type="hidden" name="serviceName" value="комментарий">
<input type="hidden" name="preference" value="bankCard">
<input type="hidden" name="successUrl" value="http://www.example.ru">
<input type="hidden" name="failUrl" value="http://www.example.ru">
<input type="submit" name="button" value="оплатить">
</form>








          
      </div>

      <div class="col-md-7">
        <h2 class="featurette-heading">Мои магазины</h2>
        <table class="table table-striped font_size_16">
        <tr>
          <td>Название магазина</td>
          <td>Описание</td>
          <td>Сформировать</td>
        </tr>
        <?php if(!empty($company_shop)){ foreach ($company_shop as $companyShopObj){
            echo "<tr><td>".$companyShopObj->shop_name."</td>";
            echo "<td>".$companyShopObj->shop_description."</td>";
            echo "<td align=center><a href='/company/qrcode_generator/index/".$companyShopObj->shop_id."/'>QR</a></td></tr>";
        } }?>
        </table>
        <a href="/company/add_shop/" class="btn btn-success btn-sm">Добавить магазин</a>
      </div>
    </div>

    <div class="footer">
      <p>&copy; Richster 2013</p>
    </div>

  </div>
  </body>
</html>
