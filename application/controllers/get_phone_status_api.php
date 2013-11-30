<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class get_phone_status_api extends CI_Controller {

  function __construct(){
    parent::__construct();
    
    header('Content-type: text/json');
  }

  // Добовление данных, кросбраузерный ajax запрос
  function index($hash=NULL){
    
    return statusIncorect();
    
  }

  function statusIncorect(){
    echo json_encode(array('success' => 0, 'transaction_id' => 'uywqerutwq23', 'status_id' => '1'));
  }
  
  function statusCorrect(){
    echo json_encode(array('success' => 1));
  }
}