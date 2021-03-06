<?php if (!defined('BASEPATH')) exit('Нет доступа к скрипту'); 

class Check_users_access {
  public $ci;

  function __construct(){
    $this->ci =& get_instance();
  }

  function checkUsers(){
    $this->ci->load->helper('extract_key_this_array');
    $this->ci->load->model('select_models');

    $this->checkEmptyUserSession();

    $permissionUserWho = $this->executeActionOverUserReturnWho($this->checkHashUserInDb());

    $permissionDirArr = $this->$permissionUserWho();

    $currentDir = $this->currentDirExtract();

    if( array_search($currentDir, $permissionDirArr) === false ){
      return $this->sendUserDistributor();
    }

    return $permissionUserWho;
  }

  function checkEmptyUserSession(){
    if( !extract_key_this_array($this->ci->session->userdata('users'), 'hash') ){ return $this->sendUserDistributor(); }

    if( !extract_key_this_array($this->ci->session->userdata('users'), 'user_id') ){ return $this->sendUserDistributor(); }
  }

  function checkHashUserInDb(){
    $dataWhereArr['hash'] = extract_key_this_array($this->ci->session->userdata('users'), 'hash');

    return $this->ci->select_models->select_one_row_where_column_selectcolumn($dataWhereArr, 'type_user', 'users');
  }

  function executeActionOverUserReturnWho($dataUserWho){
    if( !is_object($dataUserWho) ){ return $this->sendUserDistributor(); }

    return $dataUserWho->type_user;
  }

  function currentDirExtract(){
    $currentUrl = explode( "/", $_SERVER['REQUEST_URI'] );

    return $currentUrl[1];
  }

  function sendUserDistributor(){
    redirect( "/_shared/user_distributor/", 'location');
  }

  function users(){
    return array(
      'users'
    );
  }

  function company(){
    return array(
      'company'
    );
  }
}