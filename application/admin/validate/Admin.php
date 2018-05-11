<?php
namespace app\admin\validate;
use think\Validate;
class Admin extends Validate{

	protected $rule=[
'username'=>'require|max:23',
'password'=>'max:21',
	];

	 protected $message= [
		'username.require' => '管理员名称必须填写',
		'username.max'=>'长度不对',
		'password.require'=>'mima不能为空',
		
	];
}



