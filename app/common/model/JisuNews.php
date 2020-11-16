<?php

namespace app\common\model;

use think\Model;

class JisuNews extends Model
{
  protected $autoWriteTimestamp = false;
  protected $updateTime = false;
  protected $createTime = false;

  public function getNewsByPage($page = 1, $channel, $pagesize = 10)
  {
    $rows = model('JisuNews');
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
    $rows = model('JisuNews')
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

  // 设置右侧热点新闻
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
    $row = model('JisuNews')->get($id); 
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
    $row = model('JisuNews');
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

  // 文章数据更新，点赞，踩
  public function updateNews($id, $word)
  {
    $row = model('JisuNews')
      ->where('id', $id)
      ->inc($word)
      ->update();
  }

  // 文章列表
  public function list($params){
    $row = model('JisuNews')->getNewsByPage($params['page'], $params['channel'],$params['pageSize']);
    $data = [
      'code' => 0,
      'count' => $row['total'],
      'data' => $row['list']
    ];
    return $data;
  }
}
