<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_account_user extends CI_Controller {
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

    $data['account_type'] = $this->rich_account_type();

    $this->addNewAccount($userDataCurrentAccunt['user_id']);

    $data['header'] = $this->headerArr;

    $this->load->view('add_account_user_tpl', $data);
  }

  function rich_users($user_id){
    $this->load->model('extract_data');
    $whereDataArr = array(
      'user_id' => $user_id
    );
    
    return $this->extract_data->extract_where_one($whereDataArr, __FUNCTION__);
  }

  function rich_account_type(){
    
    $this->load->model('extract_data');
    
    return $this->extract_data->extract_all_data(__FUNCTION__);
  }

  function addNewAccount($currentUserId){
    if(!empty($_POST)){
      foreach ($_POST as $key => $value) {
        $_POST[$key] = trim($value);
        if( empty($_POST[$key]) ){
          return false;
        }
      }

      $_POST['user_id'] = $currentUserId;
      $this->rich_account_user($_POST);
    }

    return false;
  }

  function rich_account_user($dataDbAdd){
    $this->load->model('insert_data_this_function_mod');
    $queryStatus = $this->insert_data_this_function_mod->insert($dataDbAdd, __FUNCTION__);
    
    if($queryStatus){
      redirect("/", 'location');
    }
  }
}




