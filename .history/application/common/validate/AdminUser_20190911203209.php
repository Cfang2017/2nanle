<?php

namespace app\common\validate;

use think\Validagte;

class AdminUser extends Validagte{

  protected $rule = [
    'username' => 'require|max:20',
    'password' => 'require|max:20'
  ];
}