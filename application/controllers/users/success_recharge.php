<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Success_recharge extends CI_Controller {
  private $headerArr;

  function __construct(){
    parent::__construct();
    
    $this->load->helper('css_js_helper');

    $this->headerArr = array(
      'css' => css_js_helper('css'),
      'js' => css_js_helper('js')
    );
    
    // Если пользователь не зашел на сайт
    $this->load->library('check_users_access');
    $this->who = $this->check_users_access->checkUsers();
  }

  public function index(){
    $this->load->model('update_models');
var_dump($_POST);
    if( !empty($_POST) ){
      $this->validationData($_POST);

      if($this->rechargeUser($_POST)){

        $this->session->set_flashdata('status', 'Пополнение счета на сумму '. $_POST['recipientAmount'] . ' прошло успешно!');

        redirect( "/users/success_recharge/view/", 'location');redirect( "/users/success_recharge/view/", 'location');
      }
    }
  }

  function validationData($dataCallback){
    return true;
  }

  function rechargeUser($dataCallback){
    $dataWhereArr['user_id'] = $dataCallback['orderId'];

    return $this->update_models->update_set_one_where_column_setplus($dataWhereArr, 'account_balance', $dataCallback['recipientAmount'], 'account_users');
  }

  function view(){
    $status = $this->session->flashdata('status') ? $this->session->flashdata('status') : "<a href='/users/user_settings/'>Вернуться на главную страницу</a>";

    $data['status'] = $status;

    $data['header'] = $this->headerArr;

    $this->load->view('users/success_recharge_tpl', $data);
  }
}