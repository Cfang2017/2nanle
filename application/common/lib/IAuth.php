<?php
namespace app\common\lib;

class IAuth{

  /**
   * Undocumented function
   *
   * @param [type] $data
   * @return String
   */
  public static function setPassword($data){
    return md5($data.config('app.password_pre_halt'));
  }

}