<?php

namespace app\common\model;

use think\Model;

class JisuNews extends Model
{
  protected $autoWriteTimestamp = false;
  protected $updateTime = false;
  protected $createTime = false;

  public function getNewsByPage($params)
  {
    $rows = model('JisuNews');
    $where =[];
    if ($params['channel']) {
      $where['channel'] =  $params['channel'];
    }
    if ($params['src']) {
      $where['src'] =  $params['src'];
    }
    if($params['startTime']){
      $where['create_time'] = ['between',[$params['startTime'],$params['endTime']]];
    }
    if($params['title']){
      $where['title'] = ['like','%'.$params['title'].'%'];
    }
    $rows = $rows->where($where)->order('time', 'desc')->paginate($params['pageSize'] , false, ['page' => $params['page']]);
    $list = $rows->items();

    foreach ($list as $k => $v) {
      $list[$k]['des'] = getDescriptionFromContent($rows[$k]['content'], 150);
      $list[$k]['time'] = date("Y-m-d", strtotime($v['time']));

      $imgurl = 'https://n.sinaimg.cn/default/2fb77759/20151125/320X320.png';
      if($list[$k]['covers']){
        $list[$k]['covers'] = explode(',', $list[$k]['covers']);
      }else{
        $covers = get_images_from_html($v['content']);
        $list[$k]['pic'] === $imgurl ? '': array_unshift($covers, $v['pic']);
        $list[$k]['covers'] = $covers;
      }
      $list[$k]['category'] = getChannel($v['channel']);
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

  public function getNewsLimit($limit = 1, $channel = "头条",$key)
  {
    $rows = model('JisuNews')
      ->where("channel", $channel)
      ->order('time', 'desc')
      ->limit($limit)
      ->select();
    foreach ($rows as $k => $v) {
      $rows[$k]['des'] = $rows[$k]['des'] ? $rows[$k]['des'] : getDescriptionFromContent($rows[$k]['content'], 150);
      $rows[$k]['time'] = date('y-m-d', strtotime($v['time']));
      $rows[$k]['key'] = $key;
    }
    return $rows;
  }

  public function setNewsList()
  {
    $list = model('Cate')->list();
    array_splice($list,0,1);
    foreach ($list as $k => $v) {
      $name = $v['name'];
      $length = $v['length'];
      $list[$k]['list'] = $this->getNewsLimit($length, $name,$v['key']);
    }
    return  $list;
  }

  // 设置右侧热点新闻
  public function setHotList()
  {
    $list = $this->getNewsLimit(10, '头条','hot');
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
    $row['des'] = $row['des']? $row['des'] : getDescriptionFromContent($row['content'],150);
    $row['time'] = date('y-m-d', strtotime($row['time']));
    
    // 封面设置
    $imgurl = 'https://n.sinaimg.cn/default/2fb77759/20151125/320X320.png';
    if($row['covers']){
      $row['covers'] = explode(',', $row['covers']);
    }else{
      $covers = get_images_from_html($row['content']);
      $row['pic'] === $imgurl ? '' : array_unshift($covers, $row['pic']);
      $row['covers'] = $covers;
    }
    return $row;
  }

  //相关新闻查询
  public function getRelatedNews($channel = "头条", $id,$key)
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
      $row[$k]['key'] =  $key;
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
    $row = model('JisuNews')->getNewsByPage($params);
    $data = [
      'code' => 0,
      'count' => $row['total'],
      'data' => $row['list']
    ];
    return $data;
  }

  // 编辑资讯
  public function edit($data){
    $validate = new \app\common\validate\JisuNews();
    if (!$validate->scene('edit')->check($data)) {
      return $validate->getError();
    };
    $detail = model('JisuNews')->get($data['id']);
    $detail->title = $data['title'];
    $detail->channel =$data['channel'];
    $detail->des = $data['des'];
    $detail->content = $data['content'];
    $detail->keyword = $data['keyword'];
    $detail->is_edit = $data['is_edit'];
    $detail->covers = $data['covers'];
    $row = $detail->allowField(true)->save();
    if($row) return 1;
  }
}
// 炼金术士 ,时光守护者,玛尔扎哈,猩红收割者,暗夜猎手,众星之子,赏金猎人