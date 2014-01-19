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
    $this->load->helper('user_authentication');
    user_authentication();
  }

  public function index(){
    $userDataCurrentAccunt = $this->session->userdata('user');

    $data['user'] = $this->rich_users($userDataCurrentAccunt['user_id']);

    $data['account_user'] = $this->rich_account_user($userDataCurrentAccunt['user_id']);

    $data['history_order'] = $this->rich_order($userDataCurrentAccunt['user_id']);

    $data['header'] = $this->headerArr;

    $this->load->view('user_tpl', $data);
  }

  function rich_users($user_id){
    $this->load->model('extract_data');
    $whereDataArr = array(
      'user_id' => $user_id
    );
    
    return $this->extract_data->extract_where_one($whereDataArr, __FUNCTION__);
  }

  function rich_account_user($user_id){
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

    return $this->extract_data->extract_where_all_join_order($whereDataArr, __FUNCTION__." ro", 5);
  }
}