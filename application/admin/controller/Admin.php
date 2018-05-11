<?php
namespace app\admin\controller;
use\think\Controller;
class Admin extends Controller{
public function index(){
	return $this->fetch();
}

public function del(){
	db('admin')->delete(input('id'));
}
}



