<?php
namespace app\admin\controller;
use\think\Controller;
use\app\admin\model\Admin as AdminModel;
class Lst extends Controller{
public function lst(){
	$list= AdminModel::paginate(3);
	$this->assign('list',$list);
	return $this->fetch();
		}

}