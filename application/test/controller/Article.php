<?php
namespace app\test\controller;
use\think\Controller;
class Article extends Controller{
public function article(){
	return $this->fetch();
}

}
