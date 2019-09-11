<?php

namespace app\common\validate;

use think\Validagte;

class AdminUser extends Validate {

  protected $rule = [
    'username' => 'require|max:20',
    'pasword' => 'require|max:20'
  ]
}