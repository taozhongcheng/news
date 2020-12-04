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
    $count = model('jisu_news')->where($where)->count();
    $list = $rows->where($where)->order('time', 'desc')
    ->field(['time', 'title', 'channel', 'pic', 'covers', 'des', 'id','is_edit', 'src', 'browse'])
    ->limit(($params['page'] - 1)*10, $params['pageSize'])->select();
   
    foreach ($list as $k => $v) {
      $list[$k]['des'] = $list[$k]['des'] ? $list[$k]['des'] :'';
      $list[$k]['time'] = date("yy-m-d", strtotime($v['time']));
      $imgurl = 'https://n.sinaimg.cn/default/2fb77759/20151125/320X320.png';
      
     if($list[$k]['covers']){
        $list[$k]['covers'] = explode(',', $list[$k]['covers']);
     } 
     else if (!$list[$k]['is_edit'] && $list[$k]['pic'] !== $imgurl) {
        $list[$k]['covers'] = [$list[$k]['pic']];
      }else{
        $list[$k]['covers'] = [];
      }
      $list[$k]['category'] = getChannel($v['channel']);
    }
    $data =  [
      'total' =>  $count,
      'list' => $list,
      'currentPage' => $params['page'],
      'lastPage' => ceil($count/$params['pageSize'])
    ];

    return $data;
  }

  public function getNewsLimit($limit = 1, $channel)
  {
    $rows = model('JisuNews');
    if($channel){
      $rows = $rows->where("channel", $channel);
    }
   $rows= $rows->order('time', 'desc')->field(['time','title','channel','pic','id','src','browse'])->limit($limit)->select();
    foreach ($rows as $k => $v) {
      $rows[$k]['time'] = date('yy-m-d', strtotime($v['time']));
      $rows[$k]['key'] = getChannel($v['channel']);
    }
    return $rows;
  }

  public function setNewsList()
  {
    $list = model('Cate')->list();
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
    $list = $this->getNewsLimit(10,'');
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
    $row['des'] = $row['des']? $row['des'] : '';
    $row['time'] = date('y-m-d', strtotime($row['time']));
    
    //
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
  public function getRelatedNews($channel = "头条", $id)
  {
    $row = model('JisuNews');
    if ($channel !== "推荐") {
      $row = $row->where("channel", $channel);
    };
    $row = $row->where("id != $id")
     ->field(['time', 'title', 'channel', 'pic','src','id', 'browse'])
      ->order('time', 'desc')
      ->limit(3)
      ->select();
    foreach ($row as $k => $v) {
      $row[$k]['key'] = getChannel($v['channel']);
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
  // 网站地图使用
  public function sitemap($page=1 ,$pageSize =10){
    $row = model('JisuNews')->order('time','desc')->field(['time','title','channel','id'])->paginate($pageSize , false, ['page' => $page]);
    return $row->items();
  }
}