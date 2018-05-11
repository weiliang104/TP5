<?php
namespace app\admin\validate;
use think\Validate;
class Links extends Validate{

	protected $rule=[
'linkname'=>'require|max:23',
'link'=>'max:21',
	];

	 protected $message= [
		'linkname.require' => '管理员名称必须填写',
		'link.max'=>'长度不对',
		'link.require'=>'mima不能为空',
		
	];
}



