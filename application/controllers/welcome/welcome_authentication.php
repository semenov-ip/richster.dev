<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
class Welcome_authentication extends CI_Controller{
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
    
    $data['error'] = $this->checkLogin();

    $data['header'] = $this->headerArr;
    
    $this->load->view( 'authentication_tpl', $data );
  }

  function checkLogin(){
    if(isset($_POST['email'])){
      $email = trim($_POST['email']);
      
      $this->rich_users($email);
      
      $this->rich_company($email);
    }
  }

  function rich_users($email){
    $dataUserLogin = array (
      'email' => $email,
      'password' => md5($email.trim($_POST['password']))
    );
    
    $this->load->model('check_user/check_user_mod');
    
    $result = $this->check_user_mod->checkData( $dataUserLogin, __FUNCTION__, 'user_id, email' );
    
    if(is_array($result)){

      $this->session->set_userdata( array('user' => $result) );
        
      redirect("/", 'location');
    }
    return "Данные введены не корректно";
  }

  function rich_company($email){
    
    $dataCompanyLogin = array (
      'email_company' => $email,
      'password_company' => md5($email.trim($_POST['password']))
    );

    $this->load->model('check_user/check_user_mod');
    
    $result = $this->check_user_mod->checkData( $dataCompanyLogin, __FUNCTION__, 'company_id, email_company' );
    
    if(is_array($result)){

      $this->session->set_userdata( array('company' => $result) );
        
      redirect("/company/", 'location');
    }
    return "Данные введены не корректно";
  }
    
  public function log_out(){
      $this->session->sess_destroy();
      redirect( "authentication/login/", 'location' );
  }
}