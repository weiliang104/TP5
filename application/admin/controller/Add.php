<?php
namespace app\admin\controller;
use\think\Controller;
use\think\Validate;
class Add extends Controller{
public function add(){
	if (request()->isPost()) {
		
		$data=[
				'username'=>input('username'),
				'password'=>input('password'),
		];
		$validate = \think\Loader::validate('Admin');
if (!$validate->check($data)) {
    $this->error($validate->getError());
    die;
}
		if(db('admin')->insert($data))	{
 return $this->success("添加管理员成功");
		}
		
	}
	return $this->fetch();
}

}
