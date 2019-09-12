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
        // if(!captcha_check($data['code'])){
        //   $this->error('验证码不正确');
        // }

        try{
          //username username+password
        $user = model('AdminUser')->get(['username' => $data['username']]);
        if(!$user || $user->status != 1){
          $this->eroor('该用户不存在');
        }


        if(IAuth::setPassword($data['password']) != $user['password']){
          $this->error('密码不正确');
        }
        // halt($user);
        // 1 登录成功后 更新数据库  时间与ip 
        $udata = [
          'last_login_time' => time(),
          'last_login_ip' => request()->ip(),
        ];
        model('AdminUser')->save($udata,['id' => $user->id]);
        // 2 session 保存
      }catch(\Exception $e){
        $this->error($e -> getMessage());
      }

      session('adminuser',$user,'imooc_app_scope');
      $this->success('登录成功','index/index');
        
    }else{
      $this->error('请求不合法');
    }
  }
 
}