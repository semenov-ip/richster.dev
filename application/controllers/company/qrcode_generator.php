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
    $this->load->library('get_total_summ');
    $this->load->model('extract_data');
    $this->load->model('select_models');

    $companyDataCurrent = $this->session->userdata('users');

    $data['user'] = $this->rich_users($companyDataCurrent['user_id']);

    $shopDataObj = $this->getShopDataObj($currentShopId);

    $this->qrcodeGeneratePages($companyDataCurrent['user_id'], $shopDataObj);

    $data['totalSumm'] = $this->get_total_summ->getSumm(array('user_id' => $companyDataCurrent['user_id']), 'count_money', 'account');

    $data['header'] = $this->headerArr;

    $this->load->view('company/qrcode_generator_tpl', $data);
  }

  function rich_users($user_id){
    $whereDataArr = array(
      'user_id' => $user_id
    );

    return $this->extract_data->extract_where_one($whereDataArr, __FUNCTION__);
  }

  function getShopDataObj($currentShopId){
    return $this->select_models->select_one_row_where_column_selectcolumn( array('shop_id' => $currentShopId), 'shop_id, shop_name', 'company_shop');
  }

  function qrcodeGeneratePages($currentCompanyId, $shopDataObj){
    $this->load->helper('phpqrcode/qrlib');

    $PNG_TEMP_DIR = './qrcode_img/';

    $PNG_WEB_DIR = 'qrcode_img/';

    $filename = $PNG_TEMP_DIR.time().'_'.$currentCompanyId.'_'.$shopDataObj->shop_id.'_qrcode.png';

    $dataPostFormQrJson = $this->extratcPostDataFormJson($currentCompanyId, $shopDataObj);

    if(!$dataPostFormQrJson){ return false; }

    QRcode::png($dataPostFormQrJson, $filename, $this->errorCorrectionLevel, $this->matrixPointSize, 2);

    $idQrCurrentCode = $this->dbSaveImgQrCode($PNG_WEB_DIR.basename($filename), $dataPostFormQrJson);

    if($idQrCurrentCode){
      redirect("/company/qrcode_generator/view/$idQrCurrentCode/", 'location');
    }
  }

  function extratcPostDataFormJson($currentCompanyId, $shopDataObj){
    if(!empty($_POST)){
      foreach ($_POST as $key => $value) {
        $_POST[$key] = trim($value);
        if( empty($_POST[$key]) ){
          return false;
        }
      }

      $this->matrixPointSize = $_POST['size'];
      unset($_POST['size']);

      $_POST['shop_id'] = $shopDataObj->shop_id;

      $_POST['shop_name'] = $shopDataObj->shop_name;

      $_POST['company_id'] = "$currentCompanyId";

      return json_encode($_POST);

    }

    return false;
  }

  function dbSaveImgQrCode($img, $jsonDataForm){
    $dataForm = json_decode($jsonDataForm);

    unset($dataForm->shop_name);

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
    $this->load->library('get_total_summ');
    $this->load->model('extract_data');
    $this->load->model('select_models');

    $whereDataArr = array(
      'qrcode_id' => $idQrCurrentCode
    );

    $data['qrcode'] = $this->extract_data->extract_where_one($whereDataArr, 'rich_qrcode');

    $companyDataCurrent = $this->session->userdata('users');

    $data['user'] = $this->rich_users($companyDataCurrent['user_id']);

    $data['totalSumm'] = $this->get_total_summ->getSumm(array('user_id' => $companyDataCurrent['user_id']), 'count_money', 'account');

    $data['header'] = $this->headerArr;

    $this->load->view('company/qrcode_view_tpl', $data);

  }
}