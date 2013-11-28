<?php
  /**
  * редирект, если пользовательне зашел под своим логином и паролем
  */
  if(!function_exists('user_authentication')){
      
    function user_authentication() {

      $CI =& get_instance();

      $CI->load->helper('check_user');
      
      if(!$CI->session->userdata('user') && !check_user($CI->session->userdata('user'))){

        $CI->session->sess_destroy();

        redirect($CI->config->item('base_url')."authentication/login/", 'location');

      }
    }
  }
?>