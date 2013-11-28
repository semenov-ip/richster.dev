<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

  /**
   * check_user - проверяет пользователя
   * !сделать библиотеку
  */
  if(!function_exists('css_js_helper')){
    
    function css_js_helper($typeFile){
      $cssFileArr = scandir("$typeFile/");
      
      foreach ($cssFileArr as $key => $value) {
        if( preg_match("/.$typeFile/si", $value) ){
          $cssHeaderArr[] = $value;
        }
      }
      
      return $cssHeaderArr;
    }
  }