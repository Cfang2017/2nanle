<?php 
namespace app\admin\controller;

use think\Controller;

class lOGIN  extends Controller
{
  public function index()
  {
    // return '123123';
    return $this->fetch();
  }

  public function welcome()
  {
    return "hello api-admin";
  }
}