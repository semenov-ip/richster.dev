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
    $this->load->library('get_total_summ');
    $this->load->model('extract_data');
    $this->load->model('select_models');

    $companyDataCurrent = $this->session->userdata('users');

    $data['user'] = $this->rich_users($companyDataCurrent['user_id']);

    $data['account_company'] = $this->rich_account_company($companyDataCurrent['user_id']);

    $data['company_shop'] = $this->rich_company_shop($companyDataCurrent['user_id']);

    $data['header'] = $this->headerArr;

    $data['totalSumm'] = $this->get_total_summ->getSumm(array('user_id' => $companyDataCurrent['user_id']), 'account_company_balance', 'account_company');

    $this->load->view('company/company_settings_tpl', $data);
  }

  function rich_users($user_id){
    $whereDataArr = array(
      'user_id' => $user_id
    );

    return $this->extract_data->extract_where_one($whereDataArr, __FUNCTION__);
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