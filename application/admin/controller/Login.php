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
        }catch(\Exception $e){
          $this->error($e -> getMessage());
        }
        if(!$user || $user->status != 1){
          $this->error('该用户不存在');
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
      try{
        model('AdminUser')->save($udata,['id' => $user->id]);
        // 2 session 保存
      }catch(\Exception $e){
        $this->error($e -> getMessage());
      }
      
      // session(config('admin.session_user'),'',config('admin.session_user_scope'));读取
      session(config('admin.session_user'),$user,config('admin.session_user_scope'));//存储

      $this->success('登录成功','index/index');
        
    }else{
      $this->error('请求不合法');
    }
  }
  

  public function logout(){

    //  1清空session 2.跳转到登录页面
    session(null,config('admin.session_user_scope'));

    $this->redirect('login/index');
  }
}