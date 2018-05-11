<?php
namespace app\test\controller;
use\think\Controller;
class Lst extends Controller{
public function lst(){
	return $this->fetch();
		}

}