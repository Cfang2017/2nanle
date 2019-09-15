<?php

namespace app\common\model;

use think\Model;

class AdminUser extends Model{

  /**
   * 新增
   *
   * @param [type] $data
   * @return void
   */
 public function add($data){
   $this->allowFiled(true)->save($data);

   return $this->id;
 }
}