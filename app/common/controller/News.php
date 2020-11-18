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

  public function edit()
  {
    $data = [
      'id' => input('post.id'),
      'title' => input('post.title'),
      'channel' => input('post.channel'),
      'des' => input('post.des'),
      'keyword' => input('post.keyword'),
      'content' => input('post.content'),
      'is_edit' => input('post.is_edit'),
      'covers' => input('post.covers'),
    ];
    $res = model('JisuNews')->edit($data);
    if ($res === 1) {
      return $this->success('编辑成功！');
    }else{
      return $this->error($res);
    }
  }

  public function del(){
    $id = input('get.id');
    $row =model('JisuNews')->get($id)->delete();
    if($row){
      $this->success('删除成功！');
    }
  }
}