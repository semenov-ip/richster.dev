<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop_order extends CI_Controller{
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

    $data['order'] = $this->rich_order($companyDataCurrent['company_id']);

    $data['header'] = $this->headerArr;

    $this->load->view('shop_order_tpl', $data);
  }

  function rich_order($currentCompanyId){
    $this->load->model('order_mod/extract_order_all');
    $whereDataArr = array(
      'ro.company_id' => $currentCompanyId
    );

    return $this->extract_order_all->extract_where_order_all($whereDataArr, __FUNCTION__);
  }
}