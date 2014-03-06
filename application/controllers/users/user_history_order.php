<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_history_order extends CI_Controller {
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
    $this->load->model('select_models');

    $userDataCurrentAccunt = $this->session->userdata('users');

    $data['user'] = $this->rich_users($userDataCurrentAccunt['user_id']);

    $data['account_user'] = $this->rich_account($userDataCurrentAccunt['user_id']);

    $data['history_order'] = $this->rich_order($userDataCurrentAccunt['user_id']);

    $data['header'] = $this->headerArr;

    $data['totalSumm'] = $this->get_total_summ->getSumm(array('user_id' => $userDataCurrentAccunt['user_id']), 'count_money', 'account');

    $this->load->view('users/user_history_order_tpl', $data);
  }

  function rich_users($user_id){
    $this->load->model('extract_data');
    $whereDataArr = array(
      'user_id' => $user_id
    );

    return $this->extract_data->extract_where_one($whereDataArr, __FUNCTION__);
  }

  function rich_account($user_id){
    $this->load->model('extract_data');

    $whereDataArr = array(
      'user_id' => $user_id
    );

    return $this->extract_data->extract_where_all($whereDataArr, __FUNCTION__);
  }

  function rich_order($userId){
    $this->load->model('extract_data');

    $whereDataArr = array(
      'ro.user_id' => $userId
    );

    return $this->dataCheckAndUpgrade($this->extract_data->extract_where_all_join_order($whereDataArr, __FUNCTION__." ro", 10));
  }

  function dataCheckAndUpgrade($historyOrder){
    if( is_array( $historyOrder ) ){

      foreach ($historyOrder as $key => $curentHistoryOrder) {

        $curentHistoryOrder->data_add = date2str($curentHistoryOrder->data_add);

      }

      return $historyOrder;
    }
  }
}