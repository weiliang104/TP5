<?php
namespace app\test\controller;
use app\test\controller\Base;
class Index extends Base{
public function index(){
	return $this->fetch();
}

}



