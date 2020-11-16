<?php
namespace app\common\controller;

use think\Controller;

class News extends Controller{
  public function list(){
    $data  = [
      'page' => input('get.page', 1),
      'pageSize' => input('get.limit', 10),
      'channel' => input('get.channel'),
      'src' => input('get.src'),
      'startTime' => input('get.startTime'),
      'endTime' => input('get.endTime'),
      'title' => input('get.title')
    ];
    $row =model('JisuNews')->list($data);
    return $row;
  }

  public function del(){
    $id = input('get.id');
    $row =model('JisuNews')->get($id)->delete();
    if($row){
      $this->success('删除成功！');
    }
  }
}