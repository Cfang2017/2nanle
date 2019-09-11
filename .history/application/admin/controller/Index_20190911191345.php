<?php 
namespace app\admin1\controller;

use think\Controller;

class Index  extends Controller;
{
  public function index()
  {
    return $this->fetch();
  }

  public function welcome()
  {
    return "hello api-admin"
  }
}
 
 
 
