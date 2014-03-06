<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
class Welcome extends CI_Controller {
  private $headerArr;

  public $userIdHash;

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
    $this->load->helper('execute_trim_empty_form');
    $this->load->helper('extract_key_this_array');
    $this->load->library('welcome/validation_data_authentication');
    $this->load->model('select_models');
    
    $data['error'] = extract_key_this_array( $this->config->item('error_message'), $this->getPostDataAuthentication() );

    $data['header'] = $this->headerArr;

    $this->load->view('welcome/welcome_tpl', $data);
  }

  function getPostDataAuthentication(){
    if(!empty($_POST)){

      $submitStatus = $this->validation_data_authentication->getCorrectData();

      if( $submitStatus !== true ){ return $submitStatus; }

      $this->successfullyAuthentication();

    }

    return false;
  }

  function successfullyAuthentication(){

    $this->session->set_userdata( array('users' => $this->userIdHash) );

    redirect( "/_shared/user_distributor/", 'location');
  }
}