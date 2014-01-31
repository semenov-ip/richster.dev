<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qrcode_generator extends CI_Controller {
  private $headerArr;

  public $errorCorrectionLevel;

  public $matrixPointSize;

  function __construct(){
    parent::__construct();

    $this->load->helper('css_js_helper');

    $this->headerArr = array(
      'css' => css_js_helper('css'),
      'js' => css_js_helper('js')
    );

    $this->errorCorrectionLevel = 'L';

    $this->matrixPointSize = 4;

    // Если пользователь не зашел на сайт
    $this->load->library('check_users_access');
    $this->who = $this->check_users_access->checkUsers();
  }

  public function index($currentShopId){

    $companyDataCurrent = $this->session->userdata('users');

    $this->qrcodeGeneratePages($companyDataCurrent['user_id'], $currentShopId);

    $data['header'] = $this->headerArr;

    $this->load->view('company/qrcode_generator_tpl', $data);
  }

  function qrcodeGeneratePages($currentCompanyId, $currentShopId){
    $this->load->helper('phpqrcode/qrlib');

    $PNG_TEMP_DIR = './qrcode_img/';

    $PNG_WEB_DIR = 'qrcode_img/';

    $filename = $PNG_TEMP_DIR.time().'_'.$currentCompanyId.'_'.$currentShopId.'_qrcode.png';

    $dataPostFormQrJson = $this->extratcPostDataFormJson($currentCompanyId, $currentShopId);

    if(!$dataPostFormQrJson){ return false; }

    QRcode::png($dataPostFormQrJson, $filename, $this->errorCorrectionLevel, $this->matrixPointSize, 2);
    
    $idQrCurrentCode = $this->dbSaveImgQrCode($PNG_WEB_DIR.basename($filename), $dataPostFormQrJson);

    if($idQrCurrentCode){
      redirect("/company/qrcode_generator/view/$idQrCurrentCode/", 'location');
    }
  }

  function extratcPostDataFormJson($currentCompanyId, $currentShopId){
    if(!empty($_POST)){
      foreach ($_POST as $key => $value) {
        $_POST[$key] = trim($value);
        if( empty($_POST[$key]) ){
          return false;
        }
      }

      $this->matrixPointSize = $_POST['size'];
      unset($_POST['size']);

      $_POST['shop_id'] = $currentShopId;

      $_POST['company_id'] = "$currentCompanyId";

      return json_encode($_POST);

    }

    return false;
  }

  function dbSaveImgQrCode($img, $jsonDataForm){
    $dataForm = json_decode($jsonDataForm);

    foreach ($dataForm as $key => $value) {      
      
      $dataClearForm[$key] = trim($value);

    }

    $dataClearForm['qrcode_img'] = $img;

    $dataClearForm['data_add'] = time();

    $dataClearForm['user_id'] = $dataClearForm['company_id'];

    unset($dataClearForm['company_id']);

    return $this->rich_qrcode($dataClearForm);
  }

  function rich_qrcode($dataDbAdd){
    
    $this->load->model('insert_data_this_function_mod');
    
    return $this->insert_data_this_function_mod->insert_return_id($dataDbAdd, __FUNCTION__);
  }

  function view($idQrCurrentCode){
    $this->load->model('extract_data');
    $whereDataArr = array(
      'qrcode_id' => $idQrCurrentCode
    );
    
    $data['qrcode'] = $this->extract_data->extract_where_one($whereDataArr, 'rich_qrcode');
    
    $data['header'] = $this->headerArr;

    $this->load->view('company/qrcode_view_tpl', $data);

  }
}