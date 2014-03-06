<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qrcode_all_veiws extends CI_Controller {
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

    $data['qrcode'] = $this->rich_qrcode($companyDataCurrent['user_id']);

    $data['totalSumm'] = $this->get_total_summ->getSumm(array('user_id' => $companyDataCurrent['user_id']), 'count_money', 'account');

    $data['header'] = $this->headerArr;

    $this->load->view('company/qrcode_view_all', $data);
  }

  function rich_users($user_id){
    $whereDataArr = array(
      'user_id' => $user_id
    );

    return $this->extract_data->extract_where_one($whereDataArr, __FUNCTION__);
  }

  function rich_qrcode($company_id){
    $this->load->model('extract_data');
    $whereDataArr = array(
      'user_id' => $company_id
    );
    
    return $this->extract_data->extract_where_all($whereDataArr, __FUNCTION__);
  }
}