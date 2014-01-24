<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Get_phone_status_api extends CI_Controller {

  function __construct(){
    parent::__construct();
    
    header('Content-type: text/json');
  }

  // Добовление данных, кросбраузерный ajax запрос
  function index($hash=NULL){
    
    if(!empty($_POST)){
      
      $hash_str = md5(json_encode($_POST));

      if($hash_str == $hash){

        $status_id = $this->rich_order( $_POST['transaction_id'] );

        return $this->statusCorrect($status_id, $_POST['transaction_id']);
      }
    }

    return $this->statusIncorect();
    
  }

  function rich_order( $transaction ){
    $this->load->model('extract_data');
    
    $whereDataArr = array(
      'transaction' => $transaction
    );
    
    $orderData = $this->extract_data->extract_where_one($whereDataArr, __FUNCTION__);

    return $orderData->status_id;
  }

  function statusIncorect(){

    echo json_encode(array('success' => false));

  }
  
  function statusCorrect($status_id, $transaction){
    
    echo json_encode( array('success' => true, 'transaction_id' => $transaction, 'status_id' => $status_id));

  }
}