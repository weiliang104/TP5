<?php
namespace app\admin\model;
use think\Model;
class Column extends Model{

	public function tree(){
		$column= db('column')->select();
		// var_dump($column);die;
		return $this->sort($column);

	}
	public function sort($data,$pid=0,$lebel=0){
		static $arr=array();
		foreach ($data as $k => $v) {
				if ($v['pid']==$pid) {
					$v['lebel']=$lebel;
					$arr[]=$v;
					$this->sort($data,$v['id'],$lebel+1);
				}
		}
		return $arr;
		}

	public function delchile(){
			$column=db('column')->select();
			return this->_delchile($column,$id);

	}
	public function _delchile($column,$id){
			static $arr=array();
			foreach ($column as $k => $v) {
				if ($v['pid']==$id) {
					$arr[]=$v;
					# code...
				}
			}
				}	
			}
		}



