<?php if (!defined('BASEPATH')) exit('Нет доступа к скрипту'); 

class Validation_data_authentication extends Welcome {
  public $ci;

  function __construct(){
    $this->ci =& get_instance();
  }

  function getCorrectData(){

    if(!execute_trim_empty_form($_POST)) return "empty_data";

    if( !is_array($this->emailPasswordIncorrect()) ) return "email_password_incorrect";

    return true;
  }

  function emailPasswordIncorrect(){
    $dataWhereArr['password'] = md5($_POST['email'].$_POST['password']);

    $this->ci->userIdHash = $this->ci->select_models->select_one_row_where_column_selectcolumn_result_array($dataWhereArr, 'user_id, hash', 'users');

    return $this->ci->userIdHash;
  }

}