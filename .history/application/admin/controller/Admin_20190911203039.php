<?php
namespace app\admin\controller;

use think\Controller;

class Admin extends Controller
{

    public function add() {
        // 判定是否是post提交  
        if(request()->isPost()){
            // 打印提交的数据
            // dump(input('post.')); halt(); => dump();exit  ; debugger;
            $data = input('post.');
            //validate
            $validate = $validate('AdminUser');halt($validate->check($data));
            if($validate->check($data)){

            }
        }else{
            return $this->fetch();
        }
    }
}
