<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
class Welcome_registartion extends CI_Controller{
  private $headerArr;

  function __construct(){

    parent::__construct();

    $this->load->helper('css_js_helper');

    $this->headerArr = array(
      'css' => css_js_helper('css'),
      'js' => css_js_helper('js')
    );

    $this->load->helper('check_user_redirect_url');
    check_user_redirect_url();
  }

  function index(){
    $this->load->helper('extract_key_this_array');
    $this->load->helper('execute_trim_empty_form');
    $this->load->library('welcome/validation_data_registration');
    $this->load->model('select_models');
    $this->load->model('insert_models');

    $data['error'] = extract_key_this_array($this->config->item('error_message'), $this->getPostDataRegistration());

    $data['userDataObj'] = empty($_POST) ? (object)$this->getUserData() : (object)$_POST;

    $data['header'] = $this->headerArr;

    $this->load->view( 'welcome/welcome_registartion_tpl', $data );
  }

  function getUserData(){
    return $this->select_models->show_columns('users');
  }

  function getPostDataRegistration(){
    if(!empty($_POST)){

      $submitStatus = $this->validation_data_registration->getCorrectData();

      if( $submitStatus !== true ){ return $submitStatus; }

      $this->saveDataCollectionUserRegistration();
    }

    return false;
  }

  function saveDataCollectionUserRegistration(){
    $_POST['password'] = md5($_POST['email'].$_POST['password']);

    $_POST['dataadd'] = $this->config->item('date');

    $_POST['hash'] = md5($_POST['email'].$_POST['password'].$_POST['dataadd']);

    $userId = $this->insert_models->insert_data_return_id($_POST, 'users');

    if($userId){

      $functionName = "rich_account_".$_POST['type_user'];

      $this->$functionName($userId, $_POST['phone'], $_POST['hash']);
    }
  }

  function rich_account_users($userId, $phone_user, $hash){
    $this->load->model('insert_data_this_function_mod');
    
    $dataDbAdd = array(
      'user_id' => $userId,
      'account_type_id' => 5,
      'account_name' => 'Ричстер',
      'account_number' => intval($phone_user),
      'account_balance' => 0
    );

    $queryStatus = $this->insert_data_this_function_mod->insert($dataDbAdd, __FUNCTION__);

    if($queryStatus){

      $this->saveSessionCurentUsers($userId, $hash);
    }
  }

  function rich_account_company($userId, $phone_company, $hash){
    $this->load->model('insert_data_this_function_mod');

    $dataDbAdd = array(
      'user_id' => $userId,
      'account_type_id' => 5,
      'account_company_name' => 'Ричстер',
      'account_company_number' => intval($phone_company),
      'account_company_balance' => 00.00
    );

    $queryStatus = $this->insert_data_this_function_mod->insert($dataDbAdd, __FUNCTION__);

    if($queryStatus){
      $this->saveSessionCurentUsers($userId, $hash);
    }
  }

  function saveSessionCurentUsers($userId, $hash){
    $this->session->set_userdata( array('users' => array('hash' => $hash, 'user_id' => $userId)) );

    redirect( "/_shared/user_distributor/", 'location'); 
  }
}