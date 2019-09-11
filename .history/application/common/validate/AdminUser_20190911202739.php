<?php

namespace app\common\validate;

use think\Validagte;

class AdminUser extends Validate {

  protected $rule = [
    'username' => ''
  ]
}