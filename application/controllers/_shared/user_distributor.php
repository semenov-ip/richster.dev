<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_distributor extends CI_Controller{

  function __construct(){
    parent::__construct();
  }

  function index(){
    $this->load->helper('extract_key_this_array');
    $this->load->model('select_models');

    $dataUser = $this->checkUserHash();

    if( !$dataUser ) { return $this->registrationPag(); }

    $functionName =  $dataUser->type_user;

    $this->$functionName($dataUser);
  }

  function checkUserHash(){
    $whereHashData['hash'] = extract_key_this_array($this->session->userdata('users'), 'hash');

    return $this->select_models->select_one_row_where_column_selectcolumn($whereHashData, 'type_user', 'users');
  }

  function registrationPag(){
    redirect( "/", 'location');
  }

  function users($dataUser){
    redirect( "/".$dataUser->type_user."/user_settings/", 'location');
  }

  function company($dataUser){
    redirect( "/".$dataUser->type_user."/company_settings/", 'location');
  }
}