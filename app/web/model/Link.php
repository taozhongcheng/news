<?php

namespace app\web\model;
use think\model;

class Link extends Model{
 // 友情链接列表
  public function getLinkList(){
    $row = model('Link')
    ->order('sort','asc')
    ->limit(100)
    ->select();
    return $row;
  }
}