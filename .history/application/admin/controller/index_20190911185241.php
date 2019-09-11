<?php 
namespace app\admin\controller;

use think\Controller;

class Index extends Controller{
  
  public function index(){
    return $this->fetch();
  }

  public funciton welcome(){
    return "hello api-admin"
  }
}