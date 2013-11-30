<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
class Registration_company extends CI_Controller{
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
    $this->load->helper('check_company_redirect_url');
    check_company_redirect_url();

    $this->getPostDataRegistration();    

    $data['header'] = $this->headerArr;
    
    $this->load->view( 'registration_company_tpl', $data );
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

      $_POST['password_company'] = md5($_POST['email_company'].$_POST['password_company']);

      $this->rich_company($_POST);
    }
  }

  function passwordConfirm($post){
    if($post['password_company'] === $post['password_confirm']){
      return true;
    }
    return false;
  }

  function rich_company($dataDbAdd){
    $this->load->model('insert_data_this_function_mod');
    $queryStatus = $this->insert_data_this_function_mod->insert($dataDbAdd, __FUNCTION__);
    
    if($queryStatus){
      redirect("/authentication/login/", 'location');
    }
  }

}