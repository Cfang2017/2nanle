<?php 
namespace app\login\controller;

use think\Controller;

class Index  extends Controller
{
  public function login()
  {
    // return '123123';
    return $this->fetch();
  }

  
}