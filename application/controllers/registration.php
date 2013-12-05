<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
class Registration extends CI_Controller{
  private $headerArr;

  function __construct(){
    /*
     * Определяем основные параметры heder - заголовков
     * дополнительные css, js указываем в config.php файле
    */

    parent::__construct();
    
    $this->load->helper('css_js_helper');

    $this->headerArr = array(
      'css' => css_js_helper('css'),
      'js' => css_js_helper('js')
    );
  }

  function index(){
    $this->load->helper('check_user_redirect_url');
    check_user_redirect_url();

    $this->getPostDataRegistration();    

    $data['header'] = $this->headerArr;
    
    $this->load->view( 'registration_user_tpl', $data );
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

      $dataUserId = $this->rich_users($_POST);

      if($dataUserId){
        $this->rich_account_user($dataUserId, $_POST['phone']);
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

  function rich_account_user($dataUserId, $phone_user){
    $this->load->model('insert_data_this_function_mod');
    
    $dataDbAdd = array(
      'user_id' => $dataUserId,
      'account_type_id' => 5,
      'account_name' => 'Ричстер',
      'account_number' => intval($phone_user),
      'account_balance' => 0
    );

    $queryStatus = $this->insert_data_this_function_mod->insert($dataDbAdd, __FUNCTION__);

    if($queryStatus){
      redirect("/authentication/login/", 'location');
    }
  }
}