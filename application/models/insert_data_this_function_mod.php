<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
class Insert_data_this_function_mod extends CI_Model{
  
  function __construct(){
      parent::__construct();
  }

  function insert($dataDbAdd, $dbNameFunction){
    if(is_array($dataDbAdd)){
      
      $this->db->insert($dbNameFunction, $dataDbAdd);
      
      return true;
    }
  }

  function insert_return_id($dataDbAdd, $dbNameFunction){
    if(is_array($dataDbAdd)){
      
      $this->db->insert($dbNameFunction, $dataDbAdd);
      
      return $this->db->insert_id();
    }
  }
}