<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

  /**
   * check_user - проверяет пользователя
  */
  if(!function_exists('check_company_redirect_url')){

    function check_company_redirect_url(){
      $CI =& get_instance();

      if($CI->session->userdata('company')){
        return redirect( "/", 'location' );
      }

      return false;
    }
  }