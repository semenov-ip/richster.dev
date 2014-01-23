<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
class Welcome extends CI_Controller {
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

    $this->load->helper('check_user_redirect_url');
    check_user_redirect_url();
  }

  function index(){
    $data['error'] = $this->checkLogin();

    $data['header'] = $this->headerArr;

    $this->load->view('welcome/welcome_tpl', $data);
  }

  function checkLogin(){
    if(isset($_POST['email'])){
      $email = trim($_POST['email']);

      $this->rich_users($email);
    }
  }

  function rich_users($email){
    $dataUserLogin = array (
      'email' => $email,
      'password' => md5($email.trim($_POST['password']))
    );

    $this->load->model('check_user/check_user_mod');

    $result = $this->check_user_mod->checkData( $dataUserLogin, __FUNCTION__, 'user_id, hash' );

    if(is_array($result)){

      $this->session->set_userdata( array('users' => $result) );

      redirect( "/_shared/user_distributor/", 'location');
    }

    return "Данные введены не корректно";
  }
}