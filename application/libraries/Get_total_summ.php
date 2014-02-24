<?php if (!defined('BASEPATH')) exit('Нет доступа к скрипту'); 

class Get_total_summ {
  public $ci;

  function __construct(){
    $this->ci =& get_instance();
  }

  function getSumm($dataWhereArr, $select_sum, $dbTableName){

    $data = $this->ci->select_models->select_data_summ($dataWhereArr, $select_sum, $dbTableName);

    return $data[$select_sum];
  }
}