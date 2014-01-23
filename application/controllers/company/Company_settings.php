<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_settings extends CI_Controller {
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
    $companyDataCurrent = $this->session->userdata('users');

    $data['account_company'] = $this->rich_account_company($companyDataCurrent['user_id']);

    $data['company_shop'] = $this->rich_company_shop($companyDataCurrent['user_id']);

    $data['header'] = $this->headerArr;

    $this->load->view('company/company_settings_tpl', $data);
  }

  function rich_account_company($user_id){
    $this->load->model('extract_data');
    $whereDataArr = array(
      'user_id' => $user_id
    );
    
    return $this->extract_data->extract_where_all($whereDataArr, __FUNCTION__);
  }

  function rich_company_shop($user_id){
    $this->load->model('extract_data');

    $whereDataArr = array(
      'user_id' => $user_id
    );
    
    return $this->extract_data->extract_where_all($whereDataArr, __FUNCTION__);
  }
}