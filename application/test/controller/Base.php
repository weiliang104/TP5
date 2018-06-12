<?php
namespace app\test\controller;
use\think\Controller;
class Base extends Controller{
public function _initialize(){
	$column=db('column')->order('id','desc')->select();
	$this->assign('column',$column);
}

}



