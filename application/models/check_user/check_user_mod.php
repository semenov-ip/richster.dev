<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
  class Check_user_mod extends CI_Model{
    protected $table_user;
    
    function __construct(){
      parent::__construct();
      $this->table_user = "rich_users";
    }
    
    // Проверка пользователя
    function checkData($dataUserLogin, $dbTableName, $select){
      if( !empty($dataUserLogin) ){
        
        $this->db->select($select);
        
        $this->db->where($dataUserLogin);
        
        $query = $this->db->get( $dbTableName );
        
        if( $query->num_rows() == 1 ){
          foreach( $query->result_array() as $row ){
            return $row;
          }
        }
      }
      return false;
    }
    
    // Проверка пользователя
    function check_user_m($data_where, $like){
      $result=0;
      
      if(is_array($data_where)){
        $this->db->where($data_where);
        $this->db->like($like);
        $query = $this->db->get($this->table_user);
        if($query->num_rows() > 0){
          $result = 1;
        }
      }
      return $result;
    }
  }