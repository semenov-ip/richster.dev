<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Select_models extends CI_Model{

    protected $prefixes;

    function __construct(){

      parent::__construct();

      $this->prefixes = $this->config->item('prefixes');
    }

    function select_one_row_where_column($dataWhereArr, $dbTableName){

      if(is_array($dataWhereArr)){

        $this->db->where($dataWhereArr);

        $query = $this->db->get($this->prefixes.$dbTableName);

        if($query->num_rows() == 1){

          foreach ($query->result() as $row) {

            return $row;
          }

        }

      }

      return false;
    }

    function select_one_row_where_column_selectcolumn($dataWhereArr, $selectcolumn, $dbTableName){
      if(is_array($dataWhereArr)){

        $this->db->select($selectcolumn);

        $this->db->where($dataWhereArr);

        $query = $this->db->get($this->prefixes.$dbTableName);

        if($query->num_rows() == 1){

          foreach ($query->result() as $row) {

            return $row;
          }

        }

      }

      return false;
    }

    function select_all_row_where_column($dataWhereArr, $dbTableName){

      if(is_array($dataWhereArr)){

        $this->db->where($dataWhereArr);

        $query = $this->db->get($this->prefixes.$dbTableName);

        if($query->num_rows() > 0){

          foreach ($query->result() as $row) {

            $dataQuery[] = $row;
          }

        }

        return $dataQuery;
      }

      return false;
    }

    function select_all_row_where_column_selectcolumn($dataWhereArr, $selectcolumn, $dbTableName){

      if(is_array($dataWhereArr)){

        $this->db->select($selectcolumn);

        $this->db->where($dataWhereArr);

        $query = $this->db->get($this->prefixes.$dbTableName);

        if($query->num_rows() > 0){

          foreach ($query->result() as $row) {

            $dataQuery[] = $row;
          }

        }

        return $dataQuery;
      }

      return false;
    }

    function select_one_row_where_column_selectcolumn_join($dataWhereArr, $leftjoin, $equalityjoin, $selectcolumn, $dbTableName){
      if(is_array($dataWhereArr)){

        $this->db->select($selectcolumn);

        $this->db->join($this->prefixes.$leftjoin, $equalityjoin);

        $this->db->where($dataWhereArr);

        $query = $this->db->get($this->prefixes.$dbTableName);

        if($query->num_rows() > 0){

          foreach ($query->result() as $row) {

            return $row;
            
          }
        }
      }

      return false;
    }

    function select_data_summ($dataWhereArr, $select_sum, $dbTableName){
      if( is_array($dataWhereArr) ){

        $this->db->select_sum($select_sum);

        $this->db->where($dataWhereArr);

        $query = $this->db->get($this->prefixes.$dbTableName);

        if($query->num_rows() > 0){

          foreach ($query->result_array() as $row) {

            foreach ($row as $key => $value) { if(is_null($row[$key])){ $row[$key] = "0"; } }

            return $row;
          }
        }
      }

      return false;
    }

  }

?>