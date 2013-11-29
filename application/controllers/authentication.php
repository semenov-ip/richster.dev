<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
class Authentication extends CI_Controller{
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
  
  public function login(){
    if($this->session->userdata('user')){
      redirect( "/", 'location' );
    }
    
    $data['error'] = $this->checkLogin();

    $data['header'] = $this->headerArr;
    
    $this->load->view( 'login_tpl', $data );
  }

  function checkLogin(){
    if(isset($_POST['email'])){
      
      $email = trim($_POST['email']);
        
      $dataUserLogin = array (
        'email' => $email,
        'password' => md5($email.trim($_POST['password']))
      );

      $this->load->model('check_user/check_user_mod');
      $result = $this->check_user_mod->checkData($dataUserLogin);

      if(is_array($result)){

        $this->session->set_userdata( array('user' => $result) );
        
        redirect("/", 'location');
      }
      return "Данные введены не корректно";
    }
    return false;
  }
    
  public function log_out(){
      $this->session->sess_destroy();
      redirect( "authentication/login/", 'location' );
  }
}
?>