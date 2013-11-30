<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

  /**
   * check_user - проверяет пользователя
  */
  if(!function_exists('check_user_redirect_url')){

    function check_user_redirect_url(){
      $CI =& get_instance();

      if($CI->session->userdata('user')){
        return redirect( "/", 'location' );
      }

      return false;
    }
  }