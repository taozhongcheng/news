<?php

namespace app\web\model;

use think\Model;

class Comment extends Model
{
  protected $createTime = 'create_time';
  protected $updateTime = 'update_time';

  // 文章评论列表
  public function list($id, $page=1)
  {
    $row = model('Comment')
    ->where('topic_id', $id)
      ->order('create_time', 'desc')
      ->paginate(5, false, ['page' => $page]);

    $list = $row->items();
    foreach($list as $k => $v ){
      $row[$k]['create_time_text'] = timeToText(strtotime($v['create_time']));
    }
    $data =  [
      'total' => $row->total(),
      'list' => $list,
      'currentPage' => $row->currentPage(),
      'lastPage' => $row->lastPage(),
    ];
    return $data;
  }
  // 文章评论赞
  public function praise($id, $type)
  {
    $row = model('Comment')
    ->where('id', $id)
      ->inc($type)
      ->update();
    return $row;
  }
  //文章发表评论
  public function add($data)
  {
    $validate = new \app\common\validate\Comment();
    if(!$validate->scene('add')->check($data)){
      return $validate->getError();
    }
    $row = model('Comment')->allowField(true)->save($data);
    
    if($row){
      return 1;
    }else{
      return '发表评论失败！';
    }
  }
}