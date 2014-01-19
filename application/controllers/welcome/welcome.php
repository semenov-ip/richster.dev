<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
class Welcome extends CI_Controller{
  private $headerArr;

  function __construct(){

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

    echo 111;
  }
}