<?php

namespace app\web\model;

use think\Model;
use think\Db;

class Comment extends Model
{
  protected $createTime = 'create_time';
  protected $updateTime = 'update_time';
 // protected $table = "comment";

  // 文章评论列表
  public function getCommentsList($id)
  {
    $row = Db::table('comment')
    ->where('topic_id', $id)
      ->order('create_time', 'desc')
      ->limit(10)
      ->select();
    return $row;
  }
  // 文章评论赞
  public function updateCommentsPraise($id, $type)
  {
    $row = Db::table('comment')
    ->where('id', $id)
      ->inc($type)
      ->update();
    return $row;
  }
  //文章发表评论
  public function commentSend($data)
  {
    $row = model('comment')->allowField(true)->save($data);
    return $row;
  }
}