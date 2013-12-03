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
    $this->load->helper('company_authentication');
    company_authentication();
  }

  public function index(){
    $companyDataCurrent = $this->session->userdata('company');

    $this->addNewShop($companyDataCurrent['company_id']);

    $data['header'] = $this->headerArr;

    $this->load->view('add_shop_tpl', $data);
  }

  function addNewShop($currentCompanyId){
    if(!empty($_POST)){
      foreach ($_POST as $key => $value) {
        $_POST[$key] = trim($value);
        if( empty($_POST[$key]) ){
          return false;
        }
      }

      $_POST['company_id'] = $currentCompanyId;
      $this->rich_company_shop($_POST);
    }

    return false;
  }

  function rich_company_shop($dataDbAdd){
    $this->load->model('insert_data_this_function_mod');
    $queryStatus = $this->insert_data_this_function_mod->insert($dataDbAdd, __FUNCTION__);
    
    if($queryStatus){
      redirect("/company/", 'location');
    }
  }
}