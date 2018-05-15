<?php
namespace app\admin\controller;
use\think\Controller;
use\think\Validate;
use\app\admin\model\Cate as CateModel;
class Cate extends Controller{
public function index(){
	
	return $this->fetch();
}
public function edit(){
	$id=input('id');
$Cate=db('cate')->find($id);
$list=db('column')->select();
$this->assign('Cate',$Cate);
$this->assign('list',$list);
if (request()->isPost()) {
	# code...

	$data=[
			"title"=>input('title'),
			"author"=>input('author'),
			"desc"=>input('desc'),
			"keywords"=>input('keywords'),
			"cateid"=>input('cateid'),
			"content"=>input('content'),
			"time"=>time(),
			
		];
		if (input('state')=='on') {
			$data['state']='1';
		}else {$data['state']='0';}

		$file=request()->file('pic');
		if ($file) {
			$info=$file->move(ROOT_PATH . 'public' . DS .'static/uploads');
			$data['pic']='/uploads/'.$info->getSaveName();
			# code...
		}
		// var_dump($data['pic']);die;
		if (db('cate')->where('id',$id)->update($data)) {
			# code...
			return $this->success("chenggong",'lst');
		}else{
			return $this->error("shibai");
		}
	}
	return $this->fetch();
}
public function lst(){
	$list=CateModel::paginate(3);
	$this->assign('list',$list);
	return $this->fetch();
}

public function del(){
	if (!empty(input('id'))) {
		db('cate')->delete(input('id'));
		$this->success("删除成功");
	}
	$this->assign('list',$list);
	return $this->fetch();
}

public function add(){
	if (request()->isPost()) {
		//dump($_POST);die;
		$data=[
			"title"=>input('title'),
			"author"=>input('author'),
			"desc"=>input('desc'),
			"keywords"=>input('keywords'),
			"cateid"=>input('cateid'),
			"content"=>input('content'),
			"time"=>time(),
			
		];
		if (input('state')=='on') {
			$data['state']='1';
		}else{$data['state']='0';}
	 	

                $file = request()->file('pic');
                if ($file) {
                	# code... 
                	 $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
                	 $data['pic']='/uploads/'.$info->getSaveName();
                }

                $validate=\think\Loader::validate('Cate');
                if (!$validate->check($data)) {
                	$this->error($validate->getError());die;
                }
				if(db('cate')->insert($data)){
    			return $this->success('添加文章成功！','lst');
    		}else{
    			return $this->error('添加文章失败！');
    		}	
	
	}

$Column=db('column')->select();
	$this->assign('list',$Column);
return $this->fetch();

}

}



