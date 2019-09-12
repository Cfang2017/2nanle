<?php

namespace app\common\model;

use think\Model;

class AdminUser extends Model{

 public function add($data){
   $this->allowFiled(true)->save($data);

   return $this->id;
 }
}