<?php
namespace app\admin\controller; 
use\think\Controller;
use\think\Validate;
use\app\admin\model\Column as ColumnModel; 
class Column extends Controller{
	public function _initialize(){
		if (!session('username')) {
			$this->error('请先登录','Login/login');
		}
	}
	protected $beforeActionList=[
		'delson' => ['only'=>'del'],
	];
	protected delson(){
		$column=new ColumnModel;
		$column->delchile();
	}
public function lst(){
	$cate=new ColumnModel();
	$column=$cate->tree();
// var_dump($column);die;
	$this->assign('list',$column);
	return view();
}

public function add(){
	$cates=db('column')->select();
	$this->assign('cate',$cates);
	if (request()->isPost()) {
		$date=[
			'column'=>input('column'),
			'type' => input('type'),
			'pid' => input('pid'),
		];
		// var_dump($date);die;
		$validate=\think\Loader::validate('Column');
		if(!$validate->check($date)){
			$this->error($validate->getError());
			die;
		}
			if (db('column')->insert($date)) {
				$this->success("添加成功",'lst');
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
			return $this->success("修改成功",'lst');
		}
}
	$this->assign('Column',$Column);

	return $this->fetch();
}

public function del(){
	if (!empty(input('id'))) {
		# code...
		db('column')->delete(input('id'));
		return $this->success('删除成功','lst');
	}
	
}
}



