<?php
namespace app\admin\validate;
use think\Validate;
class Cate extends Validate{

	protected $rule=[
'title'=>'require|max:23',
'desc'=>'require',
	];

	 protected $message= [
		'title.require' => '管理员名称必须填写',
		'title.max'=>'长度不对',
		'desc.require'=>'mima不能为空',
		
	];
}



