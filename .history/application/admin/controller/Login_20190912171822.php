<?php 
namespace app\admin\controller;

use think\Controller;
use app\common\lib\IAuth;

class Login  extends Controller
{
  public function index()
  {
    return $this->fetch();
  }

  public function check(){
    if(request()-> isPost()){
        $data = input('post.');
        if(!captcha_check($data['code'])){
          $this->error('验证码不正确');
        }

          //username username+password
        $user = model('AdminUser')->get(['username' => $data['username']]);
        if(!$user || $user->status != 1){
          $this->eroor('该用户不存在');
        }


        if(IAuth:setPassword($user['password']) != $user['password']){
          $this->erorr('密码不正确');
        }
        halt($user);
        
    }else{
      $this->error('请求不合法');
    }
  }
 
}