<?php
namespace app\admin\controller;

use think\Controller;

class Admin extends Controller
{

    public function add() {
        // 判定是否是post提交  
        if(request()->isPost()){
            // 打印提交的数据
            dump(input('post.'));
        }else{
            return $this->fetch();
        }
    }
}
