<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
class Extract_data extends CI_Model{
  
  function __construct(){
      parent::__construct();
  }

  function extract_where_one($whereDataArr, $dbNameFunction){
    if(is_array($whereDataArr)){
      $this->db->where($whereDataArr);

      $query = $this->db->get($dbNameFunction);
      
      if($query->num_rows() == 1){
        foreach ($query->result() as $row) {
          return $row;
        }
      }
      
      return false;
    }
  }

  function extract_where_all($whereDataArr, $dbNameFunction){
    if(is_array($whereDataArr)){
      $this->db->where($whereDataArr);

      $query = $this->db->get($dbNameFunction);
      
      if($query->num_rows() > 0){
        foreach ($query->result() as $row) {
          $dataAllCurrentTable[] = $row;
        }

        return $dataAllCurrentTable;
      }
      
      return false;
    }
  }

  function extract_where_limit_asc($whereDataArr, $dbNameFunction, $countAscName){
    if(is_array($whereDataArr)){
      
      $this->db->limit(1);

      $this->db->order_by($countAscName, "asc");

      $this->db->where($whereDataArr);

      $query = $this->db->get($dbNameFunction);

      if($query->num_rows() == 1){
        foreach ($query->result() as $row) {
          return $row;
        }

        return $dataAllCurrentTable;
      }
      
      return false;
    }
  }

  function extract_all_data($dbNameFunction){
    
    $query = $this->db->get($dbNameFunction);

    if($query->num_rows() > 0){
      foreach ($query->result() as $row) {
        $dataAllCurrentTable[] = $row;
      }

      return $dataAllCurrentTable;
    }

    return false;
  }
}