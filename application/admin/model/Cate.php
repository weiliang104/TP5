<?php
namespace app\admin\model;
use think\Model;
class Cate extends Model{

 public function column()
    {
        return $this->belongsTo('column','cateid');
    }
	
}



