<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_settings extends CI_Controller {
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
    $this->load->helper('date2str');
    $this->load->library('get_total_summ');
    $this->load->model('extract_data');
    $this->load->model('select_models');

    $userDataCurrentAccunt = $this->session->userdata('users');

    $data['user'] = $this->rich_users($userDataCurrentAccunt['user_id']);

    $data['account_user'] = $this->rich_account_users($userDataCurrentAccunt['user_id']);

    $data['history_order'] = $this->rich_order($userDataCurrentAccunt['user_id']);

    $data['header'] = $this->headerArr;

    $data['totalSumm'] = $this->get_total_summ->getSumm(array('user_id' => $userDataCurrentAccunt['user_id']), 'account_balance', 'account_users');

    $this->load->view('users/user_settings_tpl', $data);
  }

  function rich_users($user_id){
    $whereDataArr = array(
      'user_id' => $user_id
    );

    return $this->extract_data->extract_where_one($whereDataArr, __FUNCTION__);
  }

  function rich_account_users($user_id){
    $whereDataArr = array (
      'user_id' => $user_id
    );

    return $this->extract_data->extract_where_all($whereDataArr, __FUNCTION__);
  }

  function rich_order($userId){
    $whereDataArr = array(

      'ro.user_id' => $userId

    );

    return $this->dataCheckAndUpgrade($this->extract_data->extract_where_all_join_order($whereDataArr, __FUNCTION__." ro", 5));
  }

  function dataCheckAndUpgrade( $historyOrder ){
    if( is_array( $historyOrder ) ){

      foreach ($historyOrder as $key => $curentHistoryOrder) {

        $curentHistoryOrder->data_add = date2str($curentHistoryOrder->data_add);

      }

      return $historyOrder;
    }
  }
}