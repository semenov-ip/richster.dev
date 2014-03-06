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
    $this->load->library('check_users_access');
    $this->who = $this->check_users_access->checkUsers();
  }

  public function index(){
    $this->load->library('get_total_summ');
    $this->load->model('extract_data');
    $this->load->model('select_models');
    $this->load->model('order_mod/extract_order_all');

    $companyDataCurrent = $this->session->userdata('users');

    $data['user'] = $this->rich_users($companyDataCurrent['user_id']);

    $data['order'] = $this->rich_order($companyDataCurrent['user_id']);

    $data['header'] = $this->headerArr;

    $data['totalSumm'] = $this->get_total_summ->getSumm(array('user_id' => $companyDataCurrent['user_id']), 'count_money', 'account');

    $this->load->view('company/shop_order_tpl', $data);
  }

  function rich_users($user_id){
    $whereDataArr = array(
      'user_id' => $user_id
    );

    return $this->extract_data->extract_where_one($whereDataArr, __FUNCTION__);
  }

  function rich_order($currentCompanyId){
    $whereDataArr = array(
      'ro.company_id' => $currentCompanyId
    );

    return $this->extract_order_all->extract_where_order_all($whereDataArr, __FUNCTION__, 20);
  }
}