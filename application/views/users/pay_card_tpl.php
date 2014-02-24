<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>

    <form action="https://rbkmoney.ru/acceptpurchase.aspx" name="pay" method="POST">
      <td width="39%">
        <div align="center">
          <input type="hidden" name="eshopId" value="2024529">
          <input type="hidden" name="orderId" value="<?php echo $user->user_id; ?>">
          <input type="text" name="recipientAmount" value="">
          <input type="hidden" name="recipientCurrency" value="RUR">
          <input type="hidden" name="user_email" value="<?php echo $user->email; ?>"> 
          <input type="hidden" name="successUrl" value="http://richster.ru/users/success_recharge/">
          <input type="text" name="failUrl" value="http://richster.ru/users/success_recharge/">
          <input type="hidden" name="preference" value="bankcard">
          <input type="hidden" name="serviceName" value="Пополнение счета пользователя <?php echo $user->email; ?>">
          <input type="submit" name="button" value="Пополнить с карты">
        </div>
      </td>
    </form>
  </tr>
</table>