<?php 
namespace app\admin\controller;

use think\Controller;
use think\Request;

/**
 *后台图片上传相关逻辑
 */
class Image  extends Base
{
  public function upload()
  {

    $file = Request::instance()->file('file');
    //把图片上传到制定的文件夹
    $info = $file->move('upload');

    if($info && $info->getPathname()){
        $data = [
          'status' => 1,
          'message' => 'ok',
          'data' => '/'.$info->getPathname()
      ];   
      echo json_encode($data);exit;
    }

    echo json_encode(['status' => 0,'message'=>'上传失败']);exit;

    //  $data = [
    //      'status' => 1,
    //      'message' => 'ok',
    //      'data' => 'http://images4.c-ctrip.com/target/200h0a0000004ddlc7A8B_550_412.jpg'
    //  ];
    //  echo json_encode($data);exit;
  }
}