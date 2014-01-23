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
    $this->getPostDataRegistration();    

    $data['header'] = $this->headerArr;

    $this->load->view( 'welcome/welcome_registartion_tpl', $data );
  }

  function getPostDataRegistration(){
    if(!empty($_POST)){
      
      foreach ($_POST as $key => $value) {
        $_POST[$key] = trim($value);
        if( empty($_POST[$key]) ){
          return false;
        }
      }

      if( !$this->passwordConfirm($_POST) ) return false;

      unset($_POST['password_confirm']);

      $_POST['password'] = md5($_POST['email'].$_POST['password']);

      $_POST['dataadd'] = $this->config->item('date');

      $_POST['hash'] = md5($_POST['email'].$_POST['password'].$_POST['dataadd']);

      $dataUserId = $this->rich_users($_POST);

      if($dataUserId){
        
        $functionName = "rich_account_".$_POST['type_user'];
        
        $this->$functionName($dataUserId, $_POST['phone'], $_POST['hash']);
      }
    }
  }

  function passwordConfirm($post){
    if($post['password'] === $post['password_confirm']){
      return true;
    }
    return false;
  }

  function rich_users($dataDbAdd){
    $this->load->model('insert_data_this_function_mod');
    
    return $this->insert_data_this_function_mod->insert_return_id($dataDbAdd, __FUNCTION__);
  }

  function rich_account_user($idUser, $phone_user, $hash){
    $this->load->model('insert_data_this_function_mod');
    
    $dataDbAdd = array(
      'user_id' => $idUser,
      'account_type_id' => 5,
      'account_name' => 'Ричстер',
      'account_number' => intval($phone_user),
      'account_balance' => 0
    );

    $queryStatus = $this->insert_data_this_function_mod->insert($dataDbAdd, __FUNCTION__);

    if($queryStatus){

      $this->saveSessionCurentUsers($idUser, $hash);
    }
  }

  function rich_account_company($idUser, $phone_company, $hash){
    $this->load->model('insert_data_this_function_mod');
    
    $dataDbAdd = array(
      'company_id' => $dataCompanyId,
      'account_type_id' => 5,
      'account_company_name' => 'Ричстер',
      'account_company_number' => intval($phone_company),
      'account_company_balance' => 00.00
    );

    $queryStatus = $this->insert_data_this_function_mod->insert($dataDbAdd, __FUNCTION__);

    if($queryStatus){
      $this->saveSessionCurentUsers($idUser, $hash);
    }
  }

  function saveSessionCurentUsers($idUser, $hash){
    $this->session->set_userdata( array('user' => array('hash' => $hash, 'user_id' => $idUser)) );

    redirect( "/_shared/user_distributor/", 'location'); 
  }
}