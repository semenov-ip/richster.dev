<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
class Update_data_this_function_mod extends CI_Model{
  
  function __construct(){
      parent::__construct();
  }

  function update_where_id($dataDbUpdate, $whereDataArr, $dbNameFunction){
    if(is_array($dataDbUpdate)){
      
      $this->db->where($whereDataArr);
      
      $query = $this->db->update($dbNameFunction, $dataDbUpdate); 

      return $query;
    }

    return false;
  }
}