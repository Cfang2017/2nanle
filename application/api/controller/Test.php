<?php
 
namespace app\api\controller;

use think\Controller;
use Qiniu\Auth;

class Test extends Controller{
    public function index(){
        // $user = session(config('admin.session_user'),'',config('admin.session_user_scope'));
        // if(!($user && $user->id))
        // {
        //     return $this->redirect('login/index');;
        // }
        $uid = $_GET['uid'];
        $config = config('qiniu');
        $bucket = $config['bucket'];
        $accessKey = $config['ak'];
        $secretKey = $config['sk'];
        $auth = new Auth($accessKey, $secretKey);

        $policy = array(
            'callbackUrl' => 'http://172.30.251.210/callback.php',
            'callbackBody' => '{"fname":"$(fname)", "fkey":"$(key)", "desc":"$(x:desc)", "uid":' . $uid . '}'
            );

        $upToken = $auth->uploadToken($bucket, null, 3600, $policy);

        header('Access-Control-Allow-Origin:*');
         
        return [
            'status' => '1',
            'message' => 'ok',
            'token' => $upToken
        ];
    }
}
 
 
 
 
 
