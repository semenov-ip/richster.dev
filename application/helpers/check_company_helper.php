<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

  /**
   * check_user - проверяет пользователя
  */
  if(!function_exists('check_company')){

    function check_company($session_data){
      if( !empty($session_data) ){
        $data_where = array(
          'id' => $session_data['id'],
          'name' => $session_data['name']
        );

        $like = array(
          'password' => $session_data['pass']
        );
      
        $CI =& get_instance();
        $CI->load->model('check_user/check_user_mod');
        $result = $CI->check_user_mod->check_user_m($data_where, $like);

        return $result;
      }
      return false;
    }
  }