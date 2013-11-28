<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Get_phone_api extends CI_Controller {

  function __construct(){
  parent::__construct();
  
  }

  // Добовление данных, кросбраузерный ajax запрос
  function index($hash=NULL){

    if( isset($_POST['data'])){
    
      $hash_str = md5(md5($_POST['data']).md5($this->config->item('city_call')));

      if($hash_str == $hash){

        $dataCityCall = json_decode($_POST['data']);

        return $this->statusCorrect();
      }
    }
    return $this->statusIncorect();
  }

  function statusIncorect(){
    echo json_encode(array('success' => false));
  }
  
  function statusCorrect(){
    echo json_encode(array('success' => true));
  }
}