<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
class Extract_order_all extends CI_Model{
  
  function __construct(){
    parent::__construct();
  }

  function extract_where_order_all($whereDataArr, $dbNameFunction){
    if(is_array($whereDataArr)){
      
      $this->db->select('ro.order_id, ro.order_num, ro.shop_id, ro.user_id, ro.amount, ros.status_name, rds.description_status_name, ru.name, rcs.shop_name, ru.phone');
      $this->db->from($dbNameFunction." ro");

      $this->db->where($whereDataArr);

      $this->db->join("rich_order_status ros", "ros.status_id = ro.status_id");
      $this->db->join("rich_description_status rds", "rds.description_status_id = ro.description_status_id");
      $this->db->join("rich_users ru", "ru.user_id = ro.user_id");
      $this->db->join("rich_company_shop rcs", "rcs.shop_id = ro.shop_id");

      $query = $this->db->get();
      
      if($query->num_rows() > 0){
      
        foreach ($query->result() as $row) {
          $dataAllCurrentTable[] = $row;
        }

        return $dataAllCurrentTable;
      }
      
      return false;
    }
  }
}