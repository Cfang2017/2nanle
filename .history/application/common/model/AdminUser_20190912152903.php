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
  if(!in_array($data)){
    exception('传递数据不合法');
  }

   $this->allowFiled(true)->save($data);

   return $this->id;
 }
}