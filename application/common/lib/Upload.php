<?php 
namespace app\common\lib;

use Qiniu\Auth;

use Qiniu\Storage\UploadManager;

class Upload 
{
  public static function image()
  {
    if(empty($_FILES['file'])){
        exception('您提交的图片数据不合法',404);
    }

    $filePath = $_FILES['file']['tmp_name'];

    $pathinfo = pathinfo($_FILES['file']['name']);
    //halt($pathinfo);
    $ext = $pathinfo['extension'];

    $config = config('qiniu');

    $auth = new Auth($config['ak'],$config['sk']);;

    $token = $auth->uploadToken($config['bucket']);

    $key = date('Y')."/".date('m')."/".substr(md5($filePath),0,5).date('YmdHis').rand(0,9999).'.'.$ext;
    
    $uploadMgr = new UploadManager();

    list($ret,$err) = $uploadMgr->putFile($token,$key,$filePath);

    if($err !== null) {
        return null;
    } else {
        return $key;
    }
  }

  
}