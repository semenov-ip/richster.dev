<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends CI_Controller {
  private $headerArr;

  function __construct(){
    parent::__construct();
    
    $this->load->helper('css_js_helper');

    $this->headerArr = array(
      'css' => css_js_helper('css'),
      'js' => css_js_helper('js')
    );
    
    // Если пользователь не зашел на сайт
    $this->load->helper('company_authentication');
    company_authentication();
  }

  public function index(){
    $companyDataCurrent = $this->session->userdata('company');

    $data['account_company'] = $this->rich_account_company($companyDataCurrent['company_id']);

    $data['company_shop'] = $this->rich_company_shop($companyDataCurrent['company_id']);

    $data['header'] = $this->headerArr;

    $this->load->view('company_tpl', $data);
  }

  function rich_account_company($company_id){
    $this->load->model('extract_data');
    $whereDataArr = array(
      'company_id' => $company_id
    );
    
    return $this->extract_data->extract_where_all($whereDataArr, __FUNCTION__);
  }

  function rich_company_shop($currentCompanyId){
    $this->load->model('extract_data');

    $whereDataArr = array(
      'company_id' => $currentCompanyId
    );
    
    return $this->extract_data->extract_where_all($whereDataArr, __FUNCTION__);
  }
}