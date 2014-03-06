<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_shop extends CI_Controller {
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

    $this->addNewShop($companyDataCurrent['user_id']);

    $data['user'] = $this->rich_users($companyDataCurrent['user_id']);

    $data['totalSumm'] = $this->get_total_summ->getSumm(array('user_id' => $companyDataCurrent['user_id']), 'count_money', 'account');

    $data['header'] = $this->headerArr;

    $this->load->view('company/add_shop_tpl', $data);
  }

  function rich_users($user_id){
    $whereDataArr = array(
      'user_id' => $user_id
    );

    return $this->extract_data->extract_where_one($whereDataArr, __FUNCTION__);
  }


  function addNewShop($currentCompanyId){
    if(!empty($_POST)){
      foreach ($_POST as $key => $value) {
        $_POST[$key] = trim($value);
        if( empty($_POST[$key]) ){
          return false;
        }
      }

      $_POST['user_id'] = $currentCompanyId;
      $this->rich_company_shop($_POST);
    }

    return false;
  }

  function rich_company_shop($dataDbAdd){
    $this->load->model('insert_data_this_function_mod');
    $queryStatus = $this->insert_data_this_function_mod->insert($dataDbAdd, __FUNCTION__);
    
    if($queryStatus){
      redirect("/company/company_settings/", 'location');
    }
  }
}