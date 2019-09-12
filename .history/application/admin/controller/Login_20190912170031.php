<?php 
namespace app\admin\controller;

use think\Controller;

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
        }else{
          $this->success('验证码正确')
        }
    }else{
      $this->error('请求不合法')
    }
  }
 
}