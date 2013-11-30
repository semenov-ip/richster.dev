<?php
  /**
  * редирект, если пользовательне зашел под своим логином и паролем
  */
  if(!function_exists('company_authentication')){
      
    function company_authentication() {

      $CI =& get_instance();

      $CI->load->helper('check_company');
      
      if(!$CI->session->userdata('company')){

        $CI->session->sess_destroy();

        redirect("/authentication/login/", 'location');

      }
    }
  }
?>