<?php
namespace app\common\model;
use think\Model;
class Cate extends Model{
  public function list(){
    $row = model('Cate')->select();
    return $row;
  }
}