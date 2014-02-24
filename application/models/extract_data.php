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

    }

    return false;
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

  function extract_where_all_join_order($whereDataArr, $dbNameFunction, $limit=false){
    if(is_array($whereDataArr)){

      $this->db->select('ro.order_id, ro.order_num, ro.amount, ro.data_add, ros.status_name, rds.description_status_name, rq.description, rcs.shop_name');

      if($limit){ $this->db->limit($limit); }

      $this->db->where($whereDataArr);

      $this->db->join('rich_order_status ros', 'ro.status_id = ros.status_id');
      $this->db->join('rich_description_status rds', 'ro.description_status_id = rds.description_status_id');
      $this->db->join('rich_qrcode rq', 'ro.order_num = rq.order_num');
      $this->db->join('rich_company_shop rcs', 'ro.shop_id = rcs.shop_id');

      $query = $this->db->get($dbNameFunction);

      if($query->num_rows() > 0){
        foreach ($query->result() as $row) {
          $dataAllCurrentTable[] = $row;
        }

        return $dataAllCurrentTable;
      }

    }

    return false;
  }
}