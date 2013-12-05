<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Get_phone_api extends CI_Controller {

  function __construct(){
    parent::__construct();
    
    header('Content-type: text/json');
  }

  // Добовление данных, кросбраузерный ajax запрос
  function index($hash=NULL){

    if(!empty($_POST)){

      $hash_str = md5(json_encode($_POST));

      if($hash_str == $hash){

        if ( !$this->searchCurrentUser($_POST['user_id']) ) return $this->statusIncorect('Отказ. Пользователь не зарегистрирован в системе.');

        $transaction = $this->saveOrderPostData($_POST);
        
        if(!$transaction) return $this->statusIncorect();

        return $this->statusCorrect($transaction);
      }
    }
    return $this->statusIncorect("Ошибка формирования данных");
  }

  function searchCurrentUser($user_id){
    $this->load->model('extract_data');
    
    $whereDataArr = array(
      'user_id' => $user_id
    );
    
    return $this->extract_data->extract_where_one($whereDataArr, 'rich_users');
  }

  function saveOrderPostData($getDataApiPhone){
    if(!empty($getDataApiPhone)){
      foreach ($getDataApiPhone as $key => $value) {
        $getDataApiPhone[$key] = trim($value);
        if( empty($getDataApiPhone[$key]) ){
          return false;
        }
      }

      $statusDescription = $this->operationTransactionGetStatusUser($getDataApiPhone);
      
      if( $statusDescription['status_id'] == 2 ){

        $this->rich_account_company($getDataApiPhone['company_id'], $getDataApiPhone['amount']);

      }

      $getDataApiPhone['status_id'] = $statusDescription['status_id'];
      
      $getDataApiPhone['description_status_id'] = $statusDescription['description_status_id'];
      
      $getDataApiPhone['transaction'] = md5(json_encode($getDataApiPhone));
      
      return $this->rich_order($getDataApiPhone);
    }
  }

  function operationTransactionGetStatusUser($getDataApiPhone){
    return $this->checkUserBalance($getDataApiPhone['user_id'], $getDataApiPhone['amount']);
  }

  function checkUserBalance($user_id, $amount){
    $this->load->model('extract_data');
    
    $whereDataArr = array(
      'user_id' => $user_id,
      'account_balance >' => $amount
    );
    
    $countAscName = "account_user_id";
    
    $userAccount = $this->extract_data->extract_where_limit_asc($whereDataArr, 'rich_account_user', $countAscName);
    
    if( !empty($userAccount) ){
      
      $balanceUser = $userAccount->account_balance - $amount;
      
      $this->rich_account_user($userAccount->account_user_id, $balanceUser);

      return $statusDescription = array('status_id' => 2, 'description_status_id' => 2);

    } else {

      return $statusDescription = array('status_id' => 3, 'description_status_id' => 3);

    }
  }

  function rich_account_user($account_user_id, $balanceUser){
    $this->load->model('update_data_this_function_mod');

    $dataDbUpdate = array(
      'account_balance' => $balanceUser
    );

    $whereDataArr = array(
      'account_user_id' => $account_user_id
    );

    $this->update_data_this_function_mod->update_where_id($dataDbUpdate, $whereDataArr, __FUNCTION__);
  }

  function rich_account_company($company_id, $amount){
    $this->load->model('update_data_this_function_mod');
    
    $this->load->model('extract_data');
    
    $whereDataArr = array(
      'company_id' => $company_id
    );
    
    $accountCompany = $this->extract_data->extract_where_one($whereDataArr, __FUNCTION__);

    $dataDbUpdate = array(
      'account_company_balance' => $amount + $accountCompany->account_company_balance
    );

    $whereDataArr = array(
      'company_id' => $company_id
    );

    $this->update_data_this_function_mod->update_where_id($dataDbUpdate, $whereDataArr, __FUNCTION__);
  }

  function rich_order($dataDbAdd){
    $this->load->model('insert_data_this_function_mod');
    
    $this->load->model('update_data_this_function_mod');
    
    $idOrderCurrent = $this->insert_data_this_function_mod->insert_return_id($dataDbAdd, __FUNCTION__);

    $dataDbUpdate['transaction'] = md5($dataDbAdd['transaction'].$idOrderCurrent);

    $whereDataArr = array(
      'order_id' => $idOrderCurrent
    );

    $currentQuery = $this->update_data_this_function_mod->update_where_id($dataDbUpdate, $whereDataArr, __FUNCTION__);

    if($currentQuery){
      return $dataDbUpdate['transaction'];
    }
    return false;
  }

  function statusIncorect($message){
    echo json_encode(array('success' => false, 'message' => $message));
  }
  
  function statusCorrect($transaction){
    echo json_encode(array('success' => true, 'transaction_id' => $transaction, 'message' => "Заказ сохранен"));
  }
}