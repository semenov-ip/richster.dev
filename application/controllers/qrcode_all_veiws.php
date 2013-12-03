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
    $this->load->helper('company_authentication');
    company_authentication();
  }

  public function index(){
    $companyDataCurrent = $this->session->userdata('company');

    $data['qrcode'] = $this->rich_qrcode($companyDataCurrent['company_id']);

    $data['header'] = $this->headerArr;

    $this->load->view('qrcode_view_all', $data);
  }

  function rich_qrcode($company_id){
    $this->load->model('extract_data');
    $whereDataArr = array(
      'company_id' => $company_id
    );
    
    return $this->extract_data->extract_where_all($whereDataArr, __FUNCTION__);
  }
}