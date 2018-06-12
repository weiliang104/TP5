<?php
namespace app\admin\controller;
use\think\Controller;
use\app\admin\model\Admin;
class Login extends Controller{
public function login(){
	// $username = input('username');
	// $password = input('password');
	
	if (request()->isPost()) {
		$data=input('post.');
	$login = new Admin();
	$num=$login->login($data);
			if ($num==3) {
		$this->success("成功，在为你跳转，","Lst/lst")	;	# code...
	}elseif ($num==2) {
		$this->error("密码错误");
		# code...
	}else{
		$this->error("用户不在");                                                                                                            
	}
	}

	return $this->fetch();
		}

}