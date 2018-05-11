<?php
namespace app\admin\validate;
use think\Validate;
class Column extends Validate{

	protected $rule=[
'column'=>'require|max:23',
// 'password'=>'max:21',
	];

	 protected $message= [
		'column.require' => '名称必须填写',
		'column.max'=>'长度不对',
		// 'password.require'=>'mima不能为空',
		
	];
}



