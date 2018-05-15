<?php
namespace app\admin\controller;
use\think\Controller;
use\think\Validate;
use\app\admin\model\Links as LinksModel;
class Links extends Controller{
public function links(){
	$list=LinksModel::paginate(3);
	$this->assign('list',$list);
	return $this->fetch();
}
public function add(){

	if (request()->isPOST()) {
	$data=['linkname'=>input('linkname'),
			'link'=>input('link'),
			'content'=>input('content'),
];
if(db('links')->insert($data)){

	$this->success('成功');
}
	}
		return $this->fetch();
}
	



public function del(){

	if(!empty(input('id'))){
		$res=db('links')->delete(input('id'));
		$this->seccess('删除成功');
		
	}
	return $this->fetch();
}
public function edit(){
	$id=input('id');
	$Links=db('links')->find($id);
	if (request()->isPost()) {
		$data=[
			'id'=>input('id'),
			'linkname'=>input('linkname'),
			'link'=>input('link'),
			'content'=>input('content'),
		];
		$validate=\think\Loader::validate('Links');
		if (!$validate->check($data)) {
			# code...
			$this->error($validate->getError());
			die;
		}

	
		if (db('links')->update($data)) {

			$this->success("修改成功");  
	}
}
$this->assign('Links',$Links); 

return $this->fetch();
}

}

