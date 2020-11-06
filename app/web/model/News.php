<?php

namespace app\web\model;

use think\Model;
use think\Db;

class News extends Model
{
  public function __construct()
  {
  }

  public function getNewsByPage($page = 1, $channel, $pagesize = 10)
  {
    $rows = Db::table('jisu_news');
    if ($channel) {
      $rows = $rows->where('channel', $channel);
    }
    $rows = $rows->order('time', 'desc')->paginate($pagesize, false, ['page' => $page]);
    $list = $rows->items();

    foreach ($list as $k => $v) {
      $list[$k]['des'] = getDescriptionFromContent($rows[$k]['content'], 150);
      $list[$k]['time'] = date("Y-m-d", strtotime($v['time']));
      $cover = get_images_from_html($v['content']);
      array_unshift($cover, $v['pic']);
      $list[$k]['cover_size'] = sizeof($cover);
      $list[$k]['cover'] = $cover;
      $list[$k] = array_remove($list[$k], 'content');
      $list[$k] = array_remove($list[$k], 'weburl');
      $list[$k] = array_remove($list[$k], 'url');
    }
    $data =  [
      'total' => $rows->total(),
      'list' => $list,
      'currentPage' => $rows->currentPage(),
      'lastPage' => $rows->lastPage(),
      // 'paginator' => $rows->render()
    ];

    return $data;
  }
  public function getNewsLimit($limit = 1, $channel = "头条")
  {
    $rows = Db::table('jisu_news')
      ->where("channel", $channel)
      ->order('time', 'desc')
      ->limit($limit)
      ->select();
    foreach ($rows as $k => $v) {
      $rows[$k]['des'] =getDescriptionFromContent($rows[$k]['content'], 150);
      $rows[$k]['time'] = date('y-m-d', strtotime($v['time']));
    }
    return $rows;
  }

  public function setNewsList()
  {
    $list = array_remove(config('header'), 'push');
    foreach ($list as $k => $v) {
      $name = $v['name'];
      $length = $v['length'];
      $list[$k]['list'] = $this->getNewsLimit($length, $name);
    }
    return  $list;
  }

  public function setHotList()
  {
    $hotConfig = config('header')['hot'];
    $name = $hotConfig['name'];
    $list = $this->getNewsLimit(10, $name);
    return  $list;
  }

  //根据id查询新闻
  public function getRowById($id)
  {
    $row = Db::table('jisu_news')->where('id', $id)->find();
    $divNum = substr_count($row['content'], 'div');
    // 一些HTML多了</div>
    if ($divNum % 2) {
      $row['content'] = '<div>' . $row['content'];
    }
    $row['des'] = getDescriptionFromContent($row['content'],150);
    $row['time'] = date('y-m-d', strtotime($row['time']));
    return $row;
  }

  //相关新闻查询
  public function getRelatedNews($channel = "头条", $id)
  {
    $row = Db::table('jisu_news');
    if ($channel !== "推荐") {
      $row = $row->where("channel", $channel);
    };
    $row = $row->where("id != $id")
      ->order('time', 'desc')
      ->limit(3)
      ->select();
    foreach ($row as $k => $v) {
      $row[$k]['des'] =getDescriptionFromContent($v['content'], 150);
    }
    return $row;
  }

  // 文章数据更新
  public function updateNews($id, $word)
  {
    $row = Db::table('jisu_news')
      ->where('id', $id)
      ->inc($word)
      ->update();
  }
  // 友情链接列表
  public function getLinkList(){
    $row = Db::table('link')
    ->order('sort','asc')
    ->limit(100)
    ->select();
    return $row;
  }
}
