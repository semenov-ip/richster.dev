<?php if (!defined('BASEPATH')) exit('Нет доступа к скрипту'); 
  
  class Sms_sendclass {
    private $ci;

    function __construct(){
      $this->ci =& get_instance();
    }

    function send_sms($shopName, $orderStatus, $postData){
      $this->ci->load->helper('smsc_api');

      $date_ord = date("d/m/Y", time());

      $userAccountData = $this->getUserAccountData($postData['user_id']);

      // Телефоный номер по шаблону смс оператора
      $str_symbol = array("("=>"", ")"=>"", "+"=>"", "-"=>"", " "=>"", "8"=>"7");
      $phone = strtr($userAccountData->purse_number, $str_symbol);

      $message = "Richster: покупка в магазине ".$shopName." на сумму ".$postData['amount']. "руб. Остаток: ".$userAccountData->count_money. "руб. Статус операции: ".$orderStatus;
      
      list($sms_id, $sms_cnt, $cost, $balance) = send_sms($phone, $message);
    }

    function getUserAccountData($userId){
      $dataWhereArr['user_id'] = $userId;

      return $this->ci->select_models->select_one_row_where_column_selectcolumn($dataWhereArr, 'purse_number, count_money', 'account');
    }

    // Генерация смс сообщения
    function message_add($id_st, $name, $number, $domain, $date_ord, $senders_num){

      $this->ci->load->model('extract_mod/extract_data_mod');
      $data_db = $this->ci->extract_data_mod->extract_data(0);

      foreach ($data_db as $key => $value){

        $value['message'] = str_replace("<=Инициалы=>", $name, $value['message']);
        $value['message'] = str_replace("<=Номер заказа=>", $number, $value['message']);
        $value['message'] = str_replace("<=Название магазина=>", $domain, $value['message']);
        $value['message'] = str_replace("<=Дата=>", $date_ord, $value['message']);
        $value['message'] = str_replace("<=Номер отправителя=>", $senders_num, $value['message']);

        $mess_arr[$value['status']] = $value['message'];
      }

      return $mess_arr[$id_st];
    }
  }
?>