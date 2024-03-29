<?php
namespace app\admin\controller;

use think\Controller;

class Base extends Controller
{
  //初始化方法
  public function _initializ(){
    //判断用户是否登录
    $isLogin = $this->isLogin();
    if($isLogin){
      return $this->redirect('login/index');
    }
  }

  // 判断是否登录
  public function isLogin(){
    
    $user = session(config('admin.sesson_user'),'',config('admin.session_user_scope'));
    if($user && $user->id){
      return true;
    }
    return false;
  }


}