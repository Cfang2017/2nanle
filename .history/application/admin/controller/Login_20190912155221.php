<?php 
namespace app\login\controller;

use think\Controller;

class Index  extends Controller
{
  public function login()
  {
    return $this->fetch();
  }

  
}