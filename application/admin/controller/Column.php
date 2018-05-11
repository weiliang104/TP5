<?php
namespace app\admin\controller; 
use\think\Controller;
use\think\Validate;
use\app\admin\model\Column as ColumnModel; 
class Column extends Controller{
public function lst(){
	$List=ColumnModel::paginate(3);
	$this->assign('list',$List);
	return $this->fetch();
}

public function add(){
	if (request()->isPost()) {
		$date=[
			'column'=>input('column'),
		];
		$validate=\think\Loader::validate('Column');
		if(!$validate->check($date)){
			$this->error($validate->getError());
			die;
		}
			if (db('column')->insert($date)) {
				$this->success("添加成功");
			}
	}
	return $this->fetch();
}

public function edit(){
	$id=input('id');
	$Column=db('column')->find($id);
	if (request()->isPost()) {
	$date=[
		'id'=>$id,
		'column'=>input('column'),
	];
	$validate=\think\Loader::validate("Column");
	if (!$validate->check($date)) {
		$this->error($validate->getError());
		# code...
		die;
	}
		if (db('column')->update($date)) {
			$this->success("fas");
		}
}
	$this->assign('Column',$Column);

	return $this->fetch();
}

public function del(){
	db('admin')->delete(input('id'));
}
}



